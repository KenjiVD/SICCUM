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
Route::filter('auth', function(){
	if(  Session::get('usuario') == null)
		return Redirect::to('/');
});

Route::filter('admin', function(){
	if(  Session::get('tipo') != 2)
		return Redirect::to('/inicio');
});
Route::filter('coordinador', function(){
	if(  Session::get('tipo') != 3)
		return Redirect::to('/inicio');
});

Route::filter('noauth', function(){
	if(  Session::get('usuario') != null)
		return Redirect::to('/inicio');
});

Route::group(array('before' => 'auth'), function(){
	//a estas rutas solo puedo entrar si estoy loggeado
	Route::group(array('before' => 'admin'), function(){
		Route::get('/inicio/administrador/alta', "VistaController@VistaAltaPerfil");
		Route::get('/inicio/administrador/listaperfiles', "VistaController@VistaListaPerfil");
		Route::get('/Baja/{tipo}/{id}', "UsuariosController@Baja");
		Route::get('/Alta/{tipo}/{id}', "UsuariosController@Alta");
	});
	Route::group(array('before' => 'coordinador'), function(){
		
	});
	Route::get('/inicio', "VistaController@VistaInicio");
});
Route::group(array('before' => 'noauth'), function(){
	//a estas rutas solo puedo entrar si no estoy loggeado
	Route::get('/',function (){
		return View::make('login');
	});

});

Route::get("/logout",function(){
		Session::forget('usuario');
		Session::forget('tipo');
		Session::forget('nombre');
		return Redirect::to('/');	
});

Route::post("NuevoPermiso","AlumnoController@NuevoPermiso");
Route::post("/iniciarsesion","UsuariosController@IniciarSesion");
Route::post("NuevoPerfil","UsuariosController@Nuevo");
Route::post("NuevaMateria","MateriaController@Nuevo");
Route::post("NuevoAlumno","AlumnoController@Nuevo");
Route::post("NuevaCalificacion","CalificacionController@Nuevo");
Route::post("NuevaColegiatura","ColegiaturaController@Nuevo");