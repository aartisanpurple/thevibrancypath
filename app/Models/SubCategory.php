<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    protected $table = 'subcategory'; // Add this line to specify the table name

    protected $fillable = ['name', 'parent_id', 'status'];  

    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'parent_id');
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
