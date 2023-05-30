<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        $categories = Category::paginate(8);
        return view('admin.category', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Category added successfully');
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    public function deleted()
    {
        $categories = Category::onlyTrashed()->paginate(8);
        return view('admin.category-deleted', ['categories' => $categories]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();

        return redirect()->back()->with('success', 'Category restored successfully');
    }

    public function permanentlyDelete($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->forceDelete();

        return redirect()->back()->with('success', 'Category permanently deleted successfully');
    }

}
