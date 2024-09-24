<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceSubMenu;
use DataTables;

class ServiceController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('admin.service.sub.menu',[$row->id]).'" class="edit btn btn-dark btn-sm" style="margin-right:5px;"><i class="fa fa-bars" aria-hidden="true"></i></a>';
                        $btn = $btn.'<a href="'.route('admin.service.edit',[$row->id]).'" class="edit btn btn-primary btn-sm" style="margin-right:5px;"><i class="fa fa-edit"></i></a>';
                        $btn = $btn.'<a href="' . route('admin.service.delete', $row->id) . '" class="text-white btn btn-danger btn-sm remove-crud" data-id="' . $row->id . '" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.service.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required',
        ]);

        Service::create($input);

        notificationMsg('success','Service Created Successfully');
        return redirect()->route('admin.service');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required',
        ]);

        $service = Service::find($id);
        $service->update($input);

        notificationMsg('success','Service Updated Successfully');
        return redirect()->route('admin.service');
    }

    public function delete($id)
    {

        // delete Service sub menus
        $serviceSubMenus = ServiceSubMenu::where('service_id',$id)->get();
        if(!empty($serviceSubMenus) && $serviceSubMenus->count() > 0){
            foreach($serviceSubMenus as $key => $value){
                $value->delete();
            }
        }

        // delete Service
        Service::find($id)->delete();

        notificationMsg('success','Service Deleted Successfully');
        return redirect()->route('admin.service');
    }
}
