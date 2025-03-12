<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10); // Fetch products with their categories
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Fetch all categories for the dropdown
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
            'category_id' => 'required|exists:categories,category_id',
            'stock_status' => 'required|in:in_stock,out_of_stock,pre_order',
            'discounted' => 'boolean'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
            'category_id' => 'required|exists:categories,category_id',
            'stock_status' => 'required|in:in_stock,out_of_stock,pre_order',
            'discounted' => 'boolean'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
   
    public function vortex_runner(){ // Please change this when dynamic searching is added, as well as changing the vortex runner page to a generic "show" style page
        // This function only currently exists to provide minimalist boilerplate code to aid the shopping experience, it is meant for a demo to show the price to users.
        // Please see the vortex_runner.blade.php file for more info.


        // Fetching the vortex runner product
        $product = Product::findOrFail(1);

        // Directly return it
        return view('vortex_runner', compact('product'));
    }

}