# components blade  

- create component with class  
```bash
$ php artisan make:component MyComponent
```  

- create component less class  
```bash
$ php artisan make:component MyComponent --view
```

- input => copy folder ressources/views/components/input  
```php
// properties :
@props([
    'idlabel' => null, // "id" of input and "for" of label
    'name' => null, // name of input et name for error validator
    'iconname' => '', // for icon with input => 'user', 'password'
    'label' => null, // string text of label

    // custom div global
    'classdiv' => '', // add your class custom for div around all component
    
    // custom error
    'classdiverror' => '', // add your class custom for message error

    // custom icon
    'classdivicon' => 'absolute', // add text-color for color icon and top , top equal padding of input

    // custom label
    'classdivlabel' => '', // add your class custom for div around label
    'classlabel' => '', // add your class custom for label

    // custom input
    'classinputforicon' => 'pl-8',
    'classinput' => 'w-full block outline-none', // add text-size font-weight padding text-color bg-color
    'classdivinput' => 'relative', // add custom class div of input 
])
```
- form => copy folder ressources/views/components/form
```php
// properties :
@props([
    'classdiv' => 'w-fit', // class div around all component => custom this for width for input
    'classform' => 'w-fit', // class of form
    'method' => 'POST', // method of form default POST
    'otherMethod' => null, // for method differrent of POST or GET => PUT , DELETE
    'action' => null, // action of form
    'textbtn' => 'Envoyer', // text of btn default 'Envoyer'
])
// slot for content of form
// in div or form, add your properties of class custom component 
```  
- form-connexion => copy folder ressources/views/components/form  
```php
// properties :
@props([
    'classdiv' => 'w-fit', // classdiv arounded all component' 
])
{{ $attributes }} // add other attributes in balise of component
```  
- form-disconnect-user => copy folder ressources/views/components/form
```php
// properties :
@props([
    'classdiv' => 'w-fit', // classdiv arounded all component' 
])
{{ $attributes }} // add other attributes in balise of component
$slot // add icon or text in slot of component
```
- form-reset-password => copy folder ressources/views/components/form
```php
// properties :
@props([
    'classdiv' => 'w-fit', // classdiv arounded all component' 
])
{{ $attributes }} // add other attributes in balise of component
```  
- form-register-user => copy folder ressources/views/components/form
```php
// properties :
@props([
    'classdiv' => 'w-fit', // classdiv arounded all component'
    'textbtn' => 'Créer mon compte', // text of btn
    'action' => null, // your route for reset password of user --}}
])
{{ $attributes }} // add other attributes in balise of component
```
- btn-sample => copy folder ressources/views/components/btn  
```php
// properties :
@props([
    'classdiv' => null, // class div around all component
    'classbtn' => null, // class of btn
])
// slot for text of btn
// in div or btn, add your properties of class custom component
```  
- btn-sample-text => copy folder ressources/views/components/btn  
```php
// properties :
@props([
    'classdiv' => null, // class div around all component
    'classbtn' => null, // class of btn
])
// slot for text of btn
// in div or btn, add your properties of class custom component
``` 
- text-link-custom => copy folder ressources/views/components/text-link  
```php
// properties :

// add other attributes in balise of component
// add href on balide of component
{{ $attributes }} 

$textlink // text of link 

@props([
    'textsize' => 'text-lg', // set size of text
])
```  
- text-link-xs => copy folder ressources/views/components/text-link  
```php
// properties :

// add other attributes in balise of component
// add href on balide of component
{{ $attributes }} 

$textlink // text of link 
```  
- text-link-sm => copy folder ressources/views/components/text-link  
```php
// properties :

// add other attributes in balise of component
// add href on balide of component
{{ $attributes }} 

$textlink // text of link 
```  
- text-link-lg => copy folder ressources/views/components/text-link  
```php
// properties :

// add other attributes in balise of component
// add href on balide of component
{{ $attributes }} 

$textlink // text of link 
```  
- text-link-xl => copy folder ressources/views/components/text-link  
```php
// properties :

// add other attributes in balise of component
// add href on balide of component
{{ $attributes }} 

$textlink // text of link 
```  
- user-svg => copy folder ressources/views/components/icon  
```php
// properties :
@props([
    'w' => 'w-6', // set width here
    'h' => 'h-6', // set height here
    'classdivicon' => 'text-black' // set color here or all class
])
```  
- lock-svg => copy folder ressources/views/components/icon  
```php
// properties :
@props([
    'w' => 'w-6', // set width here
    'h' => 'h-6', // set height here
    'classdivicon' => 'text-black' // set color here or all class
])
```  
- logout-door-svg => copy folder ressources/views/components/icon
```php
// properties :
@props([
    'w' => 'w-6', // set width here
    'h' => 'h-6', // set height here
    'classdivicon' => 'text-black' // set color here or all class
])
```

**Warning custom your design**  
