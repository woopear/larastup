@props([
    'textsize' => 'text-lg', // set size of text
])

@if (isset($textlink))
<a 
    {{ $attributes }} 
    class="{{-- add text-color hover:text-color --}} {{ $textsize }} cursor-pointer"
>
    {{ $textlink }}
</a>
@endif