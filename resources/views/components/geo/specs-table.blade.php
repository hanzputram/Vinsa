@props([
    'title' => 'Spesifikasi Teknis',
    'specs' => [] // Array of key => value or list of ['name' => '...', 'value' => '...']
])

<div class="geo-specs-table my-6 bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
    @if($title)
        <div class="px-5 py-4 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
            <h3 class="text-base font-bold text-slate-900 m-0 flex items-center gap-2">
                <svg class="w-4 h-4 text-[#066c5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                {{ $title }}
            </h3>
            <span class="text-xs font-semibold text-slate-400">Parameter & Rating</span>
        </div>
    @endif

    <div class="divide-y divide-slate-100 text-sm">
        @if(!empty($specs))
            @foreach($specs as $key => $val)
                @php
                    $label = is_array($val) ? ($val['name'] ?? $key) : (is_string($key) ? $key : ($val->name ?? 'Spesifikasi'));
                    $value = is_array($val) ? ($val['value'] ?? '') : (is_string($key) ? $val : ($val->value ?? ''));
                @endphp
                <div class="grid grid-cols-1 sm:grid-cols-3 p-3.5 px-5 hover:bg-slate-50/50 transition-colors">
                    <dt class="font-medium text-slate-500">{{ $label }}</dt>
                    <dd class="sm:col-span-2 font-semibold text-slate-800 m-0 mt-0.5 sm:mt-0">{{ $value }}</dd>
                </div>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </div>
</div>
