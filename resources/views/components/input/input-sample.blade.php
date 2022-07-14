@props([
    // global
    'classdiv' => 'mb-4', // class of div surrounded a component
    // label
    'classlabel' => 'mb-2', // all except block
    // input
    'classdivinput' => '', // all except relative
    'classinput' => '', // all except padding text-color bg-color
    'classinputforicon' => 'pl-12', // set padding, is different from padding without icon
    // icon front
    'classiconfront' => '', // all except absolute top pl
    // error
    'classdiverror' => '', // add your class custom for message error
])

{{-- you must adjust to your liking, the design between the icon and the input --}}

<div class="{{ $classdiv }}">
    {{-- label --}}
    @if ($label)
        <label for="{{ $forLabel }}" class="block {{ $classlabel }}">
            {{ $label }}
        </label>
    @endif

    
    {{-- box input and icon --}}
    <div class="relative {{ $classdivinput }}">
        {{-- if icon user --}}
        @if ($iconName == 'user')
            <x-icon.user-svg classdiv="absolute top-2 pl-2 {{ $classiconfront }}"/>
        @endif
    
        {{-- if icon password --}}
        @if ($iconName == 'password')
            <x-icon.lock-svg classdiv="absolute top-2 pl-2 {{ $classiconfront }}"/>
        @endif

        {{-- input --}}
        <input 
            {{ $attributes }} 
            @if($name) name="{{ $name }}" @endif
            @if ($forLabel) id="{{ $forLabel }}" @endif 
            type="text" 
            class="w-full block py-2 px-4 text-black bg-gray-200 dark:bg-gray-200 rounded-lg outline-none {{ $classinput }} {{ $iconName ? $classinputforicon : '' }}"
        />
    </div>

    {{-- error validator input --}}
    @error($name)
        <p class="{{ $classdiverror }}">{{ $message }}</p>
    @enderror
</div>