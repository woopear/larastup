# Validator  

## Fast use validator in controller of model

- call function validate on object `$request` of namespace  
Illuminate\Http\Request
```php
use Illuminate\Http\Request;

// without name bag
$validatedData = $request->validate([rules, ...params])

// with name bag
$validatedData = $request->validateWithBag('namebagerror', [rules, ...params])
```  

- add new champs after validator  
```php
$validated = $request->safe()->merge(['name' => 'Taylor Otwell']);
```  

## Create request class validator  

- create request with `php artisan`  
```bash
$ php artisan make:request MyValidatorRequest
```  
> this command creates a validator request class  
> app/Http/Requests/MyValidatorRequest.php  

- use class request validator in controller  
```php
// call this namespace
use App\Http\Requests\MyValidatorRequest;

// add type of object request for apply
class Controller {
    public function store(MyValidatorRequest $request) {
        $testvalidation = $request->validated();
    }
}

```  

- class request example  
```php
// rules for authorized user access form
public function authorize()
{
    return false; // turn with true for access request
}

// add your rules for this request
public function rules()
{
    return [
        'name' => ['required', 'max:255'],
        'age' => ['required'],
    ];
}
```  

- custom message error for input  
```php
// in php file request add this function  
/**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        // message of rule
        'name.required' => 'Le nom est obligatoire',
        'name.max' => 'Le nom doit avoir 15 caracteres maximum',
        'age.required' => "L'age est obligatoire",
    ];
}
```

- add custom redirect if validate fail  
default redirect back view  
```php
// redirect path
protected $redirect = '/my-route-for-redirect';

// redirect route name
protected $redirectRoute = 'my-route-for-redirect';
```  

> look documentation for more examples of properties

## Code for copy example  

- password rules `laravel` provided   
if do you use more example here, implement this rule for password  
```php  
// rules of laravel
Password::min(8) // 8 caracteres minimum
    ->letters() // get one letter
    ->mixedCase() // get one letter lowercase and one letter uppercase
    ->numbers() // get one number
    ->symbols() // get one symbol
    ->uncompromised() // test if password is not compromised

// create a rule default for password of your app  

// in app/Providers/AppServiceProvider.php
use Illuminate\Validation\Rules\Password;

// add rule in this function
public function boot()
{
    Password::defaults(function () {
        // add and custom your rules
        $rule = Password::min(8);

        return $rule;
    });
}

// after add this rule of password in your custom request 

// in your class of request
use Illuminate\Validation\Rules\Password;

// implement rules password in this function
public function rules()
{
    return [
        // other rules ...
        'password' => ['required', Password::defaults()],
    ];
}

// add message of rules password
public function messages()
{
    return [
        // other messages ...
        'password.required' => 'Un mot de passe est obligatoire',
        'password.min' => 'Le mot de passe doit avoir 8 caracteres minimum',
    ];
}
```

- create file `UserConnexionValidator` user connexion validator  
```php
use Illuminate\Validation\Rules\Password;

// rules
return [
    'email' => ['required', 'email'],
    'password' => ['required', Password::defaults()],
]

// messages
return [
    'email.email' => "L'identifiant n'est pas au bon format",
    'email.required' => "Champ obligatoire",
    'password.required' => "Champ obligatoire",
    // add your message of password in relationship with rules for password default
]
```  

- create file `UserCreatedValidator` user created validator  
```php
use Illuminate\Validation\Rules\Password;

// rules
return [
    'firstName' => ['required'],
    'lastName' => ['required'],
    'address' => ['required'],
    'codePost' => ['required'],
    'city' => ['required'],
    'email' => ['required', 'email'],
    'password' => ['required', Password::defaults()],
]

// messages
return [
    'firstName.required' => 'Champ obligatoire',
    'lastName.required' => 'Champ obligatoire',
    'address.required' => 'Champ obligatoire',
    'codePost.required' => 'Champ obligatoire',
    'city.required' => 'Champ obligatoire',
    'email.required' => 'Champ obligatoire',
    'email.email' => 'Votre saisie ne corresponds pas à un email',
    'password.required' => 'Champ obligatoire',
    // add your message of password in relationship with rules for password default
]
```  

- create file `ForgotPassword` forgot password  
```php
// rules
return [
    'email' => ['required', 'email'],
]

// messages
return [
    'email.required' => 'Champ obligatoire',
    'email.email' => 'Votre saisie ne corresponds pas à un email'
]
```

