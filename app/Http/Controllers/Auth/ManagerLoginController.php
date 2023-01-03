<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ManagerLoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest:manager')->except('logout');
        $this->middleware('guest:web')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.manager-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     =>  'required|email',
            'password'  =>  'required|min:6'
        ]);

        $credentials = [
            'email'     =>  $request->email,
            'password'  =>  $request->password,
        ];
        
        if(Auth::guard('manager')->attempt($credentials, $request->remember))
        {
            return redirect('/manager');
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/manager/login');
    }
}