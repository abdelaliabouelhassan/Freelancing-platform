const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


// mix.styles([
//     'public/css/animate.css',
//      'public/css/bootstrap.min.css',
//     'public/css/line-awesome.css',
//     'public/css/line-awesome-font-awesome.css',
//     'public/css/font-awesome.min.css',
//     'public/lib/slick/slick.css',
//     'public/lib/slick/slick-theme.css',
//     'public/css/style.css',
//     'public/css/responsive.css',
// ], 'public/signin/all.css');
//
//
// mix.scripts([
//     'public/js/jquery.min.js',
//     'public/js/popper.js',
//     'public/js/bootstrap.min.js',
//     'public/lib/slick/slick.min.js',
//     'public/js/script.js'
// ], 'public/signin/all.js');
