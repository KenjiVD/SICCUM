<?php

class MateriaController extends BaseController {
	/*Esta funcion sirve para crear una nueva materia en la base de datos, con base al llenado de un 
	formulario previo, una vez que realiza la operacion redirige a la pagina de inicio del sistema*/
	public function Nuevo(){
		DB::table("materia")->insertGetId(array(
			"periodo_idperiodo" => $_POST["periodo"],
			"carrera_idcarrera" => $_POST["carrera"],
			"nombre" =>$_POST["nombre"]));
		
		return Redirect::to("/inicio");
	}
}
