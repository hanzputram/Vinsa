@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#066C5F] focus:ring-[#066C5F] rounded-md shadow-sm']) }}>
