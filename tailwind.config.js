/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js', 
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        body: ["Roboto", "sans-serif"], // add name of your font family import
      },
      /*colors: {
        fc: "#E7F2FF", // font light
        fc2: "#B8D8FF", // font light 2
        fcb: "#ffffff", // font light box
        fd: "#001A39", // font dark
        fd2: "#002F69", // font dark 2
        fdb: "#001329", // font dark box
        ic: "#ffffff", // font input light
        id: "#000000", // font input dark
        ac: "#0094FF", // action 
        ach: "#004B82", // action hover
        hc: "#006FFF", // important 
      },
      fontSize: {
        // title
        "s-h1": "",
        "s-title-page": "4rem",
        "s-title-section": "3rem",
        "s-title-box": "2rem",
        "s-title-form": "1.5rem",
        "s-title-article": "1.8rem",
        // subtitle
        "s-subtitle-page": "3rem",
        "s-subtitle-section": "2rem",
        "s-subtitle-box": "1.5rem",
        "s-subtitle-form": "1rem",
        "s-title-article": "1rem",
        // menu
        "s-menu-header": "1.125rem",
        "s-menu-sideleft": "1.125rem",
        "s-menu-sideright": "1.125rem",
        "s-menu-footer": "0.75rem",
        // copyright
        "s-copy": "0.688rem",
        // text important
        "s-important": "",
        // text btn
        "s-btn": "1.125rem",
        "s-btn-text": "1.125rem",
      },*/
    },
  },
  plugins: [],
}
