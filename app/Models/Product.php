<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productname',
        'price', 
        'stockquantity', 
        'description', 
        'image', 
        'category_id',
        'subcategory_id',
        'created_at', 
        'updated_at'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }

    public function wishlistItems() {
        return $this->hasMany(WishlistItem::class);
    }

}
