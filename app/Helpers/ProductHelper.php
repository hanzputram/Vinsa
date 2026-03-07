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

    /**
     * Check if the image is an external URL
     */
    public static function isExternal(?string $image): bool
    {
        return !empty($image) && filter_var($image, FILTER_VALIDATE_URL);
    }

    /**
     * Generate srcset attribute value for responsive images.
     * Returns empty string for external URLs (they don't support resize params).
     */
    public static function srcset(?string $image): string
    {
        if (empty($image) || self::isExternal($image)) {
            return '';
        }

        $url = self::imageUrl($image);
        return "{$url}?w=300 300w, {$url}?w=600 600w, {$url} 1000w";
    }
}
