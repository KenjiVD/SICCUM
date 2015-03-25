<?php

class ColegiaturaController extends BaseController {
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