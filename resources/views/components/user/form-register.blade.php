@props([
    'classdiv' => 'w-fit', // class div around all component => custom this for width for input
])

{{-- uncomment the inputs according to your user --}}

<x-form
    {{ $attributes }}
    classdiv="{{ $classdiv }}"
    action="{{ route('register') }}"
    textbtn="Créer"
>
    {{-- select role, delete this, if you not selected the role --}}
    <x-input.select-role/>

    {{-- firstName 
    <x-input.input-sample 
        name="firstName" 
        placeholder="Prénom" 
        required
    /> --}}

    {{-- lastName 
    <x-input.input-sample 
        name="lastName" 
        placeholder="Nom" 
        required
    /> --}}

    {{-- pseudo 
    <x-input.input-sample 
        name="pseudo" 
        placeholder="Pseudo" 
    /> --}}

    {{-- name --}}
    <x-input.input-sample 
        name="name" 
        placeholder="Nom, Prénom" 
        required
    />

    {{-- address 
    <x-input.input-sample 
        name="address" 
        placeholder="Adrresse"
    /> --}}

    {{-- codePost 
    <x-input.input-sample 
        name="codePost" 
        placeholder="Code postal"
    /> --}}

    {{-- city 
    <x-input.input-sample 
        name="city" 
        placeholder="Ville"
    /> --}}

    {{-- phone 
    <x-input.input-sample 
        name="phone" 
        placeholder="Numéro de téléphone"
    /> --}}

    {{-- email --}}
    <x-input.input-sample 
        name="email" 
        placeholder="E-mail" 
        required
    />

    {{-- password --}}
    <x-input.input-sample 
        name="password" 
        placeholder="Mot de passe" 
        type="password" 
        required
    />

    {{-- password_confirmation --}}
    <x-input.input-sample 
        name="password_confirmation" 
        placeholder="Confirmer le mot de passe" 
        type="password" 
        required
    />
</x-form>
