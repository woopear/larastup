@props([
    'classdiv' => 'w-fit', // class div around all component => custom this for width for input
    'classform' => '', // class of form
    'method' => 'POST', // method of form default POST
    'otherMethod' => null, // for method differrent of POST or GET => PUT , DELETE
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
        <x-btn classdiv="flex justify-end" type="submit">
            {{ $textbtn }}
        </x-btn>
    </form>
</div>