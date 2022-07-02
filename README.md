# larastup

## database  

- config .env for your database  

```bash
DB_CONNECTION=mysql # your name of provider
DB_HOST=127.0.0.1 # host
DB_PORT=3306 # port
DB_DATABASE=laravel # name database
DB_USERNAME=root # name user of database
DB_PASSWORD= # password of user
```

## laragon  

    **before install project in www/  
    folder of laragon restart laragon serve  
    and use url provided of laragon serve**  
```bash
# EX : 
http://folderofproject.test/
```

## vite

1. add assets files in head balise for vite serve  
```html
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
```

2. start vite serve for assets files
```bash
# start vite serve
$ npm i
$ npm run dev 
```  

3. if you don't use serve laragon or other server  
use `php serve`, and look website in `localhost:8000`
```shell
$ cd myproject
$ php artisan serve
```  

## tailwind  

1. before install project laravel, install tailwind  
```bash
$ npm install -D tailwindcss postcss autoprefixer  
$ npx tailwindcss init -p
```  

2. config tailwind.config.js   
```js
// add in key content   
//this may change over time  
//pay attention and look at the documentation
content: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',  
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
```  

3. config app.css `(ressources/css/app.css)`  
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```  

## livewire  

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

3. create component livewire  
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

## alpine js  

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

## unpoly js  

1. install  
```bash
$ npm install unpoly --save
```  

2. add import file in `app.js`  
```js
import 'unpoly';
import 'unpoly/unpoly.css';
```  

## fortify install  

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

6. create restricted access with middelware  
```php
// on group route or route add middelware ` 'auth' `
// warning look view for redirect is set in files `config/fortify`  
// EX : add middelware in route 
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth');
// EX : add middelware in group route  
Route::name('private.')->group(function () {
    Route::get('/', function () {
        // Route assigned name "private.private"...
    })->name('private');

    Route::get('/profil', function () {
        // Route assigned name "private.profil"...
    })->name('profil');
})->middleware('auth');
```  

> now create views and feature custom  
> for different request

## migration  

- create migration  
> after install all package  
> and create your migration of tables 
> you can create migrations  
```bash
$ php artisan migrate
```
