<?php

namespace App\Helpers;

class ProductHelper
{
    /**
     * Get the proper image URL for a product.
     * Supports external URLs (Google Drive, etc.) and local storage paths.
     * Converts Google Drive URLs to the most reliable embedding format.
     */
    public static function imageUrl(?string $image): string
    {
        if (empty($image)) {
            return asset('storage/default.png');
        }

        // If it's already a full URL (http/https)
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            // Convert any Google Drive URL to lh3 format for reliable embedding
            return self::convertDriveUrl($image);
        }

        // Otherwise, treat as local storage path
        return asset('storage/' . $image);
    }

    /**
     * Convert Google Drive URLs to the lh3.googleusercontent.com format
     * which is the most reliable for embedding in img tags.
     */
    private static function convertDriveUrl(string $url): string
    {
        // Extract FILE_ID from various Google Drive URL formats
        $fileId = null;

        // Format: drive.google.com/file/d/FILE_ID/...
        if (preg_match('#drive\.google\.com/file/d/([a-zA-Z0-9_-]+)#', $url, $matches)) {
            $fileId = $matches[1];
        }
        // Format: drive.google.com/open?id=FILE_ID
        elseif (preg_match('#drive\.google\.com/open\?id=([a-zA-Z0-9_-]+)#', $url, $matches)) {
            $fileId = $matches[1];
        }
        // Format: drive.google.com/uc?...id=FILE_ID
        elseif (preg_match('#drive\.google\.com/uc\?.*id=([a-zA-Z0-9_-]+)#', $url, $matches)) {
            $fileId = $matches[1];
        }
        // Format: lh3.googleusercontent.com/d/FILE_ID (already correct)
        elseif (preg_match('#lh3\.googleusercontent\.com/d/([a-zA-Z0-9_-]+)#', $url, $matches)) {
            $fileId = $matches[1];
        }

        if ($fileId) {
            return 'https://lh3.googleusercontent.com/d/' . $fileId;
        }

        // Not a Google Drive URL, return as-is
        return $url;
    }

    /**
     * Check if the image is an external URL
     */
    public static function isExternal(?string $image): bool
    {
        return !empty($image) && filter_var($image, FILTER_VALIDATE_URL);
    }

    /**
     * Generate extra img attributes for external images.
     * Returns referrerpolicy="no-referrer" for external URLs to prevent blocking.
     */
    public static function imgAttrs(?string $image): string
    {
        if (self::isExternal($image)) {
            return 'referrerpolicy="no-referrer" crossorigin="anonymous"';
        }
        return '';
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
