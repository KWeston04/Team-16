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

    protected $guarded = [];

    /**
     * Product belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * Product can belong to many orders.
     */
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

}
