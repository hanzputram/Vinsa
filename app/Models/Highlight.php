<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'field_value'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
