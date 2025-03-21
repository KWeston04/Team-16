<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;  
use App\Models\Product; 

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->paginate(10); // Fetch categories with their parent category
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all(); // Fetch all categories for parent selection
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'parent_category_id' => 'nullable|exists:categories,category_id'
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'parent_category_id' => 'nullable|exists:categories,category_id'
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $category->category_id)->get();
    
        return view('categories.show', compact('category', 'products')); 
    }
      

}