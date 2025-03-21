<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::with('product')->paginate(10); // Fetch inventory with product details
        return view('inventory.index', compact('inventoryItems'));
    }

    public function create()
    {
        $products = Product::all(); // Fetch all products for dropdown selection
        return view('inventory.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'variant' => 'nullable|max:255',
            'quantity_in_stock' => 'required|integer|min:0',
            'low_stock_threshold' => 'nullable|integer|min:0'
        ]);

        Inventory::create($validated);

        return redirect()->route('inventory.index')->with('success', 'Inventory record created successfully!');
    }

    public function edit(Inventory $inventory)
    {
        $products = Product::all();
        return view('inventory.edit', compact('inventory', 'products'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'variant' => 'nullable|max:255',
            'quantity_in_stock' => 'required|integer|min:0',
            'low_stock_threshold' => 'nullable|integer|min:0'
        ]);

        $inventory->update($validated);

        return redirect()->route('inventory.index')->with('success', 'Inventory record updated successfully!');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Inventory record deleted successfully!');
    }
}