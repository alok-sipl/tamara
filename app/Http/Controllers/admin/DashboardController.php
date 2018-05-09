<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Session;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/dashboard');
    }



    /*
     * Name: Logout
     * Created By: AB-SIPL
     * Created Date: 01-May-2018
     * Purpose: Logout page of admin
     */

    public function logout() {
        Auth::logout();
        Session::flush();
        return Redirect::to('/admin');
    }
}
