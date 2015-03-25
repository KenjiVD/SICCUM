<?php

class MateriaController extends BaseController {
	public function Nuevo(){
		DB::table("materia")->insertGetId(array(
			"periodo_idperiodo" => $_POST["periodo"],
			"carrera_idcarrera" => $_POST["carrera"],
			"nombre" =>$_POST["nombre"]));
		
		return Redirect::to("/inicio");
	}
}