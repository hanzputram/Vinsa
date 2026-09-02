@props([
    'title' => 'Pertanyaan yang Sering Diajukan (FAQ)',
    'subtitle' => 'Temukan jawaban cepat seputar produk, spesifikasi teknis, dan layanan Vinsa Electric.',
    'faqs' => [], // Array of ['question' => '...', 'answer' => '...']
    'withSchema' => true
])

<section class="geo-faq-section my-12" aria-labelledby="faq-heading">
    <div class="mb-8 text-center md:text-left">
        <span class="text-xs font-black tracking-widest text-[#066c5f] uppercase bg-[#066c5f]/10 px-3.5 py-1.5 rounded-full inline-block mb-3">
            Q&A Knowledge Base
        </span>
        <h2 id="faq-heading" class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">
            {{ $title }}
        </h2>
        @if($subtitle)
            <p class="mt-2 text-slate-500 text-sm md:text-base max-w-2xl">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    <div class="space-y-4">
        @if(!empty($faqs))
            @foreach($faqs as $index => $faq)
                <details class="group bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm transition-all duration-200 hover:border-emerald-300">
                    <summary class="flex items-center justify-between p-5 md:p-6 cursor-pointer font-bold text-slate-900 list-none select-none group-open:bg-slate-50/70 group-open:text-[#066c5f] transition-colors">
                        <span class="flex items-center gap-3 pr-4 text-base md:text-lg">
                            <span class="w-7 h-7 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center text-xs font-bold shrink-0 group-open:bg-[#066c5f] group-open:text-white transition-colors">
                                Q{{ $index + 1 }}
                            </span>
                            {{ $faq['question'] }}
                        </span>
                        <span class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center shrink-0 group-open:rotate-180 transition-transform duration-200 text-slate-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </summary>
                    <div class="p-5 md:p-6 pt-3 md:pt-4 text-slate-600 text-sm md:text-base leading-relaxed border-t border-slate-100 bg-white">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </div>

    @if($withSchema && !empty($faqs))
        <x-schema.faq :items="$faqs" />
    @endif
</section>
