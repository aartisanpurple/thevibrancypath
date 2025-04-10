<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'price', 'stock', 'category_id', 'subcategory_id', 'image', 'image_back', 'image_left', 'course_doc', 'course_url', 'course_status', 'category_type', 'product_status', 'discount_price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
