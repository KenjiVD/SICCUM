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

Route::filter('alumno', function(){
	if(  Session::get('tipo') != 4)
		return Redirect::to('/inicio');
});

Route::filter('adminSICCUM', function(){
	if(  Session::get('tipo') != 1)
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
	Route::group(array('before' => 'adminSICCUM'), function(){

	});
	Route::group(array('before' => 'alumno'), function(){
		Route::get("/calificaciones","VistaController@VistaCalificacionesAlumno");
		Route::get("/colegiaturas","VistaController@VistaColegiaturasAlumno");
		Route::post("/seleccionar/nivel","UsuariosController@CalificacionAlumnoNivel");
	});
	Route::group(array('before' => 'admin'), function(){
		Route::post('/Asignar', 'UsuariosController@AsignarAlumnoCoordinador');
		Route::get('/AsignarCoordinador','VistaController@VistaAsignarAlumnoCoordinador');
		Route::get('/Baja/{tipo}/{id}', "UsuariosController@Baja");
		Route::get('/Alta/{tipo}/{id}', "UsuariosController@Alta");
	});
	Route::group(array('before' => 'coordinador'), function(){
		Route::get('/coordinador/permiso/{accion}/{id}',"AlumnoController@AccionPermiso");
		Route::get("/calificaciones/{id}","VistaController@VistaCoordinadorCalificacionesAlumno");
		Route::get("/colegiaturas/{id}","VistaController@VistaCoordinadorColegiaturasAlumno");
		Route::get("/buscaralumno","VistaController@VistaBusquedaAlumno");
		Route::post("/buscaralumno","UsuariosController@BusquedaAlumno");
		Route::get('/solicitar/NPermisos',"UsuariosController@NumPermisos");
		Route::get('/calificaciones/solicitar/NPermisos',"UsuariosController@NumPermisos");
		Route::get('/colegiaturas/solicitar/NPermisos',"UsuariosController@NumPermisos");
		Route::post("/calificaciones/seleccionar/nivel","UsuariosController@CalificacionCoordinadorAlumnoNivel");
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