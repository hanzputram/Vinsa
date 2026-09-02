@props([
    'branch' => 'all' // 'all', 'surabaya-hq', 'surabaya-showroom', 'pandaan-showroom'
])
@php
$branches = [
    [
        '@context' => 'https://schema.org',
        '@type' => 'ElectricalSupplyStore',
        '@id' => url('/') . '#hq-surabaya',
        'name' => 'Vinsa Electric - Head Quarter Surabaya',
        'alternateName' => 'PT. Anugerah Tama Sejati',
        'url' => url('/'),
        'image' => asset('image/vinsalg.png'),
        'telephone' => '+62-813-3571-5398',
        'email' => 'sales@ATstekno.com',
        'priceRange' => '$$',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Galaxy Bumi Permai J1-23, Sukolilo',
            'addressLocality' => 'Surabaya',
            'addressRegion' => 'Jawa Timur',
            'postalCode' => '60119',
            'addressCountry' => 'ID'
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => -7.301972,
            'longitude' => 112.781761
        ],
        'openingHoursSpecification' => [
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens' => '08:30',
                'closes' => '17:00'
            ],
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => 'Saturday',
                'opens' => '08:30',
                'closes' => '14:00'
            ]
        ]
    ],
    [
        '@context' => 'https://schema.org',
        '@type' => 'ElectricalSupplyStore',
        '@id' => url('/') . '#showroom-surabaya',
        'name' => 'Vinsa Electric - Showroom Surabaya (ATStekno)',
        'url' => url('/'),
        'image' => asset('image/vinsalg.png'),
        'telephone' => '+62-813-3571-5398',
        'email' => 'sales@ATstekno.com',
        'priceRange' => '$$',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Jl. Jagalan No.38, Bongkaran, Kec. Pabean Cantian',
            'addressLocality' => 'Surabaya',
            'addressRegion' => 'Jawa Timur',
            'postalCode' => '60161',
            'addressCountry' => 'ID'
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => -7.248128,
            'longitude' => 112.743077
        ],
        'openingHoursSpecification' => [
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens' => '08:30',
                'closes' => '17:00'
            ],
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => 'Saturday',
                'opens' => '08:30',
                'closes' => '14:00'
            ]
        ]
    ],
    [
        '@context' => 'https://schema.org',
        '@type' => 'ElectricalSupplyStore',
        '@id' => url('/') . '#showroom-pandaan',
        'name' => 'Vinsa Electric - Showroom Pandaan',
        'url' => url('/'),
        'image' => asset('image/vinsalg.png'),
        'telephone' => '+62-813-3571-5398',
        'email' => 'sales@ATstekno.com',
        'priceRange' => '$$',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'The Taman Dayu, Cluster Palazio Boulevard J-1 No. 06',
            'addressLocality' => 'Pandaan, Pasuruan',
            'addressRegion' => 'Jawa Timur',
            'postalCode' => '67156',
            'addressCountry' => 'ID'
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => -7.669940,
            'longitude' => 112.694818
        ],
        'openingHoursSpecification' => [
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens' => '08:30',
                'closes' => '17:00'
            ],
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => 'Saturday',
                'opens' => '08:30',
                'closes' => '14:00'
            ]
        ]
    ]
];

$output = $branch === 'all' ? $branches : array_values(array_filter($branches, fn($b) => str_contains($b['@id'], $branch)));
@endphp

@foreach($output as $schemaItem)
<script type="application/ld+json">
{!! json_encode($schemaItem, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endforeach
