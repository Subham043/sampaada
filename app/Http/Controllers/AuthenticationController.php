<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class AuthenticationController extends Controller
{
    //
    public function index(){
        
        return view('admin.pages.login');
    }

    public function authenticate(Request $request){

        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')->with('success_status', 'Logged in successfully.');
        }

        return redirect('admin/login')->with('error_status', 'Oops! You have entered invalid credentials');
        
        return view('admin.pages.login');
    }

}
