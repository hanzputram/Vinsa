<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
        $baseUrl = 'https://vinsa.fr';
    @endphp

    {{-- Static Pages --}}
    <url>
        <loc>{{ $baseUrl }}/</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ $baseUrl }}/about</loc>
        <lastmod>{{ now()->subDays(7)->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.85</priority>
    </url>

    <url>
        <loc>{{ $baseUrl }}/product</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.95</priority>
    </url>

    <url>
        <loc>{{ $baseUrl }}/blog</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.90</priority>
    </url>

    <url>
        <loc>{{ $baseUrl }}/contact-us</loc>
        <lastmod>{{ now()->subDays(7)->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.80</priority>
    </url>

    {{-- Product Pages --}}
    @foreach ($products as $product)
        @if(!empty($product->slug))
        <url>
            <loc>{{ $baseUrl }}/detail/{{ $product->slug }}</loc>
            @if($product->updated_at)
                <lastmod>{{ $product->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            @else
                <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
            @endif
            <changefreq>weekly</changefreq>
            <priority>0.85</priority>
        </url>
        @endif
    @endforeach

    {{-- Category Pages --}}
    @if(isset($categories))
        @foreach ($categories as $category)
            @if(!empty($category->name))
            <url>
                <loc>{{ $baseUrl }}/product/{{ \Illuminate\Support\Str::slug($category->name) }}</loc>
                @if($category->updated_at)
                    <lastmod>{{ $category->updated_at->tz('UTC')->toAtomString() }}</lastmod>
                @else
                    <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
                @endif
                <changefreq>weekly</changefreq>
                <priority>0.85</priority>
            </url>
            @endif
        @endforeach
    @endif

    {{-- Blog Pages --}}
    @foreach ($blogs as $blog)
        @if(!empty($blog->slug))
        <url>
            <loc>{{ $baseUrl }}/blog/{{ $blog->slug }}</loc>
            @php
                $date = $blog->published_at ?? $blog->updated_at;
            @endphp
            @if($date)
                <lastmod>{{ $date->tz('UTC')->toAtomString() }}</lastmod>
            @else
                <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
            @endif
            <changefreq>weekly</changefreq>
            <priority>0.80</priority>
        </url>
        @endif
    @endforeach
</urlset>
