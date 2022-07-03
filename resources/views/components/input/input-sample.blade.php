@props([
    'classdiv', // class div around all component
    'classdivlabel', // class div around label
    'classlabel', // class label
    'classinput', // class input
    'label' => null, // le label
    'idlabel' => null, // "id" of input and "for" of label
])
{{-- in div or label or input, add your properties of class custom component --}}

<div class="{{ $classdiv ?? '' }}">
    {{-- label --}}
    @if ($label)
        <div class="{{ $classdivlabel ?? '' }}">
            <label for="{{ $idlabel }}" class="{{ $classlabel ?? '' }}">
                {{ $label }}
            </label>
        </div>
    @endif

    {{-- input --}}
    <input 
        {{ $attributes }} 
        @if ($idlabel) id="{{ $idlabel }}" @endif 
        type="text" 
        class="{{ $classinput ?? '' }}"
    />
</div>
