@props([
    'name' => 'Vinsa Electric',
    'url' => 'https://vinsa.fr'
])
@php
$siteUrl = 'https://vinsa.fr';
$searchUrl = $siteUrl . '/product?search={search_term_string}';

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => $siteUrl . '/#website',
    'url' => $siteUrl,
    'name' => $name,
    'alternateName' => ['Vinsa', 'Vinsa Electric Official', 'Vinsa France', 'vinsa.fr'],
    'description' => 'Website Resmi Vinsa Electric (vinsa.fr) - Solusi komponen kelistrikan industri, switchgear tegangan rendah, panel maker, kontaktor, MCB, MCCB, dan push button berstandar internasional.',
    'publisher' => [
        '@type' => 'Organization',
        '@id' => $siteUrl . '/#organization',
        'name' => 'PT. Anugerah Tama Sejati',
        'url' => $siteUrl,
        'logo' => asset('image/vinsalg.png')
    ],
    'potentialAction' => [
        '@type' => 'SearchAction',
        'target' => [
            '@type' => 'EntryPoint',
            'urlTemplate' => $searchUrl
        ],
        'query-input' => 'required name=search_term_string'
    ],
    'inLanguage' => ['id-ID', 'en-US', 'fr-FR']
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
