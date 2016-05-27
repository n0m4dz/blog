var elixir = require('laravel-elixir');
require('laravel-elixir-imagemin-wrapper');

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
    mix.sass(
    	[
    	'app.scss', 
    	'blog.scss'
    	], 'public/css/style.css')
    		
    	.styles([
    		'font-awesome/css/font-awesome.css'
    		], 'public/css/vendor.css', 'node_modules')

    	.scripts('blog.js')

    	.scripts([
    		'jquery/dist/jquery.js',
    		'bootstrap-sass/assets/javascripts/bootstrap.js'
    		], 'public/js/vendor.js', 'node_modules')

    	.imagemin('hd3.jpg', 'public/img', { optimizationLevel: 6, progressive: true, interlaced: true })

    	.copy('resources/assets/fonts/**', 'public/fonts')
    	.copy('node_modules/font-awesome/fonts/**', 'public/fonts')

    	.version(['css/style.css', 'js/blog.js'])


});
