<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Category;
use DataTables;

class CategoryController extends AdminController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('admin.category.edit',[$row->id]).'" class="edit btn btn-primary btn-sm" style="margin-right:5px;"><i class="fa fa-edit"></i></a>';
                        $btn = $btn.'<a href="' . route('admin.category.delete', $row->id) . '" class="text-white btn btn-danger btn-sm remove-crud" data-id="' . $row->id . '" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.category.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create($input);

        notificationMsg('success','Category Created Successfully');
        return redirect()->route('admin.category');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        $category = Category::find($id);
        $category->update($input);

        notificationMsg('success','Category Updated Successfully');
        return redirect()->route('admin.category');
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        notificationMsg('success','Category Deleted Successfully');
    }
}
