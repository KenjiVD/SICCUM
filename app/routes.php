<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', "VistaController@VistaInicio");

Route::get('/login',function (){
	return View::make('login');
});

Route::post("NuevaMateria","MateriaController@Nuevo");
Route::post("NuevoAlumno","AlumnoController@Nuevo");
Route::post("NuevaCalificacion","CalificacionController@Nuevo");
Route::post("NuevaColegiatura","ColegiaturaController@Nuevo");