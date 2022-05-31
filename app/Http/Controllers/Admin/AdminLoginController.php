<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminLoginController extends Controller
{
    public function register(){
        return view ('admin.admin_register');
    }

    public function registerPost(Request $request){
        // dd($request->all());
        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        return redirect()->route('admin.login');
    }

    public function login(){
        return view ('admin.admin_login');
    }

    public function doLogin(Request $request)
    {
        // dd($request->all());
        $userpost=$request->except('_token');

        // dd($userpost);
        if(Auth::attempt($userpost)){
            return redirect()->route('admin.dashboard')->with('message','Login Successfull!');
        }
            return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('message','Logout Successfull!');
    }
}
