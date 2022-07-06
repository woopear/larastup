# database and laragon  

## find url of project in laragon

before install your project in `c://laragon/www/`  
- restart laragon server  
- use url provided of laragon server    
```bash
# EX : 
http://folderofproject.test/
```  

---

## config .env for your database   

- copy this code and config with your data

```bash
DB_CONNECTION=mysql # your name of provider
DB_HOST=127.0.0.1 # host
DB_PORT=3306 # port
DB_DATABASE=laravel # name database
DB_USERNAME=root # name user of database
DB_PASSWORD= # password of user
```  
