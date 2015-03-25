<?php

class ColegiaturaController extends BaseController {
	public function Nuevo(){
		$CoCalumno = DB::table("alumno")->where('matriculaa', $_POST["matricula"])->first();

		DB::table("colegiatura")->insertGetId(array(
			"periodo_idperiodo" => $_POST["periodo"],
			"mes" => $_POST["mes"],
			"Alumno_idAlumno" => $CoCalumno->idAlumno,
			"matriculaa" =>$_POST["matricula"]));
		
		$CoCmateria = DB::table("materia")->select(array('idmateria',"materia.nombre as nombrem","carrera.nombre as nombrec"))->join(
			"carrera",function($join){
				$join->on("materia.carrera_idcarrera","=","carrera.idcarrera");
			})->get();
		$CoCcarrera = DB::table("carrera")->get();
		$CoCperiodo = DB::table("periodo")->get();
		$CoCgrupo = DB::table("grupo")->get();
		$CoCnivel = DB::table("nivel")->get();
		return View::make('index')
		->with("carrera",$CoCcarrera)
		->with("periodo",$CoCperiodo)
		->with("grupo",$CoCgrupo)
		->with("nivel",$CoCnivel)
		->with("materia",$CoCmateria);
	}
}