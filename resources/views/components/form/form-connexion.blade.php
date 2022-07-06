@props([
    'classdiv' => '', // classdiv arounded all component' 
])

{{-- give the route for action of form --}}
<x-form.form-sample 
    action=""
    classdiv="{{ $classdiv }}"
>
    {{-- input email or identifiant --}}
    <x-input.input-sample 
        name="email" 
        placeholder="Identifiant"
        iconname="user"
        requried
    />

    {{-- input password --}}
    <x-input.input-sample 
        name="password" 
        type="password" 
        iconname="password"
        placeholder="Mot de passe"
        required
    />

    {{-- link for forgot password --}}
    
</x-form.form-sample>