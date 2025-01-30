<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id'; // Primary key

    protected $fillable = [
        'name',
        'parent_category_id'
    ];

    // Self-referencing relationship for parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id', 'category_id');
    }

    // Self-referencing relationship for child categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id', 'category_id');
    }

    // Relationship with Products
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
