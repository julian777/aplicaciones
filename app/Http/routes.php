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
// se puede usar match
// Route::match(["get","post"],"home/form","HomeController@form");
// o su equivalente any:
Route::any("home/form","HomeController@form");

// se puede usar asi, dividido:
//Route::post('home/form','HomeController@form');
//Route::get('home/form','HomeController@form');
// este es un tipo distinto, no es necesario para direccionar
// siempre hacerlo con un controller, se puede hacer de esta forma tambien:

Route::get("home/nombre/{nombre}/apellidos/{apellidos}", function($nombre,$apellidos){
     return $nombre . " " . $apellidos;
})->where(["nombre" => "[a-zA-Z]+", "apellidos"=>"[a-zA-Záéíóú]+"]);

