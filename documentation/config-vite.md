# config vite

1. add assets files in head balise for vite serve  
```html
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
```

2. start vite serve for assets files
```bash
# start vite serve
$ npm i
$ npm run dev 
```  

3. for hot reaload, update files `vite.config.js`
```js
export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        // add this for hot reaload ...
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        }
    ],
});
```  

4. if you don't use serve laragon or other server  
use `php serve`, and look website in `localhost:8000`
```shell
$ cd myproject
$ php artisan serve
```  
