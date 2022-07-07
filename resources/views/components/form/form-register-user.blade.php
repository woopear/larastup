@props([
    'classdiv' => 'w-fit', // classdiv arounded all component'
    'textbtn' => 'Créer mon compte', // text of btn
    'action' => null, // your route for reset password of user --}}
])

<x-form.form-sample
    {{ $attributes }}
    action="{{ $action ? $action : null }}" 
    classdiv="{{ $classdiv ? $classdiv : null }}"
    textbtn="{{ $textbtn }}"
>
    {{-- for select of role for create user by admin --}}

    {{-- firstName --}}
    <x-input.input-sample 
        name="firstName"
        placeholder="Votre prénom"
        required
    />

    {{-- lastName --}}
    <x-input.input-sample 
        name="lastName"
        placeholder="Votre nom"
        required
    />

    {{-- address --}}
    <x-input.input-sample 
        name="address"
        placeholder="Votre addresse"
        required
    />

    {{-- codePost --}}
    <x-input.input-sample 
        name="codePost"
        placeholder="Votre addresse"
        required
    />

    {{-- city --}}
    <x-input.input-sample 
        name="city"
        placeholder="Votre ville"
        required
    />

    {{-- email --}}
    <x-input.input-sample 
        name="email"
        type="email"
        placeholder="Votre email"
        required
    />

    {{-- password --}}
    <x-input.input-sample 
        name="password"
        type="password"
        placeholder="Entrer votre mot de passe"
        required
    />

</x-form.form-sample>