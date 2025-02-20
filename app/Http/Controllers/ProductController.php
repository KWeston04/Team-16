<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'inventory'])->paginate(10);
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

    public function getShopData()
    {
        $products = Product::with(['category', 'inventory'])->get();
        $categories = Category::all();

        return response()->json([
            'products' => $products,
            'categories' => $categories
        ]);
    }
}