<?php

class AlumnoController extends BaseController {
	public function Nuevo(){
		$matricula = $_POST["periodo"].$_POST["carrera"].$_POST["grupo"];

		$mat = DB::table("alumno")->insertGetId(array(
			"idperiodo" => $_POST["periodo"],
			"carrera_idcarrera" => $_POST["carrera"],
			"nivel_idnivel" => $_POST["nivel"],
			"grupo_idgrupo" => $_POST["grupo"],
			"curp" => $_POST["curp"],
			"nombre" =>$_POST["nombre"]));
		$matricula = $matricula.$mat;

		DB::table("alumno")->where("idAlumno",$mat)->update(array("matriculaa" => $matricula));
		
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