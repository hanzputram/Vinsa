@props([
    'title' => 'Ringkasan Cepat (Direct Answer)',
    'summary' => '',
    'takeaways' => [],
    'source' => null,
    'badge' => 'AI Overview / Quick Summary'
])

<aside class="geo-direct-answer my-6 p-6 rounded-2xl bg-gradient-to-br from-emerald-50/80 via-teal-50/40 to-slate-50 border border-emerald-200/70 shadow-sm text-slate-800" aria-label="{{ $title }}">
    <div class="flex items-center justify-between gap-3 mb-3 pb-3 border-b border-emerald-100">
        <div class="flex items-center gap-2.5">
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-xl bg-[#066c5f] text-white shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </span>
            <h4 class="text-base font-bold text-slate-900 tracking-tight m-0">{{ $title }}</h4>
        </div>
        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100/80 text-[#066c5f] border border-emerald-200">
            {{ $badge }}
        </span>
    </div>

    @if(!empty($summary))
        <p class="text-slate-700 text-sm md:text-base leading-relaxed mb-4 font-normal">
            {{ $summary }}
        </p>
    @endif

    {{ $slot }}

    @if(!empty($takeaways) && is_array($takeaways))
        <div class="mt-4 pt-3 border-t border-emerald-100/60">
            <p class="text-xs font-bold uppercase tracking-wider text-[#066c5f] mb-2 flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Poin Kunci / Key Takeaways:
            </p>
            <ul class="space-y-1.5 pl-0 list-none text-xs md:text-sm text-slate-600">
                @foreach($takeaways as $point)
                    <li class="flex items-start gap-2">
                        <span class="text-[#0dd8bd] font-bold mt-0.5">•</span>
                        <span>{{ $point }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!empty($source))
        <div class="mt-3 text-right">
            <span class="text-[11px] text-slate-400 italic">Sumber rujukan: {{ $source }}</span>
        </div>
    @endif
</aside>
