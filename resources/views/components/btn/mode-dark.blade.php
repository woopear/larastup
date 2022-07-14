@props([
    // global
    'type' => 'icon', // change with icon , switch , text, according to your choice
    'justify' => '', // place right, center, left, with justify from tailwind
    // icon
    'classdivicondark' => 'text-black', // class for icon dark
    'classdiviconlight' => 'text-black', // class for icon light
    // switch
    'textswitchdark' => 'Mode dark activé', // the text of the button in switch in dark mode
    'textswitchlight' => 'Mode dark désactivé', // the text of the button in switch in light mode
    'sizeswitch' => 'w-11 h-6', // box of btn switch
    'positionbtnswitch' => 'after:top-[2px] after:left-[2px]', // position btn switch
    'sizebtnswitch' => 'after:h-5 after:w-5', // size of btn switch
    'colorbtnswitch' => 'peer-checked:after:border-white after:bg-white after:border-gray-300', // color and border color of btn switch
    'colorbgbtnswitch' => 'bg-gray-200 dark:bg-gray-700 dark:border-gray-600 peer-checked:bg-green-400', // color background checked or not checked
    // text sample
    'textdark' => 'Activer mode dark', // the text of the button in switch in dark mode
    'textlight' => 'Désactivé mode dark', // the text of the button in switch in light mode
    'classdivtext' => 'hover:text-blue-500',
])

{{-- component with icon or switch or text, default is icon --}}

<div class="h-fit flex items-center {{ $justify }}">
    @if ($type == 'icon')    
        <button x-data="{dark: localStorage.getItem('theme')}" @click="dark = !dark" class="cursor-pointer" darkmodebtn>
            <template x-if="dark">
                <x-icon.dark-svg classdiv="{{ $classdivicondark }}" />
            </template>
            <template x-if="!dark">
                <x-icon.light-svg classdiv="{{ $classdiviconlight }}" />
            </template>
        </button>
    @elseif ($type == 'switch')
        <button class="cursor-pointer flex items-center" >
            <label x-data="{dark: [localStorage.getItem('theme')]}" for="toggle-darkmode" class="inline-flex relative items-center cursor-pointer" >
                <input type="checkbox" value="dark" x-model="dark" id="toggle-darkmode" class="sr-only peer" darkmodebtn>
                <div class="{{ $sizeswitch }} {{ $positionbtnswitch }} {{ $colorbtnswitch }} {{ $sizebtnswitch }} {{ $colorbgbtnswitch }} peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:border after:rounded-full after:transition-all"></div>
                <template x-if="dark[0]">
                    <span class="ml-3 text-sm">
                        {{ $textswitchdark }}
                    </span>
                </template>
                <template x-if="!dark[0]">
                    <span class="ml-3 text-sm">
                        {{ $textswitchlight }}
                    </span>
                </template>
              </label>
        </button>
    @else
        <button x-data="{dark: localStorage.getItem('theme')}" @click="dark = !dark" class="cursor-pointer" darkmodebtn>
            <template x-if="dark">
                <div class="{{ $classdivtext }}">
                    {{ $textlight }}
                </div>
            </template>
            <template x-if="!dark">
                <div class="{{ $classdivtext }}">
                    {{ $textdark }}
                </div>
            </template>  
        </button>
    @endif
</div>