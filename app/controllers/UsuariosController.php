<?php

class UsuariosController extends BaseController {
	public function IniciarSesion(){
		$UsCg = new HomeController();
		$UsCdatos = array();
		array_push($UsCdatos, $_POST["tipo"]);
		array_push($UsCdatos, $_POST["usuario"]);
		array_push($UsCdatos, $_POST["contrasena"]);
		$UsCvalidado = $UsCg->ValidarNoVacio($UsCdatos);
		if ($UsCvalidado) {
			switch ($_POST["tipo"]) {
				case 4:
					$UsCusuariosesion = DB::table("alumno")->where("matriculaa",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->where("estadoperfil", 1)->first();
					if(isset($UsCusuariosesion) && $UsCusuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $UsCusuariosesion->idAlumno);Session::put("nombre", $UsCusuariosesion->nombre);}
					break;
				case 3:
					$UsCusuariosesion = DB::table("coordinador")->where("matriculac",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->where("estadoperfil", 1)->first();
					if(isset($UsCusuariosesion) && $UsCusuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $UsCusuariosesion->idCoordinador);Session::put("nombre", $UsCusuariosesion->nombre);}
					break;
				case 2:
					$UsCusuariosesion = DB::table("administrador")->where("idadministrador",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->first();
					if(isset($UsCusuariosesion) && $UsCusuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $UsCusuariosesion->idadministrador);Session::put("nombre", $UsCusuariosesion->nombre);}
					break;
				case 1:
					$UsCusuariosesion = DB::table("administradorsiccum")->where("idadministradorsiccum",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->first();
					if(isset($UsCusuariosesion) && $UsCusuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $UsCusuariosesion->idadministradorsiccum);Session::put("nombre", $UsCusuariosesion->nombre);}
					break;
			}
		}
		return Redirect::to("/"); 
	}

	public function Nuevo(){
		$UsCg = new HomeController();
		$UsCdatos = array();
		array_push($UsCdatos, $_POST["usuario"]);
		array_push($UsCdatos, $_POST["contrasena"]);
		$UsCvalidado = $UsCg->ValidarNoVacio($UsCdatos);
		if ($UsCvalidado) {
				$UsCexiste = DB::table("coordinador")->where("matriculac",$_POST["contrasena"])->first();
				if (!isset($UsCexiste) || $UsCexiste==null) {
					$UsCusuariosesion = DB::table("coordinador")->insertGetId(array("nombre" => $_POST["usuario"], "contrasena" => $_POST["contrasena"], "matriculac" => $_POST["contrasena"]));
				}
			}
		return Redirect::to("/inicio"); 
	}

	public function Alta($UsCtipo,$UsCid){
		if ($UsCtipo == 3) {
			DB::table("coordinador")->where("idCoordinador",$UsCid)->update(array("estadoperfil" => 1));
			return Redirect::to("/inicio"); 
		}else{
			DB::table("alumno")->where("idAlumno",$UsCid)->update(array("estadoperfil" => 1));
			return Redirect::to("/inicio"); 
		}
	}
	
	public function Baja($UsCtipo,$UsCid){
		if ($UsCtipo == 3) {
			DB::table("coordinador")->where("idCoordinador",$UsCid)->update(array("estadoperfil" => 0));
			return Redirect::to("/inicio"); 
		}else{
			DB::table("alumno")->where("idAlumno",$UsCid)->update(array("estadoperfil" => 0));
			return Redirect::to("/inicio"); 
		}
	}

	public function Graduado($UsCid){
		DB::table("alumno")->where("idAlumno",$UsCid)->update(array("estadoperfil" => 2));
		return Redirect::to("/inicio"); 
	}

	public function BusquedaAlumno(){
		$UsCg = new HomeController();
		$UsCvalidado = $UsCg->ValidarNoVacioUno($_POST["texto"]);
		if ($UsCvalidado) {
			$UsCalumnos = DB::table("alumno")
			->where("Coordinador_idCoordinador", Session::get("usuario"))
			->where(function($query){
				$UsCcadena = explode(" ", $_POST["texto"]);
				for ($UsCi=0;$UsCi<count($UsCcadena);$UsCi++) {
					$query->orwhere("matriculaa","like","%".$UsCcadena[$UsCi]."%")
					->orwhere("nombre","like","%".$UsCcadena[$UsCi]."%");
				}
			})->orderBy('idAlumno', 'asc')->get();
			return View::make("busqueda")->with("alumnos",$UsCalumnos);
		}else{
			return Redirect::to("/buscaralumno");
		}
	}

