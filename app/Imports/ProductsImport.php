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

        // Process image (supports Google Drive links or local path)
        $imageValue = $this->processImage($row['image'] ?? null);

        // Find existing product by kode
        $product = Product::where('kode', $row['kode'])->first();

        if ($product) {
            // Build update data
            $updateData = [
                'name' => $row['name'],
                'description' => $row['description'] ?? $product->description,
                'stock' => $row['stock'] ?? $product->stock,
                'category_id' => $categoryId ?? $product->category_id,
                'meta_title' => $row['meta_title'] ?? $product->meta_title,
                'meta_description' => $row['meta_description'] ?? $product->meta_description,
            ];

            // Only update image if a new one is provided
            if (!empty($imageValue)) {
                $updateData['image'] = $imageValue;
            }

            $product->update($updateData);
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
            'image'            => $imageValue ?: 'default.png',
        ]);
    }

    /**
     * Process image value - convert Google Drive share links to direct URLs
     *
     * Supported formats:
     * - https://drive.google.com/file/d/FILE_ID/view?usp=sharing
     * - https://drive.google.com/open?id=FILE_ID
     * - https://drive.google.com/uc?id=FILE_ID
     * - Regular URL (kept as-is)
     * - Local path (kept as-is)
     */
    private function processImage(?string $image): ?string
    {
        if (empty($image)) {
            return null;
        }

        $image = trim($image);

        // Google Drive: /file/d/FILE_ID/view
        if (preg_match('#drive\.google\.com/file/d/([a-zA-Z0-9_-]+)#', $image, $matches)) {
            return 'https://lh3.googleusercontent.com/d/' . $matches[1];
        }

        // Google Drive: /open?id=FILE_ID
        if (preg_match('#drive\.google\.com/open\?id=([a-zA-Z0-9_-]+)#', $image, $matches)) {
            return 'https://lh3.googleusercontent.com/d/' . $matches[1];
        }

        // Google Drive: /uc?id=FILE_ID (already correct format, ensure export=view)
        if (preg_match('#drive\.google\.com/uc\?.*id=([a-zA-Z0-9_-]+)#', $image, $matches)) {
            return 'https://lh3.googleusercontent.com/d/' . $matches[1];
        }

        // Return as-is (external URL or local path)
        return $image;
    }
}
