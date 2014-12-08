<?php

class AlumnoController extends BaseController {
	public function Nuevo(){
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d');
		$matricula = $_POST["periodo"].$_POST["carrera"].$_POST["grupo"];

		$mat = DB::table("alumno")->insertGetId(array(
			"idperiodo" => $_POST["periodo"],
			"carrera_idcarrera" => $_POST["carrera"],
			"nivel_idnivel" => $_POST["nivel"],
			"grupo_idgrupo" => $_POST["grupo"],
			"curp" => $_POST["curp"],
			"fecha" => $fecha,
			"nombre" =>$_POST["nombre"]));
		$matricula = $matricula.$mat;

		DB::table("alumno")->where("idAlumno",$mat)->update(array("matriculaa" => $matricula,"contrasena" => $matricula));
		
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

	public function NuevoPermiso(){
		$g = new HomeController();
		$datos = array();
		array_push($datos, $_POST["inicio"]);
		array_push($datos, $_POST["fin"]);
		array_push($datos, $_FILES["uploadedfile"]);
		$validado = $g->ValidarNoVacio($datos);
		if ($validado) {
			if ($_FILES['uploadedfile']["error"] > 0 ){
				return Redirect::to("/inicio");
			}else{
				date_default_timezone_set('America/Mexico_City');
				$fecha = date('Y-m-d');
				$alumno = DB::table("alumno")->where("idAlumno",Session::get("usuario"))->first();
				$permiso = DB::table("permiso")->insertGetId(array(
					"Alumno_idAlumno" => Session::get("usuario"),
					"matriculaa" => $alumno->matriculaa,
					"descripcion" => $_POST["address"],
					"fechaSolicitud" => $fecha,
					"fechaInicio" => $_POST["inicio"],
					"fechaFin" => $_POST["fin"]));
				$ext=$g->obtenerExt($_FILES['uploadedfile']['name']);
				move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "permisos/".$permiso.".".$ext);
				DB::table("permiso")->where("idpermiso",$permiso)->update(array("URL" => "permisos/".$permiso.".".$ext));
				return Redirect::to("/inicio");
			}
		}else{
			return Redirect::to("/inicio");
		}
	}
	public function AccionPermiso($accion,$id){
		$alumno = DB::table("alumno")->where("idAlumno",$id)->first();
		if ($alumno->Coordinador_idCoordinador==Session::get("usuario")) {
			if ($accion == 1) {DB::table("permiso")->where("idpermiso",$id)->update(array("estado" => 1));}
			else{DB::table("permiso")->where("idpermiso",$id)->update(array("estado" => 2));}
		}
		return Redirect::to("/inicio");
	}
}