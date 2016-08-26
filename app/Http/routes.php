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



Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');
Route::get('home/id1/{id1}/id2/{id2}', 'HomeController@getId');
Route::get('home/showview', 'HomeController@showview');

// Peticiones del tipo get y tipo post
// se puede usar match
// Route::match(["get","post"],"home/form","HomeController@form");
// o su equivalente any:
Route::any("home/form", "HomeController@form");

// se puede usar asi, dividido:
//Route::post('home/form','HomeController@form');
//Route::get('home/form','HomeController@form');
// este es un tipo distinto, no es necesario para direccionar
// siempre hacerlo con un controller, se puede hacer de esta forma tambien:

Route::get("home/nombre/{nombre}/apellidos/{apellidos}", function($nombre, $apellidos) {
    return $nombre . " " . $apellidos;
})->where(["nombre" => "[a-zA-Z]+", "apellidos" => "[a-zA-Záéíóú]+"]);

Route::get("home/usuarioA", "HomeController@miUsuarioA");
Route::get("home/miformulario", "HomeController@miFormulario");
Route::post("home/validarmiformulario", "HomeController@validarMiFormulario");

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('user', 'UserController@user');

//Route::get('dashboard', ['middleware' => 'country:Mexico', function(){
//    return '<h1>Bienvenido!!</h1>';
//   // return redirect('/user');
//}]);

Route::get('usuario', ['middleware' => 'active:1', function(){
    //return '<h1>ERROR EN EL FORMULARIO, NO SE HA PODIDO AUTENTICAR EL USUARIO</h1>';
   return redirect('home/usuarioA');
}]);

Route::get("home/usuarioA", "HomeController@miUsuarioA");
Route::post("home/validarCompra", "HomeController@validarCompra");