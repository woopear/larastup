# test livewire  

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

    - **before install project in www/  
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






