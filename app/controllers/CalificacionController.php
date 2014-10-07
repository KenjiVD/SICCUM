<?php

class CalificacionController extends BaseController {
	public function Nuevo(){
		$alumno = DB::table("alumno")->where('matriculaa', $_POST["matricula"])->first();

		DB::table("calificaciones")->insertGetId(array(
			"periodo_idperiodo" => $_POST["periodo"],
			"carrera_idcarrera" => $_POST["carrera"],
			"nivel_idnivel" => $_POST["nivel"],
			"grupo_idgrupo" => $_POST["grupo"],
			"materia_idmateria" => $_POST["materia"],
			"matricula" => $_POST["matricula"],
			"Alumno_idAlumno" => $alumno->idAlumno,
			"calificacion" =>$_POST["calificacion"]));
		
		$materia = DB::table("materia")->select(array('idmateria',"materia.nombre as nombrem","carrera.nombre as nombrec"))->join(
			"carrera",function($join){
				$join->on("materia.carrera_idcarrera","=","carrera.idcarrera");
			})->get();
		$carrera = DB::table("carrera")->get();
		$periodo = DB::table("periodo")->get();
		$grupo = DB::table("grupo")->get();
		$nivel = DB::table("nivel")->get();
		return View::make('index')
		->with("carrera",$carrera)
		->with("periodo",$periodo)
		->with("grupo",$grupo)
		->with("nivel",$nivel)
		->with("materia",$materia);
	}
}