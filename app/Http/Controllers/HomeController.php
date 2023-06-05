<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $category = Category::all();

        if($request->has('search')){
            $books = Book::where('title', 'LIKE', '%' . $request->search . '%')->paginate(5);
        }else{
            $books = Book::paginate(8);
        }

        if($request->has('category')){
            // dd($request->all());
            // multi category filter
            $books = Book::whereHas('category', function($query) use($request){
                $query->whereIn('categories.id', $request->category);
            })->paginate(8);

            $checked_category = $request->category;
        }
        return view('home', [
            'books' => $books,
            'categories' => $category,
            'checked_category' => $checked_category ?? []
        ]);
    }
}
