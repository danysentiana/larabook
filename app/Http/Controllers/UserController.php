<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('admin.user-list', [
            'users' => $users
        ]);
    }

    public function newUser()
    {
        $users = User::where('role_id', 2)->get();
        return view('admin.new-user-list', [
            'users' => $users
        ]);
    }
}
