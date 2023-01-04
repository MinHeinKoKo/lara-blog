let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/theme.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/theme.scss', 'public/css');
