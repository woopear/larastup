@props([
    'classdiv' => '', // class div around all component
    'classform' => '', // class of form
    'method' => 'POST', // method of form default POST
    'otherMethod' => null, // for method differrent of POST or GET
    'action' => null, // action of form
    'textbtn' => 'Envoyer', // text of btn default 'Envoyer'
])
{{-- slot for content of form --}}
{{-- in div or form, add your properties of class custom component --}}

<div class="{{ $classdiv }}">
    <form 
        class="{{ $classform }}" 
        @if($action) action="{{ $action }}" @endif 
        method="{{ $method }}"
    >
        {{-- method different POST or GET --}}
        @if($otherMethod)
            @method($otherMethod)
        @endif

        {{-- hack --}}
        @csrf

        {{-- content form --}}
        {{ $slot }}

        {{-- btn submit --}}
        <x-btn.btn-sample type="submit">
            {{ $textbtn }}
        </x-btn.btn-sample>
    </form>
</div>