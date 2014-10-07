<?php

class ColegiaturaController extends BaseController {
	public function Nuevo(){
		$alumno = DB::table("alumno")->where('matriculaa', $_POST["matricula"])->first();

		DB::table("colegiatura")->insertGetId(array(
			"periodo_idperiodo" => $_POST["periodo"],
			"mes" => $_POST["mes"],
			"Alumno_idAlumno" => $alumno->idAlumno,
			"matriculaa" =>$_POST["matricula"]));
		
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