var elixir = require('laravel-elixir');
var vueify = require('laravel-elixir-vueify');
var gulp = require('gulp');


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */


//Remove source maps
elixir.config.sourcemaps = false;


//Handle LESS
/*
elixir(function(mix) {
    //Compile LESS
    mix.less(['app.less','bootstrap/main-center.less']);

    //Move to build directory
    mix.copy('public/css/app.css','public/css/build/app-build.css')
});*/

/*
 |-------------------------------------------------------------------------
 | Standard Gulp Javascript Procedures
 |-------------------------------------------------------------------------
 */


elixir(function(mix) {
    mix.browserify('app.js');
});