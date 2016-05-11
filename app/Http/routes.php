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
    return "desktop";
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
	'middleware' => [],
	'as' => 'Admin::'
	], function(){

		Route::get('dashboard', ['as' => 'Dashboard', function () {
		    return "dashboard";
		}]);

		Route::get('status', function () {
		    return "status";
		});

});





