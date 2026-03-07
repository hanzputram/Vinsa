<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductAtribute;
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

        // Process images (supports Google Drive links or local path)
        $imageValue = $this->processImage($row['image'] ?? null);
        $optionalImageValue = $this->processImage($row['optional_image'] ?? null);

        // Parse specifications from "field_name:field_value|field_name:field_value" format
        $specifications = $this->parseSpecifications($row['specifications'] ?? null);

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

            // Only update optional_image if a new one is provided
            if (!empty($optionalImageValue)) {
                $updateData['optional_image'] = $optionalImageValue;
            }

            $product->update($updateData);

            // Update specifications if provided
            if (!empty($specifications)) {
                // Delete existing attributes and re-create
                $product->attributes()->delete();
                foreach ($specifications as $spec) {
                    ProductAtribute::create([
                        'product_id' => $product->id,
                        'field_name' => $spec['field_name'],
                        'field_value' => $spec['field_value'],
                    ]);
                }
            }

            return null; // Return null so ToModel doesn't try to insert
        }

        // Create new product
        $newProduct = Product::create([
            'name'             => $row['name'],
            'kode'             => $row['kode'],
            'description'      => $row['description'] ?? null,
            'stock'            => $row['stock'] ?? 0,
            'category_id'      => $categoryId,
            'meta_title'       => $row['meta_title'] ?? null,
            'meta_description' => $row['meta_description'] ?? null,
            'image'            => $imageValue ?: 'default.png',
            'optional_image'   => $optionalImageValue,
        ]);

        // Create specifications for new product
        if (!empty($specifications)) {
            foreach ($specifications as $spec) {
                ProductAtribute::create([
                    'product_id' => $newProduct->id,
                    'field_name' => $spec['field_name'],
                    'field_value' => $spec['field_value'],
                ]);
            }
        }

        return null; // We already created the product manually
    }

    /**
     * Parse specifications string into array
     * Format: "field_name:field_value|field_name:field_value"
     *
     * @param string|null $specString
     * @return array
     */
    private function parseSpecifications(?string $specString): array
    {
        if (empty($specString)) {
            return [];
        }

        $specString = trim($specString);
        $specs = [];

        // Split by pipe
        $pairs = explode('|', $specString);

        foreach ($pairs as $pair) {
            $pair = trim($pair);
            if (empty($pair)) continue;

            // Split by first colon only (value might contain colons)
            $colonPos = strpos($pair, ':');
            if ($colonPos !== false) {
                $fieldName = trim(substr($pair, 0, $colonPos));
                $fieldValue = trim(substr($pair, $colonPos + 1));

                if (!empty($fieldName) && !empty($fieldValue)) {
                    $specs[] = [
                        'field_name' => $fieldName,
                        'field_value' => $fieldValue,
                    ];
                }
            }
        }

        return $specs;
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

        // Google Drive: /uc?id=FILE_ID
        if (preg_match('#drive\.google\.com/uc\?.*id=([a-zA-Z0-9_-]+)#', $image, $matches)) {
            return 'https://lh3.googleusercontent.com/d/' . $matches[1];
        }

        // Already lh3 format
        if (preg_match('#lh3\.googleusercontent\.com/d/([a-zA-Z0-9_-]+)#', $image, $matches)) {
            return 'https://lh3.googleusercontent.com/d/' . $matches[1];
        }

        // Return as-is (external URL or local path)
        return $image;
    }
}
