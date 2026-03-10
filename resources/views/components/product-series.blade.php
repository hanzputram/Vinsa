@props(['seriesName', 'items'])

@php
    $getCI = function ($item) {
        $ci = json_decode($item->custom_input, true);
        return is_array($ci) ? $ci : [];
    };
    
    // Convert to collection if it's an array
    $itemCollection = collect($items)->values();
    
    $hasMore = $itemCollection->count() > 2;
    $initial = $itemCollection->take(2);
    $rest = $itemCollection->skip(2);
    $dropdownId = 'dropdown-' . Str::slug($seriesName) . '-' . uniqid();
@endphp

<div class="snap-start w-[100%] sm:w-[80%] md:w-[calc(50%-0.5rem)] flex-shrink-0 bg-white/5 backdrop-blur-md rounded-3xl p-6 border border-white/10 shadow-lg relative flex flex-col h-fit">
    <h4 class="text-md font-bold mb-4 text-white">
        {{ $seriesName }}
    </h4>

    @if ($itemCollection->count())
        <div class="flex flex-col gap-4 w-full flex-1">
            {{-- Initial Set (1-2 Products) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($initial as $productItem)
                    @php $ci = $getCI($productItem); @endphp
                    @include('components.product-card-inner', ['productItem' => $productItem, 'ci' => $ci])
                @endforeach
            </div>

            {{-- Dropdown / Show More Set --}}
            @if ($hasMore)
                <div id="{{ $dropdownId }}" class="grid grid-rows-[0fr] overflow-hidden transition-[grid-template-rows] duration-500 ease-[cubic-bezier(0.4,0,0.2,1)] will-change-[grid-template-rows]">
                    <div class="min-h-0">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                             @foreach ($rest as $productItem)
                                @php $ci = $getCI($productItem); @endphp
                                @include('components.product-card-inner', ['productItem' => $productItem, 'ci' => $ci])
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Trigger Button --}}
                <div class="flex justify-center mt-auto group w-full pt-2 pb-3">
                    <button type="button" 
                        onclick="toggleProductDropdown('{{ $dropdownId }}', this)" 
                        class="px-5 py-2 w-full bg-white/10 hover:bg-white/20 rounded-xl text-white font-semibold text-xs shadow-md backdrop-blur transition-all duration-300 flex items-center justify-center gap-2">
                        <span class="btn-text">{{ __('Show More') }}</span>
                        <svg class="w-4 h-4 transform transition-transform duration-300 btn-icon text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>
            @endif
        </div>
    @else
        <p class="text-sm text-gray-300 italic">{{ __('No products available.') }}</p>
    @endif
</div>
