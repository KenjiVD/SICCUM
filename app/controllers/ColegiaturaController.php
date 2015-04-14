<?php

class ColegiaturaController extends BaseController {
	/*Esta funcion sirve para crear una nueva colegiatura para un alumno en la base de datos, con base al llenado de un 
	formulario previo, una vez que realiza la operacion redirige a la pagina de inicio del sistema*/
	public function Nuevo(){
		$CoCalumno = DB::table("alumno")->where('matriculaa', $_POST["matricula"])->first();

		DB::table("colegiatura")->insertGetId(array(
			"periodo_idperiodo" => $_POST["periodo"],
			"mes" => $_POST["mes"],
			"Alumno_idAlumno" => $CoCalumno->idAlumno,
			"matriculaa" =>$_POST["matricula"]));
		
		return Redirect::to("/inicio");
	}
}
