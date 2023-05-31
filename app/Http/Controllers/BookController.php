<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->paginate(7);
        $categories = Category::all();

        return view('admin.book-list', ['books' => $books, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required'
        ]);

        if ($request->hasFile('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $coverName = $request->title . '_' . time() . '.' . $extension;
            $request->file('cover')->storeAs('images', $coverName);
        } else {
            $coverName = 'default.png';
        }

        $book = Book::create([
            'title' => $request->title,
            'cover' => $coverName,
        ]);

        $book->category()->attach($request->category);

        return redirect()->back()->with('success', 'Book added successfully');
    }
}
