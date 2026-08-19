<?php

namespace App\Helpers;

class ProductHelper
{
    /**
     * Get optimized, cached, and WebP-compressed image URL for a product.
     * Automatically converts Google Drive images to Google's high-speed CDN edge with
     * on-the-fly WebP compression (-rw) and dynamic dimension resizing (=w{width}).
     *
     * @param string|null $image
     * @param int $width Max width in pixels (default 450 for cards/grid)
     * @return string
     */
    public static function imageUrl(?string $image, int $width = 450): string
    {
        if (empty($image)) {
            return asset('storage/default.png');
        }

        // If it's already a full URL (http/https)
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return self::convertDriveUrl($image, $width);
        }

        // Otherwise, treat as local storage path
        return asset('storage/' . $image);
    }

    /**
     * Convert Google Drive URLs to Google CDN edge with WebP & dynamic resizing.
     */
    private static function convertDriveUrl(string $url, int $width = 450): string
    {
        $fileId = null;

        // Extract Google Drive / lh3 file ID
        if (preg_match('#(?:drive\.google\.com/(?:file/d/|open\?id=|uc\?.*id=)|lh3\.googleusercontent\.com/d/)([a-zA-Z0-9_-]+)#', $url, $matches)) {
            $fileId = $matches[1];
        }

        if ($fileId) {
            // Appending =w{width}-rw serves optimized WebP format from Google's global edge cache
            return $width > 0
                ? "https://lh3.googleusercontent.com/d/{$fileId}=w{$width}-rw"
                : "https://lh3.googleusercontent.com/d/{$fileId}";
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
     * Generate extra img attributes for optimal rendering performance.
     * Includes referrerpolicy for external CDN and decoding="async".
     */
    public static function imgAttrs(?string $image): string
    {
        if (self::isExternal($image)) {
            return 'referrerpolicy="no-referrer" crossorigin="anonymous" decoding="async"';
        }
        return 'decoding="async"';
    }

    /**
     * Generate responsive srcset attribute value for Google CDN and local images.
     */
    public static function srcset(?string $image): string
    {
        if (empty($image)) {
            return '';
        }

        if (self::isExternal($image)) {
            $url250 = self::imageUrl($image, 250);
            $url500 = self::imageUrl($image, 500);
            $url800 = self::imageUrl($image, 800);
            return "{$url250} 250w, {$url500} 500w, {$url800} 800w";
        }

        $url = self::imageUrl($image);
        return "{$url} 600w";
    }
}
