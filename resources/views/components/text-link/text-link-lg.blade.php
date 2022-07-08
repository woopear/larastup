@if (isset($textlink))
<a 
    {{ $attributes }} 
    class="{{-- add text-color hover:text-color --}} text-lg cursor-pointer"
>
    {{ $textlink }}
</a>
@endif