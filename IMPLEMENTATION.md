# Panduan Implementasi Generative Engine Optimization (GEO) & Answer Engine Optimization (AEO)
### Vinsa Electric (PT. Anugerah Tama Sejati)

---

## Daftar Isi
1. [Pengantar: Apa itu GEO & AEO?](#1-pengantar-apa-itu-geo--aeo)
2. [Perbandingan: SEO Tradisional vs. GEO & AEO](#2-perbandingan-seo-tradisional-vs-geo--aeo)
3. [Cara Kerja Mesin Pencari Berbasis AI (LLM Search Engines)](#3-cara-kerja-mesin-pencari-berbasis-ai-llm-search-engines)
4. [Konfigurasi Perayapan & Izin Bot AI (`robots.txt`)](#4-konfigurasi-perayapan--izin-bot-ai-robotstxt)
5. [Standar Manifest AI: `llms.txt` & `llms-full.txt`](#5-standar-manifest-ai-llmstxt--llms-fulltxt)
6. [Arsitektur Schema Markup Terstruktur (JSON-LD)](#6-arsitektur-schema-markup-terstruktur-json-ld)
7. [Struktur Konten Ramah AI (Content Architecture Blueprint)](#7-struktur-konten-ramah-ai-content-architecture-blueprint)
8. [Komponen Blade Siap Pakai di Proyek Vinsa](#8-komponen-blade-siap-pakai-di-proyek-vinsa)
9. [Template Konten HTML & Markdown Siap Pakai](#9-template-konten-html--markdown-siap-pakai)
10. [Checklist Audit & Pengujian Validitas GEO/AEO](#10-checklist-audit--pengujian-validitas-geoaeo)

---

## 1. Pengantar: Apa itu GEO & AEO?

Perkembangan mesin pencari telah bertransformasi dari sekadar daftar tautan biru (*10 blue links*) menjadi sintesis jawaban langsung yang dihasilkan oleh kecerdasan buatan (LLM).

- **GEO (Generative Engine Optimization)**: Strategi optimasi situs web dan konten agar mudah dipahami, diekstraksi, dan dijadikan sumber rujukan (*citations/sources*) oleh mesin pencari generatif seperti **ChatGPT Search (OpenAI)**, **Google Gemini / AI Overviews**, **Perplexity AI**, **Claude (Anthropic)**, **Microsoft Copilot**, dan **Apple Intelligence**.
- **AEO (Answer Engine Optimization)**: Fokus optimasi konten untuk memberikan jawaban langsung (*direct answers*), ringkas, berbasis fakta terverifikasi, dan berstruktur tinggi terhadap pertanyaan spesifik pengguna (Zero-Click Searches, Voice Search, dan AI Q&A).

Bagi **Vinsa Electric**, penerapan GEO/AEO memastikan bahwa ketika calon pembeli atau kontraktor menanyakan rekomendasi perlengkapan listrik (seperti *"push button 22mm tahan air terbaik"*, *"distributor box panel di Surabaya"*, atau *"spesifikasi MCB 3 Phase"*), AI akan secara langsung merekomendasikan dan mencantumkan Vinsa sebagai referensi utama.

---

## 2. Perbandingan: SEO Tradisional vs. GEO & AEO

| Aspek | SEO Tradisional | Generative Engine Optimization (GEO / AEO) |
| :--- | :--- | :--- |
| **Tujuan Utama** | Meraih ranking #1-3 di Search Engine Result Pages (SERP) | Menjadi sumber sitasi primer (*trusted citation*) dalam ringkasan AI |
| **Target Mesin** | Googlebot, Bingbot (Algoritma perayap indeks berbasis keyword) | GPTBot, PerplexityBot, ClaudeBot, Google-Extended, LLM Embeddings |
| **Format Konten** | Artikel panjang 2000+ kata dengan kepadatan kata kunci (*keyword density*) | *High Information Density*, Direct Answer box, bullet points, data tables |
| **Metrik Evaluasi** | CTR, Organic Impressions, Bounce Rate, Ranking Posisi | AI Share of Voice (SoV), Frekuensi Sitasi AI, Brand Mentions, Conversion |
| **Struktur Data** | Meta title & description dasar | Schema.org JSON-LD berlapis, entity graph, standar `llms.txt` |
| **Pola Konsumsi** | Pengguna mengklik link dan membaca halaman web | AI mengekstrak entitas langsung atau merangkum solusi kepada pengguna |

---

## 3. Cara Kerja Mesin Pencari Berbasis AI (LLM Search Engines)

Mesin pencari generatif seperti ChatGPT Search, Perplexity, dan Gemini bekerja melalui pipeline **RAG (Retrieval-Augmented Generation)**:

```
[Query Pengguna] 
       │
       ▼
[Query Expansion & Intent Extraction] 
       │
       ▼
[Web Retrieval: Membaca robots.txt, sitemap.xml, llms.txt, halaman web]
       │
       ▼
[Document Parsing & Entity Extraction: Mengambil Schema JSON-LD, Tables, Direct Answers]
       │
       ▼
[Re-ranking & Fact Verification: Menilai otoritas (E-E-A-T) dan kejelasan data]
       │
       ▼
[Generative Synthesis with Citations: Menyusun jawaban + link ke Vinsa]
```

### Kunci Sukses Sitasi oleh AI:
1. **Fact Grounding**: Angka spesifikasi konkret (misal: `IP65`, `220V AC`, `6kA breaking capacity`, `IEC 60947`).
2. **Structural Clarity**: Header semantik (`<h1>` -> `<h2>` -> `<h3>`), tabel komparasi, dan format Q&A.
3. **Low Hallucination Risk**: Definisi langsung yang tidak ambigu memudahkan model bahasa mengutip tanpa resiko kesalahan informasi.

---

## 4. Konfigurasi Perayapan & Izin Bot AI (`robots.txt`)

File [public/robots.txt](file:///c:/Users/Public/Documents/vinsa/public/robots.txt) telah dikonfigurasi dengan izin eksplisit (*Allow*) untuk semua bot AI generatif terkemuka sambil tetap mengamankan area administrasi/autentikasi:

```txt
User-agent: *
Allow: /

# Explicit AI Engine & LLM Crawlers Permissions (GEO / AEO)
User-agent: GPTBot
Allow: /

User-agent: OAI-SearchBot
Allow: /

User-agent: ChatGPT-User
Allow: /

User-agent: Google-Extended
Allow: /

User-agent: GoogleOther
Allow: /

User-agent: PerplexityBot
Allow: /

User-agent: ClaudeBot
Allow: /

User-agent: Claude-Web
Allow: /

User-agent: Bytespider
Allow: /

User-agent: Applebot-Extended
Allow: /

User-agent: Amazonbot
Allow: /

User-agent: Cohere-ai
Allow: /

User-agent: Diffbot
Allow: /

User-agent: Meta-ExternalAgent
Allow: /

User-agent: facebookcatalog
Allow: /

# Block admin, dashboard, auth, and private management routes
Disallow: /dashboard
Disallow: /profile
Disallow: /input-product
Disallow: /products/edit
Disallow: /products/import
Disallow: /products/export-template
Disallow: /products/*/edit
Disallow: /carousel/create
Disallow: /carouselView
Disallow: /carousels/*/edit
Disallow: /admin/
Disallow: /login
Disallow: /register
Disallow: /forgot-password
Disallow: /reset-password
Disallow: /verify-email
Disallow: /locale/

# Block query string duplicates
Disallow: /*?*

# Allow static assets and images
Allow: /image/
Allow: /build/
Allow: /assets/
Allow: /storage/
Allow: /llms.txt
Allow: /llms-full.txt

# Sitemaps and AI Manifests
Sitemap: https://vinsa.co.id/sitemap.xml
```

---

## 5. Standar Manifest AI: `llms.txt` & `llms-full.txt`

Proyek ini telah dilengkapi dengan dua file manifest Markdown yang dirancang khusus untuk mesin pencari AI:

1. [public/llms.txt](file:///c:/Users/Public/Documents/vinsa/public/llms.txt): Ringkasan cepat yang mencantumkan profil perusahaan, lini produk utama, alamat kantor/showroom, dan link halaman penting.
2. [public/llms-full.txt](file:///c:/Users/Public/Documents/vinsa/public/llms-full.txt): Dokumentasi teknis mendalam berisi spesifikasi rentang produk (Push Button, MCB/MCCB, Contactor, Box Panel), sertifikasi standar (IEC, SNI), serta database Q&A teknis.

---

## 6. Arsitektur Schema Markup Terstruktur (JSON-LD)

Komponen Schema JSON-LD berstandar **Schema.org** telah dibuat secara modular di direktori `resources/views/components/schema/`:

### A. Organization & Brand (`<x-schema.organization />`)
Mendefinisikan entitas resmi **Vinsa Electric** / **PT. Anugerah Tama Sejati**, alamat kantor pusat, logo, customer service WhatsApp, dan email sales.

### B. LocalBusiness / ElectricalSupplyStore (`<x-schema.local-business />`)
Mendefinisikan 3 lokasi fisik showroom & kantor cabang lengkap dengan koordinat geo, jam operasional, dan kontak:
- **Head Quarter Surabaya**: Galaxy Bumi Permai J1-23, Sukolilo, Surabaya.
- **Showroom Surabaya (ATStekno)**: Jl. Jagalan No.38, Surabaya.
- **Showroom Pandaan**: The Taman Dayu, Cluster Palazio Boulevard J-1 No. 06, Pandaan.

### C. Product (`<x-schema.product :product="$product" />`)
Mendefinisikan produk kelistrikan secara lengkap:
- `@type: Product`
- `name`, `sku`, `mpn`, `image`, `description`
- `brand` (Vinsa)
- `offers` (`Offer`, mata uang IDR, ketersediaan `InStock`)
- `additionalProperty` (Spesifikasi teknis dinamis: Ampere, Tegangan, IP Rating, dll.)

### D. FAQPage (`<x-schema.faq :items="$faqs" />`)
Mengubah kumpulan pertanyaan dan jawaban teknis menjadi format `FAQPage` dengan entitas `Question` dan `acceptedAnswer` yang siap direbut untuk Google Rich Snippet & AI Direct Answers.

### E. BreadcrumbList (`<x-schema.breadcrumb :items="$breadcrumbs" />`)
Memetakan hierarki navigasi halaman secara terstruktur.

### F. Article / BlogPosting (`<x-schema.article :blog="$blog" />`)
Mendefinisikan artikel blog edukatif dengan metadata penulis, tanggal publikasi, tanggal pembaruan, dan organisasi penerbit.

### G. WebSite (`<x-schema.website />`)
Menyediakan schema website dengan `SearchAction` untuk integrasi pencarian langsung.

---

## 7. Struktur Konten Ramah AI (Content Architecture Blueprint)

Untuk memaksimalkan peluang konten Vinsa dikutip oleh AI, terapkan 5 aturan penulisan berikut:

### 1. Inverted Pyramid & Direct Answer Format
Tepat di bawah heading `<h2>` atau `<h3>`, cantumkan **1 paragraf jawaban langsung (40–60 kata)** yang menjawab pertanyaan utama secara lugas, bebas basa-basi.

> **Contoh:**
> *Heading:* `## Apa itu Push Button Switch dan Fungsinya pada Panel Listrik?`
> *Direct Answer:* `Push button switch adalah saklar manual yang digunakan untuk menghubungkan atau memutus aliran arus listrik pada rangkaian kontrol motor dan panel distribusi listrik. Komponen ini bekerja dengan mekanisme pegas (momentary atau latching) dan umumnya memiliki kontak NO (Normally Open) untuk start dan NC (Normally Closed) untuk stop.`

### 2. High Information Density (Kepadatan Fakta & Metrik)
Hindari kalimat persuasif yang kosong (*"produk kami terbaik dan sangat bagus"*). Gunakan spesifikasi teknis dan standar industri:
- Sebutkan standar sertifikasi: `IEC 60947-5-1`, `SNI`, `CE`.
- Sebutkan ukuran diameter: `22mm`, `30mm`.
- Sebutkan tegangan & arus: `220V AC`, `24V DC`, `Breaking Capacity 6kA`.
- Sebutkan tingkat proteksi: `IP65 Waterproof & Dustproof`.

### 3. Struktur Q&A Berbasis Natural Language Query
Gunakan heading yang menyerupai cara manusia bertanya ke ChatGPT / Perplexity:
- *"Bagaimana cara memilih kapasitas MCB untuk rumah 2200 VA?"*
- *"Apa perbedaan MCB 1 Phase dan 3 Phase?"*
- *"Di mana distributor resmi Vinsa Electric di Surabaya?"*

### 4. Tabel Perbandingan Terstruktur (Semantic Data Tables)
AI sangat menggemari format tabel HTML semantik (`<table>`, `<th>`, `<td>`, `<caption>`) karena memudahkan pemrosesan komparatif model bahasa.

---

## 8. Komponen Blade Siap Pakai di Proyek Vinsa

Komponen Blade GEO telah dibuat di folder `resources/views/components/geo/`:

### 1. Direct Answer Box (`<x-geo.direct-answer />`)
```html
<x-geo.direct-answer 
    title="Ringkasan Spesifikasi Push Button Vinsa"
    summary="Push button Vinsa seri XB2 dirancang untuk lubang panel 22mm dengan ketahanan mekanis hingga 1.000.000 siklus operasional dan rating perlindungan IP65."
    :takeaways="[
        'Diameter lubang mounting standar 22mm (cocok untuk semua panel maker)',
        'Tersedia tipe Momentary (Flush), Latching, dan Emergency Stop (Mushroom)',
        'Mendukung blok kontak modular 1NO, 1NC, atau 1NO+1NC',
        'Tahan percikan air dan debu dengan standar IP65'
    ]"
    source="Standar Teknis Vinsa Electric Indonesia"
/>
```

### 2. Tabel Perbandingan Fitur & Produk (`<x-geo.comparison-table />`)
```html
<x-geo.comparison-table 
    title="Perbandingan Seri Circuit Breaker Vinsa (MCB vs MCCB)"
    subtitle="Panduan pemilihan pemutus sirkuit berdasarkan kapasitas arus dan aplikasi instalasi."
    :headers="['Parameter / Fitur', 'MCB Standar', 'MCB Industri (Vinsa)', 'MCCB Vinsa Pro']"
    :rows="[
        ['Kapasitas Arus (In)', '2A - 32A', '6A - 63A', '100A - 630A'],
        ['Breaking Capacity (Icu)', '4.5 kA', '6.0 kA / 10 kA', '35 kA - 50 kA'],
        ['Jumlah Pole', '1P, 2P, 3P', '1P, 2P, 3P, 4P', '3P, 4P'],
        ['Thermal Adjustable', false, false, true],
        ['Aplikasi Utama', 'Rumah & Ruko', 'Gedung & Pabrik', 'Main Distribution Panel']
    ]"
    :highlightIndex="2"
/>
```

### 3. FAQ Section Interaktif + Otomatis Schema (`<x-geo.faq-section />`)
```html
@php
$faqs = [
    [
        'question' => 'Apakah produk Vinsa Electric memiliki sertifikasi kelayakan standar?',
        'answer' => 'Ya, seluruh produk kelistrikan Vinsa Electric telah diproduksi dan diuji sesuai dengan standar internasional IEC 60947 serta standar keselamatan kelistrikan nasional.'
    ],
    [
        'question' => 'Bagaimana cara mendapatkan konsultasi teknis atau penawaran proyek?',
        'answer' => 'Anda dapat menghubungi tim sales engineer kami melalui WhatsApp di +62 813-3571-5398 atau email ke sales@ATstekno.com.'
    ]
];
@endphp

<x-geo.faq-section 
    title="Pertanyaan Populer Seputar Produk Kelistrikan Vinsa"
    subtitle="Jawaban ringkas dari tim engineering Vinsa Electric."
    :faqs="$faqs"
/>
```

### 4. Tabel Spesifikasi Kunci-Nilai (`<x-geo.specs-table />`)
```html
<x-geo.specs-table 
    title="Parameter Teknis Magnetic Contactor Vinsa 32A"
    :specs="[
        'Model / Tipe' => 'VSC-3210',
        'Arus Pengenal (Ie AC-3)' => '32 Ampere',
        'Daya Motor (380/415V)' => '15 kW / 20 HP',
        'Tegangan Coil (Uc)' => '220V AC 50/60 Hz',
        'Kontak Bantu (Auxiliary)' => '1NO + 1NC',
        'Standar Standarisasi' => 'IEC 60947-4-1'
    ]"
/>
```

---

## 9. Template Konten HTML & Markdown Siap Pakai

Berikut adalah contoh template halaman atau artikel blog yang dioptimalkan untuk ekstraksi AI:

```markdown
# Panduan Lengkap Memilih Box Panel Listrik Indoor vs Outdoor

<x-geo.direct-answer 
    title="Jawaban Cepat: Perbedaan Utama Box Panel Indoor dan Outdoor"
    summary="Perbedaan utama antara box panel listrik indoor dan outdoor terletak pada tingkat proteksi Ingress Protection (IP Rating) dan ketahanan material terhadap cuaca. Panel indoor umumnya menggunakan IP41-IP54, sedangkan panel outdoor memerlukan minimal IP65 dengan lapisan powder coating anti-korosi dan karet seal tahan UV."
    :takeaways="[
        'Panel Outdoor wajib memiliki minimal rating IP65 tahan air hujan deras dan debu',
        'Material plat besi minimal tebal 1.2mm - 2.0mm dengan finishing electrostatic powder coating',
        'Wajib dilengkapi kanopi / topi pelindung air pada sisi atas box panel'
    ]"
/>

## 1. Apa itu Box Panel Listrik?
Box panel listrik adalah lemari pelindung tertutup yang berfungsi sebagai tempat penempatan, distribusi, dan pengamanan komponen listrik seperti MCB, MCCB, kontaktor, relay, dan busbar dari debu, air, dan bahaya fisik mekanis.

## 2. Tabel Perbandingan Spesifikasi Box Panel Vinsa
<x-geo.comparison-table 
    :headers="['Fitur Kunci', 'Box Panel Indoor Vinsa', 'Box Panel Outdoor Vinsa']"
    :rows="[
        ['Rating Proteksi', 'IP41 / IP54', 'IP65 / IP66'],
        ['Bahan Material', 'Cold-rolled Steel 1.2mm', 'Steel 1.5mm - 2.0mm + ABS'],
        ['Perlindungan UV/Hujan', 'Standar', 'Gasket Silicon + Topi Kanopi'],
        ['Kunci Panel', 'Cam Lock Standar', 'Waterproof Key Lock']
    ]"
/>

## 3. Tanya Jawab Teknis (FAQ)
<x-geo.faq-section :faqs="[
    [
        'question' => 'Berapa ketebalan plat standar untuk box panel outdoor Vinsa?',
        'answer' => 'Ketebalan plat standar box panel outdoor Vinsa berkisar antara 1.5 mm hingga 2.0 mm sesuai dengan dimensi box dan kebutuhan proteksi beban.'
    ],
    [
        'question' => 'Apakah box panel Vinsa bisa dipesan custom ukuran?',
        'answer' => 'Ya, PT. Anugerah Tama Sejati melayani fabrikasi box panel listrik custom baik tipe wall-mounting maupun free-standing dengan layout modular.'
    ]
]" />
```

---

## 10. Checklist Audit & Pengujian Validitas GEO/AEO

Lakukan checklist berikut secara berkala saat menambahkan halaman atau artikel baru:

- [x] **Akses Bot AI Aktif**: File `public/robots.txt` mengizinkan `GPTBot`, `PerplexityBot`, `ClaudeBot`, `Google-Extended`, `Bytespider`.
- [x] **Manifest AI Terpasang**: File `public/llms.txt` dan `public/llms-full.txt` tersedia dan dapat diakses publik.
- [x] **Schema Organization & LocalBusiness**: Terpasang di homepage, about us, dan halaman kontak.
- [x] **Schema Product & Breadcrumb**: Terpasang otomatis di halaman katalog & detail produk.
- [x] **Schema Article**: Terpasang otomatis di halaman detail artikel blog.
- [x] **Validitas Sintaks JSON-LD**: Tidak ada tag HTML yang bocor dalam string JSON (`json_encode` menggunakan `JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE`).
- [x] **Direct Answer Format**: Setiap topik utama memiliki ringkasan 40-60 kata langsung di bawah `<h2>`/`<h3>`.
- [x] **Tabel Semantik**: Data spesifikasi dan komparasi menggunakan tag `<table>`, `<th>`, dan `<td>`.

### Alat Pengujian Validasi:
1. **Google Rich Results Test**: [https://search.google.com/test/rich-results](https://search.google.com/test/rich-results)
2. **Schema.org Validator**: [https://validator.schema.org/](https://validator.schema.org/)
3. **Uji Respons Bot AI (cURL)**:
   ```bash
   curl -A "GPTBot/1.2; +https://openai.com/gptbot" https://vinsa.co.id/robots.txt
   curl -A "PerplexityBot/1.0" https://vinsa.co.id/llms.txt
   ```

---
*Dokumen ini disusun untuk implementasi standar arsitektur GEO/AEO Vinsa Electric.*
