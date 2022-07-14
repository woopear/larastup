@props([
    'classdiv' => '', // class div around all component
    'classbtn' => '', // class of btn
])
{{-- slot for text of btn --}}
{{-- in div or btn, add your properties of class custom component --}}

<div class="{{ $classdiv }}">
    {{-- btn --}}
    <button 
        {{ $attributes }}
        class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-700 rounded-lg {{ $classbtn }}"
    >
        {{ $slot }}
    </button>
</div>