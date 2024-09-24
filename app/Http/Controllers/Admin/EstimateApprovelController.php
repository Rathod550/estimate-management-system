<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\User;
use DataTables;

class EstimateApprovelController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Estimate::select('*')->where("admin_approvel",'like',"%".auth()->user()->id."%");
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
                    ->addColumn('service', function($row){
                        return $row->service->name ?? '';
                    })
                    ->filterColumn('service', function ($query, $keyword) {
                        $query->whereHas('service', function($q) use($keyword){
                            $q->where("name",'like',"%".$keyword."%");
                        });
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('admin.approval.estimate.show',[$row->id]).'" class="edit btn btn-dark btn-sm" style="margin-right:5px;"><i class="fa fa-check" aria-hidden="true"></i> Approve</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'client', 'category', 'service'])
                    ->make(true);
        }
        return view('admin.estimateApprovel.index');
    }

    public function show($id)
    {
        $estimate = Estimate::find($id);
        return view('admin.estimateApprovel.show',compact('estimate'));
    }

    public function approve($id)
    {
        $estimate = Estimate::find($id);
        $adminApprovelArray = explode(',',$estimate->admin_approvel);

        $valueToRemove = auth()->user()->id;

        // Search for the value in the array and remove it
        if (($key = array_search($valueToRemove, $adminApprovelArray)) !== false) {
            unset($adminApprovelArray[$key]);
        }

        // Optionally, implode the array back into a string
        $newApprovalArray = NULL;
        if(!empty($adminApprovelArray)){
            $newApprovalArray = implode(',', $adminApprovelArray);
        }

        $estimate->update(['admin_approvel' => $newApprovalArray]);

        notificationMsg('success','Estimate Approved Successfully');
        return redirect()->route('admin.estimate.approval');
    }
}
