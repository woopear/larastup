# Larastup  

**help for laravel projects with**  
- laragon server  
- fortify  
- livewire  
- unpoly  
- alpine  
- tailwind  

> this gives you the start of installation and the basic   
> configurations to start a laravel project quickly  
> follow the different titles to have a ready-to-use project
  
---  

## Laragon server  

> if you don't have a PHP server

1. install laragon [here](https://laragon.org/)  
download [here](http://laragon.org/download)  
download laragon for your machine  
follow the instructions of the installer  

> laragon is an apache server with a layer of mysql,  
> you will find a www folder, in which you will deposit  
> your projects, and provide a local address to test  
> your project, with the format : `myproject.test`  
> you can of course install another server of your choice

2. before install your project laravel in `c://laragon/www/`  
- restart laragon server  
- use url provided of laragon server    
```bash
# EX : 
http://myproject.test
```  

3. if you don't use serve laragon or other server  
use `php serve`, and look website in `localhost:8000`
```shell
$ cd myproject
$ php artisan serve
```  

## Database 

1. config `.env` with your information of database  
```bash
DB_CONNECTION=mysql # your name of provider
DB_HOST=127.0.0.1 # host
DB_PORT=3306 # port
DB_DATABASE=laravel # name database
DB_USERNAME=root # name user of database
DB_PASSWORD= # password of user
```  

## Start your project    

- install dependencies  
```bash
$ npm i
```  

- install Alpinejs  
```bash
$ npm install alpinejs
```  

- install Unpoly  
```bash
$ npm install unpoly --save
```  

- tailwind  

    1. install tailwind, after install :  
    - copy/paste file `tailwind.config.js`  
    - copy/paste folder `ressources/css`  
    - copy/paste folder `ressources/js`  
    - in `ressources/css/app.css` add your uri of front
```bash
$ npm install -D tailwindcss postcss autoprefixer  
$ npx tailwindcss init -p  
```  

- install livewire  
```bash
# install
$ composer require livewire/livewire  

# ex : create component livewire 'counter'
# not use for install
$ php artisan make:livewire counter
```

- fortify

    1. install fortify, after install : 
    - copy code in `app/Models/User.php` and paste in your file  
    - copy code in `database/migrations/create_users_table.php` and paste in your file  
    - copy code in `app/Actions/Fortify/CreateNewUser.php` and paste in your file  
    - copy code in `app/Providers/FortifyServiceProvider.php` and paste in your file  
    ```bash
    # install fortify
    $ composer require laravel/fortify
    $ php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider" 
    ```  
    2. in `app/Providers/RouteServiceProvider.php` change this :  
    ```php
    # old
    public const HOME = '/login';
    # new
    public const HOME = '/private/dashboard';
    ```  
    3. in `config/app.php` add this :  
    ```php
    /*
    * Package Service Providers...
    */
    App\Providers\FortifyServiceProvider::class,
    ```  
    4. in `config/fortify.php` update this :
    ```php
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
    ```  
    5. change message of validator of password  
    - in `vendor/laravel/fortify/src/Rules/Password.php`  
    > check this file and change the password's message  
    > you can also change the password verification rules here

    6. create model and migration and factory of Role  
    after install : 
    - copy code in `database/migrations/create_role_table.php` and paste in your  
    - copy code in `database/factories/RoleFactory.php` and paste in your file  
    - copy code in `app/Models/Role.php` and paste in your file  
    ```bash
    $ php artisan make:model Role -mf
    ```  
    7. copy other folder  
    - copy folder `app/View/`  
    - copy folder `ressources/views`  
    - copy folder `app/Http/Requests`  
    - copy file in `app/Http/Middleware/RoleMiddleware.php`  
    - copy file in `routes/web.php`  

    > look at files related to user,  
    > role and uncomment what you need  
    > and customize as you want  
    
    8. params your provider of mail in file `.env`  
    ```bash	 
    MAIL_MAILER=smtp
    MAIL_HOST=mailhog
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    ```  
    9. execute this for create migration for data in database  
    ```bash
    $ php artisan migrate
    # or
    $ php artisan migrate:refresh
    ```  
    10. execute this for create role of 'root' for your first user  
    ```bash
    $ php artisan tinker
    >>> Role::factory()->count(1)->create();
    >>> Role::factory()->create(['libelle' => 'auth']);
    >>> exit
    # check your database for see is good
    ```  
    > visit http://foldermyproject.test/register  
    > and test register user

- config `vite.config.js`  
```bash
# copy/paste file `vite.config.js`
```  

- add files basic for project  
```bash
# copy/paste folder `ressources/views`
```  

- add files of route for project  
```bash
# copy/paste file `routes/web.php`
```  

- start server vite 
```bash
$ npm run dev
```  

- go to browser  
```bash  
http://myproject.test
```  




