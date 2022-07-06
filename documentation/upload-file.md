# upload files  

- create a link of app/public -> storage/app/public  
```bash
$ php artisan storage:link
```

## facade Storage

- upload file in local  
(this example play for upload public  
juste change disks for upload)  
**look documentation for more example**
```php
// here $request->avatar 
// avatar is a name of input in html
Storage::disk('local')->put('avatar', $request->avatar)  

// or if you get a url of file  
$file = Storage::disk('local')->put('avatar', $request->avatar)
// $file == 'path of file'  
```  

- get url of file  
```php
// get path relatif of file
$url = Storage::url($file)
```

- download file  
```php
// down file for users
return Storage::download($file)
```  
## less facade Storage

- upload file less facade Storage
```php
// upload file
$file = $request->file('myinputname')->store('myfolder')

// upload file with new name of file
// warning for extention of file  
$file = $request->file('myinputname')->storeAs('myfolder', 'newnameoffile')  

// get extention of file  
$request->file('myinputname')->extension();

// if do you change disk  
$file = $request->file('myinputname')->storeAs('myfolder', 'newnameoffile', 'namedisk')
```
