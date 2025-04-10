<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; // Add this line to specify the table name

    protected $fillable = ['name', 'parent_id', 'category_status'];   

    use SoftDeletes;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'parent_id');
    }


}
