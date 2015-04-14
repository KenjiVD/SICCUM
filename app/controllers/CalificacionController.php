<?php

class CalificacionController extends BaseController {
	/*Esta funcion sirve para crear una nueva calificacion para un alumno en la base de datos, con base al llenado de un 
	formulario previo, una vez que realiza la operacion redirige a la pagina de inicio del sistema*/
	public function Nuevo(){
		$CaCalumno = DB::table("alumno")->where('matriculaa', $_POST["matricula"])->first();

		DB::table("calificaciones")->insertGetId(array(
			"periodo_idperiodo" => $_POST["periodo"],
			"carrera_idcarrera" => $_POST["carrera"],
			"nivel_idnivel" => $_POST["nivel"],
			"grupo_idgrupo" => $_POST["grupo"],
			"materia_idmateria" => $_POST["materia"],
			"matricula" => $_POST["matricula"],
			"Alumno_idAlumno" => $CaCalumno->idAlumno,
			"calificacion" =>$_POST["calificacion"]));
		
		return Redirect::to("/inicio");
	}
}
