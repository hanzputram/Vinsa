@props([
    'title' => null,
    'subtitle' => null,
    'caption' => 'Tabel Perbandingan Fitur dan Spesifikasi',
    'headers' => [], // Array of header labels e.g. ['Fitur / Model', 'Model A', 'Model B', 'Vinsa Pro']
    'rows' => [],    // Array of rows: each row is an array of column values
    'highlightIndex' => null // Optional index of column to highlight (0-based)
])

<div class="geo-comparison-table-wrapper my-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    @if($title || $subtitle)
        <div class="p-5 md:p-6 bg-slate-50/70 border-b border-slate-200">
            @if($title)
                <h3 class="text-lg md:text-xl font-bold text-slate-900 mb-1">{{ $title }}</h3>
            @endif
            @if($subtitle)
                <p class="text-xs md:text-sm text-slate-500 m-0">{{ $subtitle }}</p>
            @endif
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-700 border-collapse">
            <caption class="sr-only">{{ $caption }}</caption>
            @if(!empty($headers))
                <thead class="bg-slate-100/80 text-xs uppercase text-slate-700 tracking-wider border-b border-slate-200">
                    <tr>
                        @foreach($headers as $idx => $header)
                            <th scope="col" class="py-3.5 px-4 md:px-6 font-bold {{ $highlightIndex === $idx ? 'bg-emerald-50 text-[#066c5f] border-x border-emerald-200' : '' }}">
                                {{ $header }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
            @endif
            <tbody class="divide-y divide-slate-100">
                @if(!empty($rows))
                    @foreach($rows as $row)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            @foreach($row as $idx => $cell)
                                @if($idx === 0)
                                    <th scope="row" class="py-3.5 px-4 md:px-6 font-semibold text-slate-900 bg-slate-50/40 whitespace-nowrap {{ $highlightIndex === $idx ? 'bg-emerald-50/60 text-[#066c5f] border-x border-emerald-200' : '' }}">
                                        {!! $cell !!}
                                    </th>
                                @else
                                    <td class="py-3.5 px-4 md:px-6 {{ $highlightIndex === $idx ? 'bg-emerald-50/30 font-semibold text-[#066c5f] border-x border-emerald-200' : '' }}">
                                        @if(is_bool($cell))
                                            @if($cell)
                                                <span class="inline-flex items-center text-emerald-600 font-bold">
                                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                    Ya
                                                </span>
                                            @else
                                                <span class="inline-flex items-center text-slate-400">
                                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                                    Tidak
                                                </span>
                                            @endif
                                        @else
                                            {!! $cell !!}
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                @else
                    {{ $slot }}
                @endif
            </tbody>
        </table>
    </div>
</div>
