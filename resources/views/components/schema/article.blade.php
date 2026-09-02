@props([
    'blog',
    'author' => 'Tim Teknis Vinsa Electric'
])
@php
use Illuminate\Support\Str;

$articleUrl = isset($blog->slug) ? route('blog.public', $blog->slug) : url()->current();

$rawImage = $blog->image ?? null;
if (!empty($rawImage)) {
    $articleImage = Str::startsWith($rawImage, ['http://', 'https://']) ? $rawImage : asset($rawImage);
} else {
    $articleImage = asset('image/vinsalg.png');
}

$articleTitle = $blog->title ?? 'Artikel Kelistrikan Vinsa';
$datePublished = !empty($blog->published_at) 
    ? $blog->published_at->tz('UTC')->toAtomString() 
    : (!empty($blog->created_at) ? $blog->created_at->tz('UTC')->toAtomString() : now()->tz('UTC')->toAtomString());
$dateModified = !empty($blog->updated_at) ? $blog->updated_at->tz('UTC')->toAtomString() : $datePublished;
$articleDesc = !empty($blog->content) ? Str::limit(strip_tags($blog->content), 240) : 'Panduan dan wawasan teknis kelistrikan dari Vinsa Electric.';

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    '@id' => $articleUrl . '#article',
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => $articleUrl
    ],
    'headline' => $articleTitle,
    'description' => $articleDesc,
    'image' => [$articleImage],
    'datePublished' => $datePublished,
    'dateModified' => $dateModified,
    'inLanguage' => 'id-ID',
    'author' => [
        '@type' => 'Person',
        'name' => $author
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Vinsa Electric',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => asset('image/vinsalg.png')
        ]
    ]
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
