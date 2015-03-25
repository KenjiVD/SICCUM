<?php

class CalificacionController extends BaseController {
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
		
		$CaCmateria = DB::table("materia")->select(array('idmateria',"materia.nombre as nombrem","carrera.nombre as nombrec"))->join(
			"carrera",function($join){
				$join->on("materia.carrera_idcarrera","=","carrera.idcarrera");
			})->get();
		$CaCcarrera = DB::table("carrera")->get();
		$CaCperiodo = DB::table("periodo")->get();
		$CaCgrupo = DB::table("grupo")->get();
		$CaCnivel = DB::table("nivel")->get();
		return View::make('index')
		->with("carrera",$CaCcarrera)
		->with("periodo",$CaCperiodo)
		->with("grupo",$CaCgrupo)
		->with("nivel",$CaCnivel)
		->with("materia",$CaCmateria);
	}
}