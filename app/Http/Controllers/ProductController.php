<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
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
            'category_id' => 'nullable|exists:categories,category_id',
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

    public function vortex_runner() {
        $product = Product::where('name', 'Vortex Runner')->first();
    
        if (!$product) {
            return redirect('/shop')->with('error', 'Vortex Runner product not found.');
        }
    
        return view('vortex_runner', compact('product'));
    }
    
    
    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Special case: Redirect to the vortex_runner page if searched for "Vortex Runner"
        if (strtolower($query) === 'vortex runner') {
            return $this->vortex_runner(); // Use the vortex_runner method
        }
    
        // General search: Search for products by name or description
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
    
        if ($products->count() == 1) {
            // If only one product matches, redirect to its page
            return redirect()->route('products.show', ['id' => $products->first()->product_id]);
        }
    
        // If multiple products match, show a search results page
        return view('products.search_results', compact('products', 'query'));
    }
    
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

}