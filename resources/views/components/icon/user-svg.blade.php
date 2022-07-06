@props([
    'w' => 'w-6', // set width here
    'h' => 'h-6', // set height here
    'classdivicon' => 'text-black' // set color here or all class
])

<div class="{{ $classdivicon }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="{{ $w }} {{ $h }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>
</div>