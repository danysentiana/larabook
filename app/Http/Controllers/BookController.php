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

        $book->category()->attach($request->category_id);

        return redirect()->back()->with('success', 'Book added successfully');
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $book = Book::where('slug', $slug)->first();

        if ($request->hasFile('cover')) {
            $extension = $request->file('cover')->getClientOriginalExtension();
            $coverName = $request->title . '_' . time() . '.' . $extension;
            $request->file('cover')->storeAs('images', $coverName);
        } else {
            $coverName = $book->cover;
        }

        $book->update([
            'title' => $request->title,
            'cover' => $coverName,
        ]);

        $book->category()->sync($request->category_id);

        return redirect()->back()->with('success', 'Book updated successfully');
    }

    public function destroy($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->delete();

        return redirect()->back()->with('success', 'Book deleted successfully');
    }

    public function deleted()
    {
        $books = Book::onlyTrashed()->paginate(7);
        return view('admin.book-list-deleted', ['books' => $books]);
    }

    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();

        return redirect()->back()->with('success', 'Book restored successfully');
    }

    public function permanentlyDelete($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->forceDelete();

        return redirect()->back()->with('success', 'Book permanently deleted successfully');
    }
}
