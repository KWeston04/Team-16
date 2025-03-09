<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected $table = 'inventory';

    protected $primaryKey = 'inventory_id'; // Primary key

    protected $fillable = [
        'product_id',
        'variant',
        'quantity_in_stock',
        'low_stock_threshold'
    ];

    // The relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    // Check if the stock is low
    public function getIsLowStockAttribute()
    {
        return $this->quantity_in_stock <= $this->low_stock_threshold;
    }
}
