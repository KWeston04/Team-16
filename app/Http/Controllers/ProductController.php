<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show paginated list of products
    public function index()
    {
        $products = Product::with(['category', 'inventory'])->paginate(10);
        return view('products.index', compact('products'));
    }

    // Show form to create a new product
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // Store newly created product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
            'category_id' => 'required|exists:categories,id',
            'stock_status' => 'required|in:in_stock,out_of_stock,pre_order',
            'discounted' => 'sometimes|boolean'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // Show form to edit an existing product
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Update the product information
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
            'category_id' => 'nullable|exists:categories,id',
            'stock_status' => 'required|in:in_stock,out_of_stock,pre_order',
            'discounted' => 'sometimes|boolean'
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Delete a product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    // Show specific product pages dynamically
    public function showProductBySlug($slug)
    {
        $product = Product::where('name', 'LIKE', "%{$slug}%")->first();

        if (!$product) {
            return redirect()->route('shop')->with('error', "Product not found.");
        }

        return view('products.show', compact('product'));
    }

    // Handle search functionality
    public function search(Request $request)
    {
        $query = strtolower(trim($request->input('query')));

        // Special case: Redirect to specific product pages if searched by name
        $productRoutes = [
            'vortex runner' => 'vortex_runner',
            'sweat hoodie mens' => 'sweat_hoodie_mens',
            'away football shirt' => 'away_football_shirt',
            'away football shorts' => 'away_football_shorts'
        ];

        if (array_key_exists($query, $productRoutes)) {
            return redirect()->route($productRoutes[$query]);
        }

        // General search: Search for products by name or description
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        if ($products->count() == 1) {
            return redirect()->route('products.show', ['product' => $products->first()->id]);
        }

        return view('products.search_results', compact('products', 'query'));
    }

    // Show single product details
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}