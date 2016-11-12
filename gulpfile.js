// Configuration
global.path = {
    proxy: "local.dev",
    server: 'public/',
    scss: "scss/",
    img: "public/img/",
    imgCss: "public/img/css",
    js: "public/js/",
    css: "public/css/",
    refresh: ["public/*.html", "public/*.php", "public/js/*.js"]
}

// Support
global.browser_support = [
    "ie >= 9",
    "ie_mob >= 10",
    "ff >= 30",
    "chrome >= 34",
    "safari >= 7",
    "opera >= 23",
    "ios >= 7",
    "android >= 4.4",
    "bb >= 10"
]

// Require
require ('coffee-script/register');
require('./gulpfile.coffee');
