<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $method = $request->method();
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin')->withSuccess('Signed in');
            }
            else{
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            }
        }
        else{
            return view('admin.login.login')->withErrors('Login Details are not valid');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
