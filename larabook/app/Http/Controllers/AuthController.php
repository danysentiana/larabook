<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status != 'active') {
                return redirect('login')->with('error', 'Your account is not active');
                // Session::flash('message', 'Your account is not active');
            } else {
                // $request->session()->regenerate();
                return redirect()->intended('/');
            }
            // $request->session()->regenerate();
            // return redirect()->intended('/');
        }

    }
}
