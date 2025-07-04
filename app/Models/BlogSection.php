<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'subtitle',
        'content',
        'image',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
