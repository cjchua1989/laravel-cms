const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .copy('resources/js/jquery', 'public/js/jquery')
    .copy('resources/js/bootstrap', 'public/js/bootstrap')
    .copy('resources/js/editor', 'public/js/editor')
    .js('resources/js/theme.min.js', 'public/js/theme.min.js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/editor.min.css', 'public/css')
    .postCss('resources/css/theme.min.css', 'public/css')
    .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css/bootstrap.min.css')
    .postCss('node_modules/fontawesome-free/css/all.min.css', 'public/css/fontawesome.min.css');

