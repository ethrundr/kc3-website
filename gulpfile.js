var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('main.scss');
    mix.sass('bare.scss');
    
    mix.sass('errors.scss');
    
    // mix.sass('Site/home.scss', 'public/css/site/home.css');
    
    // mix.copy("resources/assets/js/Site", "public/js/site");
    
    mix.browserify("main.js", "public/js/main.js");
    
});
