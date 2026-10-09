@props([
    'name' => 'Vinsa Electric',
    'legalName' => 'PT. Anugerah Tama Sejati',
    'url' => 'https://vinsa.fr',
    'logo' => asset('image/vinsalg.png'),
    'description' => 'Vinsa Electric (vinsa.fr) adalah merek perlengkapan kelistrikan industri dan otomasi terpercaya berstandar internasional (IEC 60947, CE, SNI). Menyediakan solusi komponen panel listrik lengkap: magnetic contactor, push button, pilot lamp, MCCB, MCB, box panel IP65/IP66, dan aksesoris kelistrikan berkualitas tinggi standar global untuk kontraktor, panel maker, dan industri.',
    'email' => 'sales@ATstekno.com',
    'telephone' => '+62-813-3571-5398',
    'sameAs' => [
        'https://vinsa.fr',
        'https://www.instagram.com/vinsa.fr',
        'https://wa.me/6281335715398',
        'https://vinsa.co.id'
    ]
])
@php
$canonicalUrl = $url ?: (app()->environment('production') ? 'https://vinsa.fr' : url('/'));

$schema = [
    '@context' => 'https://schema.org',
    '@type' => ['Organization', 'Corporation', 'Brand'],
    '@id' => 'https://vinsa.fr/#organization',
    'name' => $name,
    'alternateName' => [
        'Vinsa',
        'Vinsa Electric',
        'Vinsa France',
        'Vinsa Electrical Solutions',
        'PT. Anugerah Tama Sejati',
        'ATStekno'
    ],
    'legalName' => $legalName,
    'url' => 'https://vinsa.fr',
    'logo' => [
        '@type' => 'ImageObject',
        'url' => $logo,
        'caption' => 'Vinsa Electric Official Logo',
        'width' => '512',
        'height' => '512'
    ],
    'image' => $logo,
    'description' => $description,
    'slogan' => 'Solusi Perlengkapan Kelistrikan Industri & Komponen Panel Terpercaya',
    'email' => $email,
    'telephone' => $telephone,
    'award' => 'Trusted Industrial Electrical Brand & Switchgear Solution',
    'knowsAbout' => [
        'Low Voltage Electrical Distribution',
        'Industrial Automation & Control Panels',
        'Magnetic AC Contactors & Thermal Overload Relays (CJX2 Series)',
        'Molded Case Circuit Breakers (MCCB)',
        'Miniature Circuit Breakers (MCB)',
        'Industrial Push Button & Selector Switches (22mm & 30mm)',
        'Pilot Lamps & Signal Buzzers',
        'Industrial Enclosures & Waterproof Box Panels (IP65, IP66)',
        'Terminal Blocks, Busbars & Cable Accessories',
        'IEC 60947 & IEC 60898 Electrotechnical Standards',
        'Standard Modular Compatible Electrical Components'
    ],
    'brand' => [
        '@type' => 'Brand',
        'name' => 'Vinsa',
        'alternateName' => 'Vinsa Electric',
        'logo' => $logo,
        'url' => 'https://vinsa.fr',
        'slogan' => 'Premium Electrical Solution for Home, Business & Industry'
    ],
    'contactPoint' => [
        [
            '@type' => 'ContactPoint',
            'telephone' => $telephone,
            'contactType' => 'customer service',
            'areaServed' => ['ID', 'FR', 'Global'],
            'availableLanguage' => ['Indonesian', 'English']
        ],
        [
            '@type' => 'ContactPoint',
            'email' => $email,
            'contactType' => 'technical sales',
            'areaServed' => ['ID', 'FR', 'Global'],
            'availableLanguage' => ['Indonesian', 'English']
        ]
    ],
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Galaxy Bumi Permai J1-23, Sukolilo',
        'addressLocality' => 'Surabaya',
        'addressRegion' => 'Jawa Timur',
        'postalCode' => '60119',
        'addressCountry' => 'ID'
    ],
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name' => 'Katalog Komponen Kelistrikan Vinsa Electric',
        'itemListElement' => [
            [
                '@type' => 'OfferCatalog',
                'name' => 'Magnetic Contactors & Overload Relays',
                'description' => 'Kontaktor AC industri 9A hingga 630A untuk kontrol motor dan otomatisasi listrik berstandar IEC 60947-4.'
            ],
            [
                '@type' => 'OfferCatalog',
                'name' => 'Circuit Breakers (MCB & MCCB)',
                'description' => 'Pemutus arus miniature dan molded case untuk proteksi beban lebih dan hubungan singkat.'
            ],
            [
                '@type' => 'OfferCatalog',
                'name' => 'Push Button & Selector Switches (22mm)',
                'description' => 'Saklar tekan flush, illuminated, dan emergency stop switch berkualitas tinggi.'
            ],
            [
                '@type' => 'OfferCatalog',
                'name' => 'Box Panel & Industrial Enclosures',
                'description' => 'Panel box besi dan ABS dengan proteksi cuaca IP54, IP65, dan IP66.'
            ],
            [
                '@type' => 'OfferCatalog',
                'name' => 'Pilot Lamps & Buzzers',
                'description' => 'Lampu indikator panel LED terang dan hemat energi 220V dan 24V.'
            ]
        ]
    ],
    'sameAs' => $sameAs
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
