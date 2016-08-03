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



Route::get('/', function () {
    return view('welcome');
});

Route::get('home/index', 'HomeController@index');
Route::get('home/id1/{id1}/id2/{id2}', 'HomeController@getId');
Route::get('home/showview','HomeController@showview');

// Peticiones del tipo get y tipo post
//Route::match(["get","post"],"home/form","HomeController@form");
Route::post('home/form','HomeController@form');
Route::get('home/form','HomeController@form');
// Route::post('home','HomeController');

//Route::post('home/form', [
//   'as' => 'home/form', 'uses' => 'HomeController@form'
//]);