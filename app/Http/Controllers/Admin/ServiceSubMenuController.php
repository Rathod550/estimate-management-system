<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\ServiceSubMenu;
use App\Models\Service;
use DataTables;

class ServiceSubMenuController extends AdminController
{
    public function index($id)
    {
        $service = Service::find($id);
        $serviceSubMenu = ServiceSubMenu::where('service_id',$id)->get();
        return view('admin.serviceSubMenus.index',compact('serviceSubMenu', 'id', 'service'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required',
        ]);

        ServiceSubMenu::create($input);

        notificationMsg('success','Service Sub Menu Created Successfully');
        return redirect()->route('admin.service.sub.menu',[$input['service_id']]);
    }

    public function edit($id)
    {
        $serviceSubMenu = ServiceSubMenu::find($id);
        return view('admin.serviceSubMenus.edit',compact('serviceSubMenu'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validated = $request->validate([
            'name' => 'required',
        ]);

        $serviceSubMenu = ServiceSubMenu::find($id);
        $serviceSubMenu->update($input);

        notificationMsg('success','Service Sub Menu Updated Successfully');
        return redirect()->route('admin.service.sub.menu',[$serviceSubMenu->service_id]);
    }

    public function delete($id)
    {
        $serviceSubMenu = ServiceSubMenu::find($id);
        $serviceId = $serviceSubMenu->service_id;
        $serviceSubMenu->delete();

        notificationMsg('success','Service Sub Menu Deleted Successfully');
    }
}
