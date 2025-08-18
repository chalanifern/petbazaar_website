<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 
        'paymentstatus', 
        'paymentmethod', 
        'paymentdate', 
        'created_at', 
        'updated_at'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
