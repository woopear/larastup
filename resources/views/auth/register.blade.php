@extends('layouts.app')

@section('content-app')
    {{-- register form --}}
    <p>Création user</p>
    <x-user.form-register/>
@endsection