<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id'; // Primary key

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'category_id',
        'stock_status',
        'discounted'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discounted' => 'boolean',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    // Relationship with Inventory
    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'product_id', 'product_id');
    }

    // Accessor for stock status
    public function getIsInStockAttribute()
    {
        return $this->stock_status === 'in_stock';
    }
}
