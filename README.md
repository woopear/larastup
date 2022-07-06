# larastup  

[config database .env and laragon url](#databaselaragon)  
[config vite](#vite)  
[install config tailwind](#tailwind)   
[install livewire](#livewire)   
[install alpine](#alpine)   
[install unpoly](#unpoly)  
[install config fortify](#fortify)   
[example view blade](#viewblade)   
[example components blade](#componentblade)   
[example middlewares](#middleware)   
[example relations](#relation)   
[example upload](#upload)   
[example migrations](#migration)   

---

## <a name="livewire"></a> livewire  

1. install in composer  
```bash
$ composer require livewire/livewire
```  

2. add livewire in vue  
```html
<html>
    <head>
        <!-- add this -->
        @livewireStyles
    </head>
    <body>
        ...

        <!-- add this -->
        @livewireScripts
    </body>
</html>
```  

3. example create component livewire  
```bash
$ php artisan make:livewire counter
```  
> this command create two files  
> 1 in app/Http/livewire  
> 1 in ressources/views/livewire  

4. include component in vue blade  
```html
<html>
    <head>
        ...
        @livewireStyles
    </head>
    <body>
        <!-- this component -->
        <livewire:counter /> 
    
        ...
    
        @livewireScripts
    </body>
</html>
```  

---

## <a name="alpine"></a> alpine js  

1. install  
```bash
$ npm install alpinejs
```  

2. call in js file in `app.js`  
```js
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()
```  

---

## <a name="unpoly"></a> unpoly js  

1. install  
```bash
$ npm install unpoly --save
```  

2. add import file in `app.js`  
```js
import 'unpoly';
import 'unpoly/unpoly.css';
```  

---

## <a name="fortify"></a> fortify install  

1. install composer  
```bash	
$ composer require laravel/fortify
```  

2. install files of fortify  
```bash
$ php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
```  

3. custom informations of your user table  
    - add properties in `app/Models/User.php`  
    ```php
    // implement MustVerifyEmail
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    class User extends Authenticatable implements MustVerifyEmail {}
    ``` 
    and equally update files =>  
    `app/Actions/Fortify/CreateNewUser.php`  
    change rules validated and properties for create user. 
    with your properties in model user.  
    `app/Actions/Fortify/UpdateUserProfileInformations.php`  
    same as above  
    `database/factories/UserFactory.php`
    same as above  
    `database/migrations/create_users_table.php`  
    same as above  

4. add provider fortify in `config/app.php`  
```php
/*
* Package Service Providers...
*/
App\Providers\FortifyServiceProvider::class,
```  

5. configure `config/fortify.php`  
```php
// comments twoFactor if do you not use that
'features' => [
    Features::registration(),
    Features::resetPasswords(),
    Features::emailVerification(),
    Features::updateProfileInformation(),
    Features::updatePasswords(),
    /*Features::twoFactorAuthentication([
        'confirm' => true,
        'confirmPassword' => true,
        // 'window' => 0,
    ]),*/
],

// change redirect path before connected
'home' => RouteServiceProvider::HOME, // go to class and change HOME  

// created SPA change this with false
'views' => true,
```  

6. add your road for auth in `app/Providers/FortifyServiceProvider.php`  
```php
// in boot() function add your road for authentication app

public function boot()
{
    // EX : display login view 
    Fortify::loginView(function () {
        return view('auth.login');
    });

    // EX : authentication of user (call from forms connexion)
    Fortify::authenticateUsing(function (Request $request) {
        $user = User::where('email', $request->email)->first();
 
        if ($user &&
            Hash::check($request->password, $user->password)) {
            return $user;
        }
    });

    // EX : display register view
    Fortify::registerView(function () {
        return view('auth.register');
    });

    // EX : display view for forgot password
    Fortify::requestPasswordResetLinkView(function () {
        return view('auth.forgot-password');
    });

    // EX : display reset password
    Fortify::resetPasswordView(function ($request) {
        return view('auth.reset-password', ['request' => $request]);
    })

    // for request validate account with email  
    // and after modified the model of user, some as above.
    // implement this.
    // EX : display view for verify email
    Fortify::verifyEmailView(function () {
        return view('auth.verify-email');
    });

    // EX : display view for request password for acces  
    Fortify::confirmPasswordView(function () {
        return view('auth.confirm-password');
    });
}
```  

7. create restricted access with middelware  
```php
// on group route or route add middelware ` 'auth' `
// warning look view for redirect is set in files `config/fortify`  
// EX : add middelware in route 
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth');
// EX : add middelware in group route  
Route::middleware(['auth'])->name('private.')->group(function () {
    // private.dashboard
    Route::get('/dashboard', function () {
    })->name('dashboard');
});
```  

> now create views and feature custom  
> for different request  

---

## <a name="viewblade"></a> views blade  

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

---

## <a name="componentblade"></a> components blade  

- create component with class  
```bash
$ php artisan make:component MyComponent
```  

- create component less class  
```bash
$ php artisan make:component MyComponent --view
```

- input => copy folder ressources/views/components/input  
```php
// properties :
@props([
    'classdiv', // class div around all component
    'classdivlabel', // class div around label
    'classlabel', // class label
    'classinput', // class input
    'label' => null, // le label
    'idlabel' => null, // "id" of input and "for" of label
    'name' => null, // name of input et name for error validator
])
// in div or label or input, add your properties of class custom component
```
- form => copy folder ressources/views/components/form
```php
// properties :
@props([
    'classdiv' => '', // class div around all component
    'classform' => '', // class of form
    'method' => 'POST', // method of form default POST
    'otherMethod' => null, // for method differrent of POST or GET
    'action' => null, // action of form
    'textbtn' => 'Envoyer', // text of btn default 'Envoyer'
])
// slot for content of form
// in div or form, add your properties of class custom component 
```  
- btn => copy folder ressources/views/components/btn  
```php
// properties :
@props([
    'classdiv' => null, // class div around all component
    'classbtn' => null, // class of btn
])
// slot for text of btn
// in div or btn, add your properties of class custom component
```  

**Warning custom your design**  

---

## <a name="middleware"></a> middelware  

- create middleware  
```bash
$ php artisan make:middleware MyName  
```

- example implements roads  
look documentation for more examples
```php
// all roads access for admin role
Route::middleware(['admin'])->name('admin.')->group(function () {
    // name road admin.settings
    Route::get('/settings', function () {
    })->name('settings');
});
```  

- copy files middleware in app/Http/Middleware/IsAdmin.php  
and use this file example for create your custom middleware  
and copy folder Contracts in app/ for a file of interface role  
and update for custom your roles.

- implement middleware in `kernel.php` path `app/Http/kernel.php`  
```php
protected $routeMiddleware = [
    // all middleware ...
    'admin' => \Illuminate\Auth\Middleware\IsAdmin::class,
];
```  

---

## <a name="relation"></a> relation user and role for use middleware  

### - EX : role with user (one to many)

- creation role model and role migration with `php artisan`

- add properties for `role in migration` of role
```php
// code basic in migration/role.php
/*public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
    });
}*/

// EX : add this properties
$table->string('libelle');
```  
- add properties in `model files of role`  
and function for relation of users  
**warning add namespace**  
```php
/**
 * get all users of role
 *
 * @return void
 */
public function users()
{
    return $this->hasMany(User::class);
}

/**
 * properties of role
 *
 * @var array
 */
public $fillable = [
    'libelle',
];
```  
- add properties in `user migration` file  
```php
// relation with role table  
$table->foreignId('role_id')->constrained();
```  
- add function of relation user with role in `User model` file  
**warning add namespace**   
```php
/**
 * get role of user
 *
 * @return void
 */
public function role()
{
    return $this->hasOne(Role::class);
}
```  

### - EX : avatar of user one to one  

- creation avatar model and avatar migration with `php artisan`  

- add properties in `avatar migration` file
```php
// relation user
$table->foreignId('user_id')->constrained()->onDelete('cascade');
```  

- add function of relation user with avatar in `User model` file  
**Waring add namespace**
```php	
/**
 * get avatar of user
 *
 * @return void
 */
public function avatar()
{
    return $this->hasOne(Avatar::class);
}
```  

- add function of relation avatar with user in `Avatar model` file
```php	
/**
 * get user of avatar
 *
 * @return void
 */
public function user()
{
    return $this->belongsTo(User::class);
}
```  

### - many to many  

- create one table intermediaire  
and named in alphabetical order and in the singular  
```php
// EX : article_category
```  

- look documentation for more exemple  

---  

## <a name="upload"></a> upload files  

- create a link of app/public -> storage/app/public  
```bash
$ php artisan storage:link
```

### facade Storage

- upload file in local  
(this example play for upload public  
juste change disks for upload)  
**look documentation for more example**
```php
// here $request->avatar 
// avatar is a name of input in html
Storage::disk('local')->put('avatar', $request->avatar)  

// or if you get a url of file  
$file = Storage::disk('local')->put('avatar', $request->avatar)
// $file == 'path of file'  
```  

- get url of file  
```php
// get path relatif of file
$url = Storage::url($file)
```

- download file  
```php
// down file for users
return Storage::download($file)
```  
### less facade Storage

- upload file less facade Storage
```php
// upload file
$file = $request->file('myinputname')->store('myfolder')

// upload file with new name of file
// warning for extention of file  
$file = $request->file('myinputname')->storeAs('myfolder', 'newnameoffile')  

// get extention of file  
$request->file('myinputname')->extension();

// if do you change disk  
$file = $request->file('myinputname')->storeAs('myfolder', 'newnameoffile', 'namedisk')
```

---

## <a name="migration"></a> migration  

**Waring do you create table with migration controle the order of files migration**

- create migration  
> after install all package  
> and create your migration of tables 
> you can create migrations  
```bash
# first migrate
$ php artisan migrate

# delete all table and migrate  
$ php artisan migrate:fresh  

# reset all table and migrate  
$ php artisan migrate:refresh 
``` 

