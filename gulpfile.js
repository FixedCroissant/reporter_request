var elixir = require('laravel-elixir');
var gulp = require('gulp');
var shell = require("gulp-shell");
var concat = require("gulp-concat");
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

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

//Handle Concatenation of my scripts
//Handle it standard gulp style
gulp.task('combine-scripts', function(){
    //Script locations
    var jsFiles = 'resources/assets/js/**/*.js',
        //Destination
        jsDest = 'public/scripts/build';

        return gulp.src(jsFiles)
            .pipe(concat('scripts.js'))
            //Go to my destination.
            .pipe(gulp.dest(jsDest))
            //Rename information
            .pipe(rename('script.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest(jsDest));
});

elixir(function(mix) {
    mix.browserify('app.js');
});