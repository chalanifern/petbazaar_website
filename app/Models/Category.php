<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'categoryname', 
        'image', 
        'created_at', 
        'updated_at'
    ];

    public function subcategories() {
        return $this->hasMany(Subcategory::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
