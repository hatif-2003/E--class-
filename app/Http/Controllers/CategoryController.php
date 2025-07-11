<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.managecategories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
      
        return view("admin.createcategory");
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'cat_title' => 'required|string|min:3|max:255',
            'cat_description' => 'nullable|string|min:5|max:1000',
        ]);
        Category::create($data);
        return redirect()->route('categories.index')->with('toast_success', 'Category created successfully!');

        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.editcategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'cat_title' => 'required|string|min:3|max:255',
            'cat_description' => 'nullable|string|min:5|max:1000',
        ]);
        $category->update($data);
        return redirect()->route('categories.index')->with('toast_success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('toast_success', 'Category deleted successfully!');
    }
}
