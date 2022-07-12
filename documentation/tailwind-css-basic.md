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

4. config app.css `(ressources/css/app.css)`  
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```  

5. create file `darkmode.js` in `ressouces/js`  
and copy/past this code in `darkmode.js` file.  
```js 
// check if theme dark exists in localstorage  
// or if the device has a dark mode
const checkDeviceMode = (localStorage.theme === 'dark' || 
                        (!('theme' in localStorage) && 
                        window.matchMedia('(prefers-color-scheme: dark)').matches))

const checkModeDarkWhenLoading = localStorage.theme === 'dark'

// add mode dark
function addDarkMode() {
    document.documentElement.classList.add('dark')
    localStorage.setItem('theme', 'dark')
}

// remove mode dark
function removeDarkMode() {
    document.documentElement.classList.remove('dark')
    localStorage.removeItem('theme')
}

// switch mode dark if 'theme' not exist in local storage
function changeModeDark() {
    if('theme' in localStorage){
        removeDarkMode()
    }else{
        addDarkMode()
    }
}

// if mode dark exist in local storage
// or if the device has a dark mode
// active mode dark else remove mode dark
function whenLoadingAddModeDarkIfExist(device = true) {
    if(device) {
        if (checkDeviceMode) {
            addDarkMode()
        } else {
            removeDarkMode()
        }
    }else {
        if(checkModeDarkWhenLoading){
            addDarkMode()
        }else{
            removeDarkMode()
        }
    }
}

// switch mode dark
function switchModeDark() {
    document.querySelector('[darkmodebtn]').addEventListener('click', () => {
        changeModeDark()
    });
}

export default {
    whenLoadingAddModeDarkIfExist,
    switchModeDark,
}
```  

6. copy/past this code in `app.js`  
and use function that you need 
```js
//... other import
import DarkMode from'./darkmode';

// when loading check mode dark with device
//DarkMode.whenLoadingAddModeDarkIfExist()

// when loading check mode dark without device
DarkMode.whenLoadingAddModeDarkIfExist(false)

// switch mode dark  
DarkMode.switchModeDark()
```  

7. add the attribute `darkmodebtn` on the tag of  
your btn as in the example below  
```html
<button class="cursor-pointer" darkmodebtn>
    Switch dark mode
</button>
```  

> you must have chosen tailwind's  
> manual dark mode for all of this to work

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
