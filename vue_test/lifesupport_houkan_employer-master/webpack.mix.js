let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/bootstrap.js', 'public/js')
.js('resources/assets/js/image_manager_app.js', 'public/js')
.js('resources/assets/js/facility/create.js', 'public/js/facility')
.js('resources/assets/js/facility/edit.js', 'public/js/facility')
.js('resources/assets/js/job/create.js', 'public/js/job')
.js('resources/assets/js/job/edit.js', 'public/js/job')
.js('resources/assets/js/auth/register.js', 'public/js/auth')

