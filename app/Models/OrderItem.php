<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {
    protected $table = 'orderitems';

    protected $primaryKey = 'order_item_id'; 
    
    public $timestamps = false; 

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price_at_purchase'];
    
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

}
