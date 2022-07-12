# Laragon Server and config database  

## laragon  

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
http://myproject.test/
```  

3. if you don't use serve laragon or other server  
use `php serve`, and look website in `localhost:8000`
```shell
$ cd myproject
$ php artisan serve
```  

## config .env   

- laravel is already preconfigured internally  
you only need to modify the variable  
`DB_CONNECTION` in the `.env`  
file with one of the providers  
implement in `config/database.php` file  
in the `connections` object  
here is the list sqlite, mysql, pgsql, sqlsrv  

- copy this code in files `.env`  
and config with your data

```bash
DB_CONNECTION=mysql # your name of provider
DB_HOST=127.0.0.1 # host
DB_PORT=3306 # port
DB_DATABASE=laravel # name database
DB_USERNAME=root # name user of database
DB_PASSWORD= # password of user
```  
