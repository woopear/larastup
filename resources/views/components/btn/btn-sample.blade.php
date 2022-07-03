@props([
    'classdiv' => null, // class div around all component
    'classbtn' => null, // class of btn
])
{{-- slot for text of btn --}}
{{-- in div or btn, add your properties of class custom component --}}

<div class="{{ $classdiv }}">
    {{-- btn --}}
    <button 
        {{ $attributes }}
        class="{{ $classbtn }}"
    >
        {{ $slot }}
    </button>
</div>