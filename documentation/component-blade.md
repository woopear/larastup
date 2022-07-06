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
    'classdiv', // class div around all component
    'classdivlabel', // class div around label
    'classlabel', // class label
    'classinput', // class input
    'label' => null, // le label
    'idlabel' => null, // "id" of input and "for" of label
    'name' => null, // name of input et name for error validator
])
// in div or label or input, add your properties of class custom component
```
- form => copy folder ressources/views/components/form
```php
// properties :
@props([
    'classdiv' => '', // class div around all component
    'classform' => '', // class of form
    'method' => 'POST', // method of form default POST
    'otherMethod' => null, // for method differrent of POST or GET
    'action' => null, // action of form
    'textbtn' => 'Envoyer', // text of btn default 'Envoyer'
])
// slot for content of form
// in div or form, add your properties of class custom component 
```  
- btn => copy folder ressources/views/components/btn  
```php
// properties :
@props([
    'classdiv' => null, // class div around all component
    'classbtn' => null, // class of btn
])
// slot for text of btn
// in div or btn, add your properties of class custom component
```  

**Warning custom your design**  
