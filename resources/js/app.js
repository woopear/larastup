import './bootstrap';
import DarkMode from'./darkmode';
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()

// when loading check mode dark with device
//DarkMode.whenLoadingAddModeDarkIfExist()

// when loading check mode dark without device
DarkMode.whenLoadingAddModeDarkIfExist(false)

// switch mode dark  
DarkMode.switchModeDark()