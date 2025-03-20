<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\AdminAction;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id'; // Custom primary key

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url', // Main image
        'additional_images', // Stores multiple images as JSON
        'category_id',
        'stock_status',
        'discounted',
        'quantity',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discounted' => 'boolean',
        'additional_images' => 'array', // Converts JSON to array automatically
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'product_id', 'product_id');
    }
    
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')
            ->withPivot('quantity', 'subtotal')
            ->withTimestamps();
    }

    public function adminActions(): HasMany
    {
        return $this->hasMany(AdminAction::class);
    }

    public function isOutOfStock(): bool
    {
        return $this->quantity <= 0;
    }
    
    public function getIsInStockAttribute()
    {
        return $this->stock_status === 'in_stock';
    }
}
