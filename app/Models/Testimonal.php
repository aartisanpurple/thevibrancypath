<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Testimonal extends Model
{
    protected $table = 'testimonials';
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'message',
        'status',
    ];

    public function getImageAttribute($value)
    {
        return asset($value);
    }
}
