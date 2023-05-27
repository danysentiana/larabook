<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            $user = Auth::user();
            if($user->status != 'active'){
                Auth::logout();
                return back()->with('error', 'Your account is inactive');
                // return redirect()->route('login')->with('error', 'Your account is inactive');
            }

            $request->session()->regenerate();

            if ($user->role_id == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home');
            }

        } else {
            return back()->with('error', 'Your username or password is incorrect');
        }
    }

    public function registeration(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'username' => ['required', 'unique:users', 'alpha_dash'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed']
        ]);

        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);

        return redirect()->route('login')->with('success', 'Your account has been created successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
