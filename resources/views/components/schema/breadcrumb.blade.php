@props([
    'items' => [] // Array of ['name' => '...', 'url' => '...']
])
@if(!empty($items) && is_array($items))
@php
$itemList = [];
$position = 1;
foreach ($items as $item) {
    if (!empty($item['name']) && !empty($item['url'])) {
        $itemList[] = [
            '@type' => 'ListItem',
            'position' => $position,
            'name' => $item['name'],
            'item' => $item['url']
        ];
        $position++;
    }
}

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => $itemList
];
@endphp
@if(!empty($itemList))
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endif
@endif
