<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//get
Route::get('/', function () {
    return view('index');
});


//post
Route::post('demo', [ 'as' => 'mydemo', function () {
    return "demo route";
}]);


//any route (get, post, put, patch, delete, head)
Route::any('anyroute', function(){
	return "any route";
});


//REST
//get, post, put, delete
// Route::get('user');
// Route::post('user');
// Route::put/{id}('user')
// Route::delete/{id}('user')

//Resource route
Route::resource('apple', 'AppleController');

//Route dahin todorhoilson
Route::get('apple', 'AppleController@againApple');

//Route parameter - regex
Route::get('apple/factory/{factory}/{year?}', 'AppleController@newApple')->where(['year' => '[0-9]+', 'factory' => '[A-Za-z]+']);


//Route group
Route::group([
	'prefix' => 'admin',
	'middleware' => ['auth'],
	'as' => 'Admin::'
	], function(){

		Route::get('dashboard', ['as' => 'Dashboard', function () {
		    return "dashboard";
		}]);

		Route::get('status', function () {
		    return "status";
		});

		Route::get('blog', ['as' => 'blog', 'uses' => 'BlogController@blog']);
});

//Blog routes - application endees ehelne
Route::get('list', ['as' => 'blog.list', 'uses' => 'BlogController@getList']);



Route::post('blog/post', ['as' => 'blog.post', 'uses' => 'BlogController@postBlog']);

Route::get('blog/search', ['as' => 'search', 'uses' => 'BlogController@search']);


Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('dashboard', [
	'middleware' => ['auth'], 
	function(){
		return view('dashboard');
}]);


Route::group([
	'namespace' => 'Orm',
	'prefix' => 'orm',
	'as' => 'ORM::'
	], function(){
		Route::get('list', ['as' => 'list', 'uses' => 'PostController@index']);
		Route::post('store', ['as' => 'store', 'uses' => 'PostController@store']);
	});

