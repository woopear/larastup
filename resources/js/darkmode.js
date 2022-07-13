// check if theme dark exists in localstorage  
// or if the device has a dark mode
const checkDeviceMode = (localStorage.theme === 'dark' || 
                        (!('theme' in localStorage) && 
                        window.matchMedia('(prefers-color-scheme: dark)').matches))

const checkModeDarkWhenLoading = localStorage.theme === 'dark'

const btn = document.querySelector('[darkmodebtn]')

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
    btn.addEventListener('click', () => {
        changeModeDark()
    });
}

export default {
    whenLoadingAddModeDarkIfExist,
    switchModeDark,
}