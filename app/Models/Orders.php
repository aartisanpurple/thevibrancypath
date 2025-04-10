<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\OrderItems;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = ['user_id', 'total_amount', 'order_status', 'payment_status', 'payment_method', 'payment_id'];

    use SoftDeletes;

    public function order_items()
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
