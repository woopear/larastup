@props([
    'classdiv' => 'w-fit', // class div around all component => custom this for width for input
])

<x-form
    {{ $attributes }}
    classdiv="{{ $classdiv }}"
    action="{{ route('login') }}"
    textbtn="Se connecter"
>
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
        classdiv="{{ null }}"
        required
    />

    {{-- forgot password --}}
    <div class="flex justify-end">
        <x-link.text-link 
            classlink="mb-4" 
            textsize="text-xs" 
            textlink="Mot de passe oublié ?"
            link="{{ route('password.request') }}"
        />
    </div>

</x-form>