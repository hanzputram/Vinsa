<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAtribute extends Model
{
    use HasFactory;

    protected $table = 'products_atributes';

    protected $fillable = ['product_id', 'field_name', 'field_value'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
