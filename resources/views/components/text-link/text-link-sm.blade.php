@if (isset($textlink))
<a 
    {{ $attributes }} 
    class="{{-- add text-color hover:text-color --}} text-sm cursor-pointer"
>
    {{ $textlink }}
</a>
@endif