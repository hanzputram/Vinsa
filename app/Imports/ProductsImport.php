<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Skip if kode or name is empty
        if (empty($row['kode']) || empty($row['name'])) {
            return null;
        }

        // Handle category mapping
        $categoryId = null;
        if (!empty($row['category'])) {
            $category = Category::firstOrCreate(['name' => $row['category']]);
            $categoryId = $category->id;
        }

        // Find existing product by kode
        $product = Product::where('kode', $row['kode'])->first();

        if ($product) {
            // Update existing product
            $product->update([
                'name' => $row['name'],
                'description' => $row['description'] ?? $product->description,
                'stock' => $row['stock'] ?? $product->stock,
                'category_id' => $categoryId ?? $product->category_id,
                'meta_title' => $row['meta_title'] ?? $product->meta_title,
                'meta_description' => $row['meta_description'] ?? $product->meta_description,
            ]);
            return null; // Return null so ToModel doesn't try to insert
        }

        // Create new product
        return new Product([
            'name'             => $row['name'],
            'kode'             => $row['kode'],
            'description'      => $row['description'] ?? null,
            'stock'            => $row['stock'] ?? 0,
            'category_id'      => $categoryId,
            'meta_title'       => $row['meta_title'] ?? null,
            'meta_description' => $row['meta_description'] ?? null,
            'image'            => $row['image'] ?? 'default.png', // Fallback for image
        ]);
    }
}

