@props([
    'classdiv' => 'w-fit', // class div around all component => custom this for width for input
])

<div>
    <form action="{{ route('logout') }}" method="POST">
        {{-- hack --}}
        @csrf
        {{-- btn logout --}}
        <button type="submit">
            <x-icon.logout-door-svg/>
        </button>
    </form>
</div>