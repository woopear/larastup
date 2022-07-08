@if (isset($textlink))
<a 
    {{ $attributes }} 
    class="{{-- add text-color hover:text-color --}} text-xl cursor-pointer"
>
    {{ $textlink }}
</a>
@endif