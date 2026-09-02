@props([
    'items' => [] // Array of ['question' => '...', 'answer' => '...']
])
@if(!empty($items) && is_array($items))
@php
$mainEntity = [];
foreach($items as $faq) {
    if(!empty($faq['question']) && !empty($faq['answer'])) {
        $mainEntity[] = [
            '@type' => 'Question',
            'name' => strip_tags($faq['question']),
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => strip_tags($faq['answer'])
            ]
        ];
    }
}

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $mainEntity
];
@endphp
@if(!empty($mainEntity))
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endif
@endif
