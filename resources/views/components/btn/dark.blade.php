@props([
    'type' => 'icon', // change with icon , switch , text, according to your choice
    'justify' => '', // place right, center, left, with justify from tailwind
])

{{-- component with icon or switch or text --}}

<div class="h-fit flex items-center {{ $justify }}">
    @if ($type == 'icon')    
        <button x-data="{dark: localStorage.getItem('theme')}" @click="dark = !dark" class="cursor-pointer" darkmodebtn>
            <template x-if="dark">
                <x-icon.dark-svg />
            </template>
            <template x-if="!dark">
                <x-icon.light-svg />
            </template>
        </button>
    @elseif ($type == 'switch')
        <button class="cursor-pointer" darkmodebtn>
                
        </button>
    @else
        <button class="cursor-pointer" darkmodebtn>
                    
        </button>
    @endif
</div>