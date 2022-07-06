# migration  

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
