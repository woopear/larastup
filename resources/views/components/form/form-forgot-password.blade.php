@props([
    'classdiv' => 'w-fit', // classdiv arounded all component' 
])

<x-form.form-sample
    {{ $attributes }}
    action="" {{-- your route for reset password of user --}}
    classdiv="{{ $classdiv ? $classdiv : null }}"
    textbtn="Faire une demande"
>
    <x-input.input-sample 
        name="email"
        type="email"
        placeholder="Entrer votre email"
    />
</x-form.form-sample>