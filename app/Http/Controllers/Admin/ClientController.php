<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Client;
use DataTables;

class ClientController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('admin.client.edit',[$row->id]).'" class="edit btn btn-primary btn-sm" style="margin-right:5px;"><i class="fa fa-edit"></i></a>';
                        $btn = $btn.'<a href="' . route('admin.client.delete', $row->id) . '" class="text-white btn btn-danger btn-sm remove-crud" data-id="' . $row->id . '" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.client.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        Client::create($input);

        notificationMsg('success','Client Created Successfully');
        return redirect()->route('admin.client');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('admin.client.edit',compact('client'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $client = Client::find($id);
        $client->update($input);

        notificationMsg('success','Client Updated Successfully');
        return redirect()->route('admin.client');
    }

    public function delete($id)
    {
        Client::find($id)->delete();
        notificationMsg('success','Client Deleted Successfully');
    }
}
