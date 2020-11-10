const mix = require('laravel-mix');

mix.js('resources/js/app/app.js', 'public/js')
    .js('resources/js/admin/admin.js', 'public/js')
    .sass('resources/sass/app/app.scss', 'public/css')
    .sass('resources/sass/admin/admin.scss', 'public/css')
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps();