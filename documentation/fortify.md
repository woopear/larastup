# fortify install and config

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