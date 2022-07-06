@props([
    'idlabel' => null, // "id" of input and "for" of label
    'name' => null, // name of input et name for error validator
    'iconname' => '', // for icon with input => 'user', 'password'
    'label' => null, // string text of label

    // custom div global
    'classdiv' => '', // add your class custom for div around all component
    
    // custom error
    'classdiverror' => '', // add your class custom for message error

    // custom icon
    'classdivicon' => 'absolute', // add text-color for color icon and top , top equal padding of input

    // custom label
    'classdivlabel' => '', // add your class custom for div around label
    'classlabel' => '', // add your class custom for label

    // custom input
    'classinputforicon' => 'pl-8',
    'classinput' => 'w-full block outline-none', // add text-size font-weight padding text-color bg-color
    'classdivinput' => 'relative', // add custom class div of input 
])

<div class="{{ $classdiv }}">
    {{-- label --}}
    @if ($label)
        <div class="{{ $classdivlabel }}">
            <label for="{{ $idlabel }}" class="{{ $classlabel }}">
                {{ $label }}
            </label>
        </div>
    @endif

    {{-- input with icon --}}
    <div class=" {{ $classdivinput }} ">
        {{-- if icon user --}}
        @if ($iconname == 'user')
            <x-icon.user-svg classdivicon="{{ $classdivicon }}"/>
        @endif

        {{-- if icon password --}}
        @if ($iconname == 'password')
            <x-icon.lock-svg classdivicon="{{ $classdivicon }}"/>
        @endif

        {{-- input --}}
        <input 
            {{ $attributes }} 
            @if($name) name="{{ $name }}" @endif
            @if ($idlabel) id="{{ $idlabel }}" @endif 
            type="text" 
            class="{{ $classinput }} {{ $iconname != '' ? $classinputforicon : '' }}"
        />
    </div>

    {{-- error validator input --}}
    @error($name)
        <p class="{{ $classdiverror }}">{{ $message }}</p>
    @enderror
</div>
