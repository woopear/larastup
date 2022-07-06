# livewire  

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
