<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogSection extends Model
{
    protected $fillable = [
        'blog_id','position','subtitle','content','image'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
