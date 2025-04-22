<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author',
        'slug',
        'published_at',
        'status',
        'image'
    ];
    use SoftDeletes;
    protected $dates = ['published_at'];
    protected $casts = [
        'published_at' => 'datetime', // This will automatically cast the field to Carbon instance
    ];
    // Accessor to strip p tags from content
    public function getContentAttribute($value)
    {
        return str_replace(['<p>', '</p>'], '', $value);
    }
    protected function content(): Attribute
{
    return Attribute::make(
        get: fn ($value) => Purifier::clean($value),
    );
}
}
