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
    
    mix.sass('main.scss', 'public/css');
    mix.sass('bare.scss', 'public/css');
    mix.sass('errors.scss', 'public/css');
    
    mix.sass('data/master.scss', 'public/css/data/master.css');
    mix.sass('data/quests.scss', 'public/css/data/quests.css');
    
    // mix.sass('Site/home.scss', 'public/css/site/home.css');
    
    // mix.copy("resources/assets/js/Site", "public/js/site");
    
    mix.browserify("main.js", "public/js/main.js");
    
});
