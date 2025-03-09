<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BasketItems extends Model
{
    use HasFactory;

    protected $primaryKey = 'basket_item_id';
    protected $fillable = ['basket_id', 'product_id', 'quantity'];

    public function basket()
    {
        return $this->belongsTo(Basket::class, 'basket_id', 'basket_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
