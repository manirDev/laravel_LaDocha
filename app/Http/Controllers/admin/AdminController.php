<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        //dd("is it working");
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login.login');
    }
    public function loginCheck(Request $request)
    {
        return "Hellooooo";
    }
    public function logout(){
        return view('admin.login.login');
    }
}
