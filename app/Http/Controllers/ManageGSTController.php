<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ManageGSTController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function manage($type)
    {
        Session::put('loginType', $type);
        // dd(Session::get('loginType'));
        return redirect()->route('admin.login');
    }
}
