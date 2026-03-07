<?php

namespace App\Helpers;

class ProductHelper
{
    /**
     * Get the proper image URL for a product.
     * Supports external URLs (Google Drive, etc.) and local storage paths.
     */
    public static function imageUrl(?string $image): string
    {
        if (empty($image)) {
            return asset('storage/default.png');
        }

        // If it's already a full URL (http/https), return as-is
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }

        // Otherwise, treat as local storage path
        return asset('storage/' . $image);
    }
}
