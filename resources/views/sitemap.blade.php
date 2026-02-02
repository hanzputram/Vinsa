<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- Static Pages --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ url('/about') }}</loc>
        <lastmod>2024-01-01T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ url('/product') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>{{ url('/blog') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>{{ url('/contact-us') }}</loc>
        <lastmod>2024-01-01T00:00:00+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

    <!-- Product Pages -->
    @foreach ($products as $product)
        <url>
            <loc>{{ route('product.show', $product->slug) }}</loc>
            @if($product->updated_at)
                <lastmod>{{ $product->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            @endif
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    {{-- Blog Pages --}}
    @foreach ($blogs as $blog)
        <url>
            <loc>{{ route('blog.public', $blog->slug) }}</loc>
            @php
                $date = $blog->published_at ?? $blog->updated_at;
            @endphp
            @if($date)
                <lastmod>{{ $date->tz('UTC')->toAtomString() }}</lastmod>
            @endif
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
