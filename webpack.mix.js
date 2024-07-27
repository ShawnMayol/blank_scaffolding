const mix = require('laravel-mix');

mix.js('resources/js/login.js', 'public/js').postCss('resources/css/external_static.css', 'public/css', [])
    .vue();  

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');