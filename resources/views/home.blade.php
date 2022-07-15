@extends('layouts.app')

@section('content-app')
    <p>Larastup</p>

    <x-link.text-link 
        classlink="mb-0 hover:text-blue-500" 
        textlink="connexion user"
        link="{{ route('login') }}"
    />

    <x-link.text-link 
        classlink="mb-2 hover:text-blue-500" 
        textlink="création user"
        link="{{ route('register') }}"
    />

    <x-btn.logout/>
@endsection