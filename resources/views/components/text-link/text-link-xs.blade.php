@if (isset($textlink))
<a 
    {{ $attributes }} 
    class="{{-- add text-color hover:text-color --}} text-xs cursor-pointer"
>
    {{ $textlink }}
</a>
@endif