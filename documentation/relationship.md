# relation user and role for use middleware  

## - EX : role with user (one to many)

- creation role model and role migration with `php artisan`

- add properties for `role in migration` of role
```php
// code basic in migration/role.php
/*public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
    });
}*/

// EX : add this properties
$table->string('libelle');
```  
- add properties in `model files of role`  
and function for relation of users  
**warning add namespace**  
```php
/**
 * get all users of role
 *
 * @return void
 */
public function users()
{
    return $this->hasMany(User::class);
}

/**
 * properties of role
 *
 * @var array
 */
public $fillable = [
    'libelle',
];
```  
- add properties in `user migration` file  
```php
// relation with role table  
$table->foreignId('role_id')->constrained();
```  
- add function of relation user with role in `User model` file  
**warning add namespace**   
```php
/**
 * get role of user
 *
 * @return void
 */
public function role()
{
    return $this->hasOne(Role::class);
}
```  

## - EX : avatar of user one to one  

- creation avatar model and avatar migration with `php artisan`  

- add properties in `avatar migration` file
```php
// relation user
$table->foreignId('user_id')->constrained()->onDelete('cascade');
```  

- add function of relation user with avatar in `User model` file  
**Waring add namespace**
```php	
/**
 * get avatar of user
 *
 * @return void
 */
public function avatar()
{
    return $this->hasOne(Avatar::class);
}
```  

- add function of relation avatar with user in `Avatar model` file
```php	
/**
 * get user of avatar
 *
 * @return void
 */
public function user()
{
    return $this->belongsTo(User::class);
}
```  

## - many to many  

- create one table intermediaire  
and named in alphabetical order and in the singular  
```php
// EX : article_category
```  

- look documentation for more exemple  
