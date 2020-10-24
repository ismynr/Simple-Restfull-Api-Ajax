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

mix.styles([
    'public/assets/bootstrap.min.css',
    'public/assets/dataTables.bootstrap4.min.css',
], 'public/css/all.css');

mix.scripts([
    'public/assets/jquery-3.5.1.min.js',
    'public/assets/bootstrap.min.js',
    'public/assets/jquery.dataTables.min.js',
    'public/assets/dataTables.bootstrap4.min.js'
], 'public/js/all.js')
