@props([
    'name' => 'Vinsa Electric',
    'legalName' => 'PT. Anugerah Tama Sejati',
    'url' => url('/'),
    'logo' => asset('image/vinsalg.png'),
    'description' => 'Solusi perlengkapan kelistrikan industri dan rumah tangga terpercaya di Indonesia. Menyediakan push button switch, box panel listrik, magnetic contactor, MCB, MCCB, pilot lamp, relay, dan komponen distribusi listrik berkualitas tinggi.',
    'email' => 'sales@ATstekno.com',
    'telephone' => '+62-813-3571-5398',
    'sameAs' => [
        'https://wa.me/6281335715398',
        'https://www.instagram.com/vinsa.fr'
    ]
])
@php
$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    '@id' => url('/') . '#organization',
    'name' => $name,
    'legalName' => $legalName,
    'url' => $url,
    'logo' => [
        '@type' => 'ImageObject',
        'url' => $logo,
        'caption' => $name . ' Logo'
    ],
    'image' => $logo,
    'description' => $description,
    'email' => $email,
    'telephone' => $telephone,
    'contactPoint' => [
        [
            '@type' => 'ContactPoint',
            'telephone' => $telephone,
            'contactType' => 'customer support',
            'areaServed' => 'ID',
            'availableLanguage' => ['Indonesian', 'English']
        ],
        [
            '@type' => 'ContactPoint',
            'email' => $email,
            'contactType' => 'sales',
            'areaServed' => 'ID',
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
    'sameAs' => $sameAs
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
