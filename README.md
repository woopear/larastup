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

1. install dependencies  
```bash
$ npm i
```  

- install tailwind   
    ```bash
    $ npm install -D tailwindcss postcss autoprefixer  
    $ npx tailwindcss init -p  

    # copy/paste file `tailwind.config.js`
    ```  
- 

2. config `vite.config.js`  
```bash
# copy/paste file `vite.config.js`
```  

3. add files basic for project  
```bash
# copy/paste folder `ressources/views`
```  

4. add files of route for project  
```bash
# copy/paste file `routes/web.php`
```  

5. start server vite 
```bash
$ npm run dev
```  

6. go to browser  
```bash  
http://myproject.test
```  




