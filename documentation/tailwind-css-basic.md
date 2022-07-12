# Tailwind config and examples layouts css  

1. before install project laravel, install tailwind  
```bash
$ npm install -D tailwindcss postcss autoprefixer  
$ npx tailwindcss init -p
```  

2. config `tailwind.config.js`   
```js
// add in key content   
// this may change over time  
// pay attention and look at the documentation
content: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',  
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
```  

3. configure mode dark in `tailwind.config.js`
```js
// for manual mode
module.exports = {
  darkMode: 'class',
  // ...
}

// for auto mode relationship your device mode
module.exports = {
  darkMode: 'media',
  // ...
}
```  

4. create file `darkmode.js` in `ressouces/js`  
and copy/past this code in `darkmode.js` file.  
```js 
// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add('dark')
} else {
  document.documentElement.classList.remove('dark')
}

// Whenever the user explicitly chooses light mode
localStorage.theme = 'light'

// Whenever the user explicitly chooses dark mode
localStorage.theme = 'dark'

// Whenever the user explicitly chooses to respect the OS preference
localStorage.removeItem('theme')
```  

5. copy/past this code in `app.js`  
```js
//... other import
import './darkmode';
```

6. config app.css `(ressources/css/app.css)`  
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```  

## css layout  


1. create layout css in `app.css`,  
menu up, footer down, main center  
main use more place  
- html  
```html
<body>
    <header>
        je suis le header
    </header>
    <main>
        je suis le main
    </main>
    <footer>
        je suis le footer
    </footer>
</body>
```  
- css
```css 
/*
- delete there all background  
in files blade with tailwind :
- add height for header footer
- add padding custom for header footer main
*/

html,
body {
    min-height: 100vh;
}

body {
    display: flex;
    flex-direction: column;
}

header {
    flex: none;
    background: rgb(255, 104, 104);
}

main {
    flex: 1;
    background: rgb(28, 236, 255);
}

footer {
    flex: none;
    background: rgb(255, 104, 240);
}
```  

2. create layout css in `app.css`,  
menu up, menu left, footer in menu left, main center  
- html
```html 
<body>
    <header>
        je suis le header
    </header>
    <main>
        <section sideleftmenu>
            <nav navmenuside>
                je suis la nav
            </nav>
            <footer>
                je suis le footer
            </footer>
        </section>
        <section contentmain>
            @yield('content-app')
        </section>
    </main>
</body>
```  
- css
```css 
/*
- delete there all background  
in files blade with tailwind :
- add height for header footer
- add width of side menu left
- add padding custom for header footer main  
*/

html,
body {
    min-height: 100vh;
}

body {
    display: flex;
    flex-direction: column;
}

header {
    flex: none;
    background: rgb(255, 104, 104);
}

main {
    display: flex;
    position: relative;
    flex: 1;
}

section[contentmain] {
    background: rgb(28, 236, 255);
    flex: 1;
}

section[sideleftmenu] {
    background: rgb(28, 255, 62);
    position: sticky;
    top: 0px;
    left: 0;
    max-height: 100vh;
    display: flex;
    flex-direction: column;
}

nav[navmenuside] {
    flex: 1;
}

footer {
    flex: none;
    background: rgb(255, 104, 240);
}
```  

> if you don't want some part like header  
> or footer etc.... just delete the part  
> concerned and the css code will still work
