@props([
    'w' => 'w-6',
    'h' => 'h-6',
    'textcolor' => 'text-black',
])

{{-- change svg for add your icon for dark icon --}}

<div class="{{ $textcolor }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="{{ $w }} {{ $h }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
    </svg>
</div>