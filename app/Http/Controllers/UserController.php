<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'active')->where('role_id', 2)->get();
        return view('admin.user-list', [
            'users' => $users
        ]);
    }

    public function newUser()
    {
        $users = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('admin.new-user-list', [
            'users' => $users
        ]);
    }

    public function detail($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        return view('admin.user-detail', [
            'user' => $user
        ]);
    }
}
