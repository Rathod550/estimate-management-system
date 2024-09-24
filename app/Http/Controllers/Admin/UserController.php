<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "";
                        if(empty($row->is_super_admin)){
                            $btn = '<a href="'.route('admin.edit',[$row->id]).'" class="edit btn btn-primary btn-sm" style="margin-right:5px;"><i class="fa fa-edit"></i></a>';
                            $btn = $btn.'<a href="' . route('admin.delete', $row->id) . '" class="text-white btn btn-danger btn-sm remove-crud" data-id="' . $row->id . '" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.user.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $input['password'] = Hash::make($input['password']);

        User::create($input);

        notificationMsg('success','Admin Created Successfully');
        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);


        $user = User::find($id);

        $input['password'] = isset($input['password']) ? Hash::make($input['password']) : $user->password;

        $user->update($input);

        notificationMsg('success','Admin Updated Successfully');
        return redirect()->route('admin.index');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        notificationMsg('success','Admin Deleted Successfully');
    }
}