	public function NumPermisos(){
		$UsCpermisos = DB::table("permiso")->join("alumno",function($join){
				$join->on("permiso.Alumno_idAlumno","=","alumno.idAlumno");
			})->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estado", 0)->count();
		$UsCalumnos = DB::table("alumno")->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estadoperfil", 1)->get();
		$UsCcont = 0;
		foreach ($UsCalumnos as $UsCkey) {
			$UsCcalificaciones = DB::table("calificaciones")->where("Alumno_idAlumno",$UsCkey->idAlumno)->get();
			$UsCnumcalificaciones = DB::table("calificaciones")->where("Alumno_idAlumno",$UsCkey->idAlumno)->count();
			$UsCsuma = 0;
			foreach ($UsCcalificaciones as $UsCkey2) {
				$UsCsuma = $UsCsuma + $UsCkey2->calificacion;
			}
			if ($UsCnumcalificaciones > 0) {$UsCpromedio = $UsCsuma/$UsCnumcalificaciones;}
			else {$UsCpromedio = 70;}
			if ($UsCpromedio<70) {
				$UsCcont++;
			}
		}
		$UsCNotificaciones = $UsCcont+$UsCpermisos;
		return "<ul class='nav'>
                    <li><a href=''>Notificaciones(".$UsCNotificaciones.")</a>
                        <ul>
                            <li><a href=''>Permisos(".$UsCpermisos.")</a></li><br>
                            <li><a href=''>Alumnos Criticos(".$UsCcont.")</a></li>
                        </ul>
                    </li>
                </ul>";
	}

	public function NumAdeudos(){
		$UsCg = new HomeController();
		date_default_timezone_set('America/Mexico_City');
		$UsCfechaactual = date('Y-m-d');
		$UsCseccion = DB::table("colegiatura")->where("Alumno_idAlumno",Session::get("usuario"));
		$UsCcolegiaturas = $UsCseccion->orderBy('periodo_idperiodo', 'asc')->get();
		$UsCconcole = $UsCseccion->count();
		$UsCusuario = DB::table("alumno")->where("idAlumno",Session::get("usuario"))->first();
		$UsCadeudo = ($UsCg->restaFechas($UsCusuario->fecha, $UsCfechaactual))-$UsCconcole;
		if ($UsCadeudo < 0) {$UsCadeudo = 0;}
		return "- Adeudos: ".$UsCadeudo;
	}

	public function AsignarAlumnoCoordinador(){
		$UsCg = new HomeController();
		$UsCdatos = array();
		array_push($UsCdatos, $_POST["id"]);
		array_push($UsCdatos, $_POST["coordinador"]);
		$UsCvalidado = $UsCg->ValidarNoVacio($UsCdatos);
		if ($UsCvalidado) {
			DB::table("alumno")->where("idAlumno",$_POST["id"])->update(array("Coordinador_idCoordinador" => $_POST["coordinador"]));
		}
		return Redirect::to("/AsignarCoordinador");
	}

	public function CalificacionAlumnoNivel(){
		$UsCcalificaciones = DB::table("calificaciones")->select(array("nivel.nombre as nombren","periodo.nombre as nombrep","materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
		->join("materia",function($join){
				$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
			})->join("periodo",function($join){
				$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
			})->join("nivel",function($join){
				$join->on("calificaciones.nivel_idnivel","=","nivel.idnivel");
			})->where("Alumno_idAlumno",Session::get("usuario"))->where("nivel_idnivel",$_POST["nivel"])
		->orderBy('nivel_idnivel', 'asc')->get();
		$UsCniveles = DB::table("nivel")->get();
		return View::make("calificaciones")
		->with("calificaiones", $UsCcalificaciones);
	}

	public function CalificacionCoordinadorAlumnoNivel(){
		$UsCcalificaciones = DB::table("calificaciones")->select(array("nivel.nombre as nombren","periodo.nombre as nombrep","materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
		->join("materia",function($join){
				$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
			})->join("periodo",function($join){
				$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
			})->join("nivel",function($join){
				$join->on("calificaciones.nivel_idnivel","=","nivel.idnivel");
			})->where("Alumno_idAlumno",$_POST["idAlumno"])->where("nivel_idnivel",$_POST["nivel"])
		->orderBy('nivel_idnivel', 'asc')->get();
		$UsCniveles = DB::table("nivel")->get();
		return View::make("calificaciones")
		->with("calificaiones", $UsCcalificaciones);
	}

	public function CambioContrasena(){
		$UsCg = new HomeController();
		$UsCdatos = array();
		array_push($UsCdatos, $_POST["id"]);
		array_push($UsCdatos, $_POST["tipo"]);
		array_push($UsCdatos, $_POST["newpass"]);
		$UsCvalidado = $UsCg->ValidarNoVacio($UsCdatos);
		if ($UsCvalidado) {
			if ($_POST["tipo"]==3) {DB::table("coordinador")->where("idCoordinador",$_POST["id"])->update(array("contrasena" => $_POST["newpass"]));}
			else {DB::table("alumno")->where("idAlumno",$_POST["id"])->update(array("contrasena" => $_POST["newpass"]));}
		}
		return Redirect::to("/inicio");
	}
}