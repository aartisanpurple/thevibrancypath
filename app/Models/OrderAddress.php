<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable = ['order_id', 'address_id'];

    /**
     * Get the order that owns this address.
     */
    public function order()
    {
        return $this->belongsTo(Orders::class); // Use Order::class if your model is named Order
    }

    /**
     * Get the address associated with the order.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
