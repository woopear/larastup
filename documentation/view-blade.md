# views blade  

- layouts and partials  
1. create folder layouts in views folder  
2. create two files `app.blade.php`, `private.blade.php`  
```html
<!-- app.blade.php --> 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <title>{{ $titlePage ?? 'Test Laravel' }}</title>
    </head>
    <body>
        <main>
            @yield('content-app')
        </main>
        @livewireScripts
    </body>
</html>

<!-- private.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <title>{{ $titlePage ?? 'Test Laravel' }}</title>
    </head>
    <body>
        <main>
            @yield('content-private')
        </main>
        @livewireScripts
    </body>
</html>
```  
3. use layout in files blade  
```php
// call layout app and call content main app
@extends('layouts.app')

@section('content-app')
    <p class="text-red-500">accueil</p>
@endsection

// call layout private and call content main private
@extends('layouts.private')

@section('content-private')
    <p class="text-red-500">accueil</p>
@endsection
```  
4. for create a section (header, nav, footer, etc...)  
```php
// create folder partials and file header-app.blade.php
// and add in your layouts files with this  
@include('partials.header-app')
```  
5. renome welcome file to home and change route  

6. help form  
```html
<!-- request avec csrf -->
<form method="POST" action="/foo/bar">
    @csrf
    <!-- your content -->
</form>

<!-- change method request for forms -->
<form action="/foo/bar" method="POST">
    @method('PUT')
    <!-- your content -->
</form>

<!-- here is error in blade file, do you configure controller files for return error validator -->
<!-- use error for fom -->
@error('title')<!-- joint with id of input -->
    <div class="alert alert-danger">{{ $message }}</div>
@enderror  

<!-- use many error for fom -->
@error('title', 'name', 'password')<!-- joint with id of input -->
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<!-- use error form directive directly in class for get design custom -->
class="@error('title') is-invalid @enderror"
class="@error('email') is-invalid @else is-valid @enderror"
```  
