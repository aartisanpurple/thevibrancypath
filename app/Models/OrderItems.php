<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Orders;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class OrderItems extends Model
{
    protected $table = 'order_items';

    protected $fillable = ['order_id', 'category_id', 'subcategory_id', 'product_id', 'quantity', 'price', 'total_price'];

    use SoftDeletes;

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }   

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()   
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
