<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $category = Category::all();

        if($request->has('search') && $request->has('category')){
            $books = Book::where('title', 'LIKE', '%' . $request->search . '%')->whereHas('category', function($query) use($request){
                $query->whereIn('categories.id', $request->category);
            })->orderBy('title', 'asc')->paginate(8);

            $checked_category = $request->category;
        }else{
            $books = Book::orderBy('title', 'asc')->paginate(8);
        }

        return view('home', [
            'books' => $books,
            'categories' => $category,
            'checked_category' => $checked_category ?? []
        ]);
    }
}
