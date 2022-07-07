@props([
    'classdiv' => 'w-fit', // classdiv arounded all component' 
])

<x-form.form-sample
    {{ $attributes }}
    action="{{-- add route for disconnect user --}}"
    otherMethod="DELETE"
    classdiv="{{ $classdiv ? $classdiv : null }}"
>
<button class="flex items-center" type="submit">
    {{-- add component for disconnect user, add with icon or text etc .. --}}
    {{ $slot }}
</button>
</x-form.form-sample>