<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Client;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use DataTables;
use Validator;
use DB;
use Exception;
use Throwable;
use Log;
use Session;
use PDF;

class EstimateController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Estimate::select('*');
            $services = Service::pluck('name','id')->all();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('client', function($row){
                        return $row->client->name ?? '';
                    })
                    ->filterColumn('client', function ($query, $keyword) {
                        $query->whereHas('client', function($q) use($keyword){
                            $q->where("name",'like',"%".$keyword."%");
                        });
                    })
                    ->addColumn('category', function($row){
                        return $row->category->name ?? '';
                    })
                    ->filterColumn('category', function ($query, $keyword) {
                        $query->whereHas('category', function($q) use($keyword){
                            $q->where("name",'like',"%".$keyword."%");
                        });
                    })
                    ->addColumn('service', function($row) use ($services){
                        $service = [];
                        foreach(explode(',',$row->service_id) as $key => $value){
                            $service[$key] = $services[$value] ?? '';
                        }
                        return $service ?? '';
                    })
                    ->filterColumn('service', function ($query, $keyword) {
                        $query->whereHas('service', function($q) use($keyword){
                            $q->where("name",'like',"%".$keyword."%");
                        });
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('admin.estimate.edit',[$row->id]).'" class="edit btn btn-primary btn-sm" style="margin-right:5px;"><i class="fa fa-edit"></i></a>';
                        $btn = $btn.'<a href="'.route('admin.estimate.show',[$row->id]).'" class="edit btn btn-dark btn-sm" style="margin-right:5px;"><i class="fa fa-print" aria-hidden="true"></i> / <i class="fa fa-eye" aria-hidden="true"></i></a>';
                        $btn = $btn.'<a href="' . route('admin.estimate.delete', $row->id) . '" class="text-white btn btn-danger btn-sm remove-crud" data-id="' . $row->id . '" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'client', 'category', 'service'])
                    ->make(true);
        }
        return view('admin.estimate.index');
    }

    public function create()
    {
        $client = Client::pluck('name','id')->all();
        $category = Category::pluck('name','id')->all();
        $service = Service::pluck('name','id')->all();
        return view('admin.estimate.create', compact('client', 'category', 'service'));
    }

    public function getEstimateContent(Request $request)
    {
        $input = $request->all();
        $service = Service::where('id',$input['service_id'])->first();
        $view = view('admin.estimate.serviceContent', compact('service'))->render();
        return response()->json(['view'=>$view]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'client_id'=>'required',
            'category_id'=>'required',
            'services'=>'required',
            'service.*.*.price' => 'required|numeric',
        ]);

        if ($validator->passes()) {

            //DB Transaction start
            DB::beginTransaction();
            try {

                $totalPriceArray = [];

                foreach ($input['service'] as $key => $value) {
                    foreach($value as $kkey => $vvalue){
                        if(isset($vvalue['total_price'])){
                            $totalPriceArray[] = $vvalue['total_price'];
                        }
                    }
                }

                $totalPrice = array_sum($totalPriceArray);

                $userIds = User::where('id', '!=', auth()->user()->id)->whereNull('is_super_admin')->pluck('id')->all();
                
                $input['service_content'] = json_encode($input['service']);
                $input['admin_approvel'] = implode(',',$userIds);
                $input['admin_id'] = auth()->user()->id;
                $input['gst_type'] = Session::get('loginType');
                $input['price'] = $totalPrice;
                $input['service_id'] = implode(',',$input['services']);

                if(Session::get('loginType') == 'kda'){
                    $gstAmount = ($totalPrice * 9) / 100;
                    $sgstAmount = ($totalPrice * 9) / 100;
                    $input['gst'] = $gstAmount;
                    $input['sgst'] = $sgstAmount;
                    $input['total_price'] = $totalPrice + $gstAmount + $sgstAmount;
                }

                Estimate::create($input);

                DB::commit();
                notificationMsg('success','Estimate Created Successfully');
                return response()->json(['view' => route('admin.estimate')]);
            } catch (Exception $e) {
                DB::rollback();
                notificationMsg('error','Something went wrong');
                Log::error($e);
            } catch (Throwable $e) {
                DB::rollback();
                notificationMsg('error','Something went wrong');
                Log::error($e);
                //throw $e;
            }
            //DB Transaction End
        }
        return response()->json(['error'=>$validator->errors()]);
    }

    public function edit($id)
    {
        $estimate = Estimate::find($id);

        $services = [];
        if(!empty($estimate->service_id)){
            $services = explode(',',$estimate->service_id);
        }

        $client = Client::pluck('name','id')->all();
        $category = Category::pluck('name','id')->all();
        $service = Service::pluck('name','id')->all();
        return view('admin.estimate.edit',compact('estimate', 'client', 'category', 'service', 'services'));
    }

    public function show($id)
    {
        $estimate = Estimate::find($id);

        $service = Service::pluck('name','id')->all();
        $serviceName = [];
        foreach(explode(',',$estimate->service_id) as $key => $value){
            $serviceName[] = $service[$value];
        }

        $serviceName = implode(',',$serviceName);

        $estimateApprovelAdminsIds = explode(',',$estimate->admin_approvel);
        $underApprovelAdminName = User::whereIn('id',$estimateApprovelAdminsIds)->pluck('name','name')->all();

        return view('admin.estimate.show',compact('estimate','underApprovelAdminName','serviceName','service'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'client_id'=>'required',
            'category_id'=>'required',
            'services'=>'required',
            'service.*.*.price' => 'required|numeric',
        ]);

        if ($validator->passes()) {

            //DB Transaction start
            DB::beginTransaction();
            try {

                $totalPriceArray = [];

                foreach ($input['service'] as $key => $value) {
                    foreach($value as $kkey => $vvalue){
                        if(isset($vvalue['total_price'])){
                            $totalPriceArray[] = $vvalue['total_price'];
                        }
                    }
                }

                $totalPrice = array_sum($totalPriceArray);

                $userIds = User::where('id', '!=', auth()->user()->id)->whereNull('is_super_admin')->pluck('id')->all();

                $input['service_content'] = json_encode($input['service']);
                $input['admin_approvel'] = implode(',',$userIds);
                $input['admin_id'] = auth()->user()->id;
                $input['gst_type'] = Session::get('loginType');
                $input['price'] = $totalPrice;
                $input['service_id'] = implode(',',$input['services']);
                
                $estimate = Estimate::find($id);

                if(!empty($estimate->gst)){
                    $gstAmount = ($input['price'] * 9) / 100;
                    $sgstAmount = ($input['price'] * 9) / 100;
                    $input['gst'] = $gstAmount;
                    $input['sgst'] = $sgstAmount;
                    $input['total_price'] = $input['price'] + $gstAmount + $sgstAmount;
                }

                $estimate->update($input);

                DB::commit();
                notificationMsg('success','Estimate Updated Successfully');
                return response()->json(['view' => route('admin.estimate')]);
            } catch (Exception $e) {
                DB::rollback();
                notificationMsg('error','Something went wrong');
                Log::error($e);
            } catch (Throwable $e) {
                DB::rollback();
                notificationMsg('error','Something went wrong');
                Log::error($e);
                //throw $e;
            }
            //DB Transaction End
        }
        return response()->json(['error'=>$validator->errors()]);
    }

    public function delete($id)
    {
        Estimate::find($id)->delete();
        notificationMsg('success','Estimate Deleted Successfully');
    }

    public function generatePDF($id, $type)
    {
        $estimate = Estimate::find($id);
        $service = Service::pluck('name','id')->all();
        $fileName = $estimate->client->name."_"."estimate.pdf";
        $pdf = PDF::loadView('admin.estimate.estimatePdf', ['estimate' => $estimate, 'service' => $service]);
        
        if($type == 'download'){
            return $pdf->download($fileName);
        }else{
            return $pdf->stream($fileName);
        }
    }
}
