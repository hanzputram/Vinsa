<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'stock', 'kode', 'image'];

    public function attributes()
    {
        return $this->hasMany(ProductAtribute::class, 'product_id');
    }
}
