<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateCommission extends Model
{
    use HasFactory;

    protected $fillable = ['affiliate_id', 'referred_user_id', 'order_id', 'amount', 'paid'];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    // public function referredUser()
    // {
    //     return $this->belongsTo(User::class, 'referred_user_id');
    // }

    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }
}

