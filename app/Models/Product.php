<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'stock',
        'kode',
        'category_id',
        'image',
        'custom_input', // ✅ Tambahkan ini
    ];

    public function attributes()
    {
        return $this->hasMany(ProductAtribute::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
