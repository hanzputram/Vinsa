@props([
    'name' => 'Vinsa Electric',
    'url' => url('/')
])
@php
$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => $url . '#website',
    'url' => $url,
    'name' => $name,
    'description' => 'Solusi perlengkapan dan komponen kelistrikan industri dan rumah tangga terpercaya di Indonesia.',
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'PT. Anugerah Tama Sejati'
    ],
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => [
            '@type' => 'EntryPoint',
            'urlTemplate' => url('/product') . '?search={search_term_string}'
        ],
        'query-input' => 'required name=search_term_string'
    ]
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
