# middelware  

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
