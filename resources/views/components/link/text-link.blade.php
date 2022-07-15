@props([
    'textsize' => 'text-lg', // set size of text
    'textlink' => null, // set text of link
    'classlink' => '', // add class for link
    'link' => null, // link of link
])

@if (isset($textlink))
<a 
    @if($link) href="{{ $link }}" @endif
    class="{{-- add text-color hover:text-color --}} {{ $classlink }} {{ $textsize }} block cursor-pointer"
>
    {{ $textlink }}
</a>
@endif