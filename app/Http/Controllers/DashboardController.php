<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $countBook = Book::count();
        $countCat = Category::count();
        $countUser = User::where('role_id', '!=', 1)->where('status', 'active')->count();
        return view('admin.dashboard', [
            'countBook' => $countBook,
            'countCat' => $countCat,
            'countUser' => $countUser,]);
    }
}
