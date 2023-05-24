<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
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
            }

            $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        }

    }
}
