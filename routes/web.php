<?php


Auth::routes();


Route::get('/', function () { return view('auth.login'); })->name('login');
Route::post('auth', 'HomeController@login')->name('entrar');
Route::post('/logout', 'HomeController@logout')->name('salir');

Route::group(['middleware' => ['auth']], function() {

  // rutas resources
	Route::resources([
	    'users' 	    => 'UserController',
	]);

  // dashboard
  Route::get('dashboard', 'HomeController@index')->name('dashboard');

  //* --- usuarios --- */
  Route::put('userStatus/{id}', 'UserController@userStatus');
	Route::get('/perfil', 	'UserController@perfil')->name('perfil');
	Route::patch('/perfil', 'UserController@update_perfil')->name('update_perfil');

});
