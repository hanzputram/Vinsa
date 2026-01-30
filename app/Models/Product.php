<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'stock',
        'kode',
        'category_id',
        'image',
        'optional_image',
        'datasheet',
        'custom_input',
        'meta_title',
        'meta_description',
    ];

    protected static function booted()
    {
        // Saat create: slug otomatis jika kosong
        static::creating(function ($product) {
            if (blank($product->slug)) {
                $product->slug = static::generateUniqueSlug($product->name);
            } else {
                // kalau user input slug manual, tetap rapikan biar aman (tanpa "/")
                $product->slug = static::generateUniqueSlug($product->slug);
            }
        });

        // Saat update: jika name berubah & slug tidak di-set manual, slug ikut berubah
        static::updating(function ($product) {
            if ($product->isDirty('name') && blank($product->getOriginal('slug'))) {
                // kalau sebelumnya slug kosong (kasus lama), bikin dari name
                $product->slug = static::generateUniqueSlug($product->name, $product->id);
            }

            // Jika name berubah, biasanya kamu memang ingin slug ikut berubah:
            if ($product->isDirty('name')) {
                $product->slug = static::generateUniqueSlug($product->name, $product->id);
            }

            // Kalau slug diedit manual saat update, pastikan aman & unik
            if ($product->isDirty('slug')) {
                $product->slug = static::generateUniqueSlug($product->slug, $product->id);
            }
        });
    }

    /**
     * Generate slug unik
     */
    public static function generateUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $base = Str::slug($value);

        // fallback kalau hasil slug kosong
        if (blank($base)) {
            $base = 'product';
        }

        $slug = $base;
        $i = 2;

        while (static::slugExists($slug, $ignoreId)) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }

    protected static function slugExists(string $slug, ?int $ignoreId = null): bool
    {
        return static::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists();
    }

    public function attributes()
    {
        return $this->hasMany(ProductAtribute::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
