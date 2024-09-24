<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\UdsnRegs;
use App\Models\Client;
use DataTables;

class UdsnRegController extends AdminController
{
    public function index(Request $request)
    {

        $client = Client::pluck('name','id')->all();

        if ($request->ajax()) {
            $data = UdsnRegs::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('client', function($row){
                        return $row->client->name ?? '';
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('admin.udsn.edit',[$row->id]).'" class="edit btn btn-primary btn-sm" style="margin-right:5px;"><i class="fa fa-edit"></i></a>';
                        $btn = $btn.'<a href="' . route('admin.udsn.delete', $row->id) . '" class="text-white btn btn-danger btn-sm remove-crud" data-id="' . $row->id . '" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action','client'])
                    ->make(true);
        }
        return view('admin.udsnReg.index',compact('client'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validated = $request->validate([
            'client_id' => 'required',
            'udsn_number' => 'required'
        ]);

        UdsnRegs::create($input);

        notificationMsg('success','Udsn Number Created Successfully');
        return redirect()->route('admin.udsn.reg');
    }

    public function edit($id)
    {
        $udsnRegs = UdsnRegs::find($id);
        $client = Client::pluck('name','id')->all();
        return view('admin.udsnReg.edit',compact('udsnRegs','client'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validated = $request->validate([
            'client_id' => 'required',
            'udsn_number' => 'required'
        ]);

        $udsnRegs = UdsnRegs::find($id);
        $udsnRegs->update($input);

        notificationMsg('success','Udsn Number Updated Successfully');
        return redirect()->route('admin.udsn.reg');
    }

    public function delete($id)
    {
        UdsnRegs::find($id)->delete();
        notificationMsg('success','Udsn Number Deleted Successfully');
    }
}
