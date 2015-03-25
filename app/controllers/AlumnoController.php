<?php

class AlumnoController extends BaseController {
	public function Nuevo(){
		date_default_timezone_set('America/Mexico_City');
		$AlCfecha = date('Y-m-d');
		$AlCmatricula = $_POST["periodo"].$_POST["carrera"].$_POST["grupo"];

		$AlCmat = DB::table("alumno")->insertGetId(array(
			"idperiodo" => $_POST["periodo"],
			"carrera_idcarrera" => $_POST["carrera"],
			"nivel_idnivel" => $_POST["nivel"],
			"grupo_idgrupo" => $_POST["grupo"],
			"curp" => $_POST["curp"],
			"fecha" => $AlCfecha,
			"nombre" =>$_POST["nombre"]));
		$AlCmatricula = $AlCmatricula.$AlCmat;

		DB::table("alumno")->where("idAlumno",$AlCmat)->update(array("matriculaa" => $AlCmatricula,"contrasena" => $AlCmatricula));
		return Redirect::to("/inicio");
	}

	public function NuevoPermiso(){
		$AlCg = new HomeController();
		$AlCdatos = array();
		array_push($AlCdatos, $_POST["inicio"]);
		array_push($AlCdatos, $_POST["fin"]);
		array_push($AlCdatos, $_FILES["uploadedfile"]);
		$AlCvalidado = $AlCg->ValidarNoVacio($AlCdatos);
		if ($AlCvalidado) {
			if ($_FILES['uploadedfile']["error"] > 0 ){
				return Redirect::to("/inicio");
			}else{
				date_default_timezone_set('America/Mexico_City');
				$AlCfecha = date('Y-m-d');
				$AlCalumno = DB::table("alumno")->where("idAlumno",Session::get("usuario"))->first();
				$AlCpermiso = DB::table("permiso")->insertGetId(array(
					"Alumno_idAlumno" => Session::get("usuario"),
					"matriculaa" => $AlCalumno->matriculaa,
					"descripcion" => $_POST["address"],
					"fechaSolicitud" => $AlCfecha,
					"fechaInicio" => $_POST["inicio"],
					"fechaFin" => $_POST["fin"]));
				$AlCext=$AlCg->obtenerExt($_FILES['uploadedfile']['name']);
				move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "permisos/".$AlCpermiso.".".$AlCext);
				DB::table("permiso")->where("idpermiso",$AlCpermiso)->update(array("URL" => "permisos/".$AlCpermiso.".".$AlCext));
				return Redirect::to("/inicio");
			}
		}else{
			return Redirect::to("/inicio");
		}
	}
	public function AccionPermiso($AlCaccion,$AlCid){
		$AlCalumno = DB::table("alumno")->where("idAlumno",$AlCid)->first();
		if ($AlCalumno->Coordinador_idCoordinador==Session::get("usuario")) {
			if ($AlCaccion == 1) {DB::table("permiso")->where("idpermiso",$AlCid)->update(array("estado" => 1));}
			else{DB::table("permiso")->where("idpermiso",$AlCid)->update(array("estado" => 2));}
		}
		return Redirect::to("/inicio");
	}
}