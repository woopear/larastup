@props([
    'classdiv' => 'w-fit', // class div around all component => custom this for width for input
])

<x-form
    {{ $attributes }}
    classdiv="{{ $classdiv }}"
    action="{{ route('register') }}"
    textbtn="{{ $textBtn }}"
>
    <x-input.input-sample />
</x-form>
