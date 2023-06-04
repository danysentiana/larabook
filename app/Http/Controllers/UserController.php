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

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $user->status = 'active';
        $user->save();
        return redirect()->route('user-list')->with('success', 'User has been approved');
    }

    public function remove($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $user->delete();
        return redirect()->route('user-list')->with('success', 'User has been removed');
    }

    public function deleted()
    {
        $users = User::onlyTrashed()->paginate(7);
        return view('admin.user-list-deleted', [
            'users' => $users
        ]);
    }

    public function restore($slug)
    {
        $user = User::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $user->restore();
        return redirect()->route('user-list')->with('success', 'User has been restored');
    }

    public function permanentlyDelete($slug)
    {
        $user = User::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $user->forceDelete();
        return redirect()->route('user-list')->with('success', 'User has been deleted permanently');
    }
}
