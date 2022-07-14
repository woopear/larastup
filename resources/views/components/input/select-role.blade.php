<div class="text-black mt-4 mb-8">
    {{-- if label exist --}}
    @if($label)
        <label class="text-lg" for="role">{{ $label }}</label>
    @endif
    {{-- option selected for input --}}
    <div class="mt-2 text-lg relative bg-gray-200 rounded-lg">
        <select class="block appearance-none bg-gray-200 rounded-lg py-2 px-4 w-full  outline-none" name="role" id="role">
            <option class="py-4 px-4 text-lg" value="">{{ $placeholder }}</option>
            @foreach ($roles as $role)
                <option class="py-4 px-4 text-lg" value="{{ $role->id }}">{{ $role->libelle }}</option>
            @endforeach
        </select>
        {{-- icon arrow --}}
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>
</div>