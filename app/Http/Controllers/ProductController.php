<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // SHOP PAGE (Loads Categories & Best Sellers)
    public function index()
    {
        $categories = Category::all();
        $bestSellers = Product::whereIn('name', [
            'Vortex Runner', 
            'Sweat Hoodie Mens', 
            'Away Football Shirt', 
            'Away Football Shorts'
        ])->get();
    
        return view('shop', compact('categories', 'bestSellers'));
    }

    // DISPLAY A SINGLE PRODUCT
  public function show($id)
{
    $product = Product::findOrFail($id);

    // Extract the main image name without the extension
    $imageBase = pathinfo($product->image_url, PATHINFO_FILENAME);
    $imageDirectory = 'images/';

    // Define all possible images related to the product
    $additionalImages = [
        "{$imageDirectory}{$imageBase}_front.webp",
        "{$imageDirectory}{$imageBase}_back.webp",
        "{$imageDirectory}{$imageBase}_bottom.webp",
        "{$imageDirectory}{$imageBase}_up.webp"
    ];

    // Filter images that actually exist
    $existingImages = array_filter($additionalImages, function ($image) {
        return file_exists(public_path($image));
    });

    return view('products.product', compact('product', 'existingImages'));
}

    
    // DISPLAY PRODUCTS BY CATEGORY
    public function category($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $category->category_id)->get();
        return view('categories.category', compact('category', 'products')); //  Ensure "categories.category" exists
    }

    // SEARCH FUNCTIONALITY
    public function search(Request $request)
    {
        $query = trim($request->input('query'));
    
        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a search term.');
        }
    
        //  Check if the query exactly matches a product
        $product = Product::where('name', 'LIKE', "%{$query}%")->first();
        if ($product) {
            return redirect()->route('product.show', ['id' => $product->product_id]);
        }
    
        //  Check if the query exactly matches a category
        $category = Category::where('name', 'LIKE', "%{$query}%")->first();
        if ($category) {
            return redirect()->route('category.show', ['id' => $category->category_id]);
        }
    
        //  If multiple products match, redirect to the first matching category
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        if ($products->count() > 0) {
            return redirect()->route('category.show', ['id' => $products->first()->category_id]);
        }
    
        //  No results found
        return redirect()->back()->with('error', 'No results found.');
    }
}