<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Category;
use App\Models\UdsnRegs;
use App\Models\Estimate;

class AdminHomeController extends AdminController
{
    public function index()
    {
        $adminCount = User::count();
        $estimateCount = Estimate::count();
        $estimateApprovalCount = Estimate::where("admin_approvel",'like',"%".auth()->user()->id."%")->count();
        $clientCount = Client::count();
        $serviceCount = Service::count();
        $categoryCount = Category::count();
        $udsnRegsCount = UdsnRegs::count();
        return view('admin.dashboard',compact('adminCount', 'estimateCount', 'clientCount', 'serviceCount', 'categoryCount', 'udsnRegsCount', 'estimateApprovalCount'));
    }
}
