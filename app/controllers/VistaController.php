<?php

class VistaController extends BaseController {
	public function VistaInicio(){
		switch (Session::get("tipo")) {
			case 1:
				$ViCmateria = DB::table("materia")->select(array('idmateria',"materia.nombre as nombrem","carrera.nombre as nombrec"))->join(
					"carrera",function($join){
						$join->on("materia.carrera_idcarrera","=","carrera.idcarrera");
					})->get();
				$ViCcarrera = DB::table("carrera")->get();
				$ViCperiodo = DB::table("periodo")->get();
				$ViCgrupo = DB::table("grupo")->get();
				$ViCnivel = DB::table("nivel")->get();
				return View::make('index')
				->with("carrera",$ViCcarrera)
				->with("periodo",$ViCperiodo)
				->with("grupo",$ViCgrupo)
				->with("nivel",$ViCnivel)
				->with("materia",$ViCmateria);
				break;
			case 2:
				$ViCalumnosactivos = DB::table("alumno")->where("estadoperfil",1)->get();
				$ViCalumnosinactivos = DB::table("alumno")->where("estadoperfil",0)->get();
				$ViCcoordinadoresactivos = DB::table("coordinador")->where("estadoperfil",1)->get();
				$ViCcoordinadoresinactivos = DB::table("coordinador")->where("estadoperfil",0)->get();
				return View::make("indexAdministrador")
					->with("alumnosactivos",$ViCalumnosactivos)
					->with("alumnosinactivos",$ViCalumnosinactivos)
					->with("coordinadoresactivos",$ViCcoordinadoresactivos)
					->with("coordinadoresinactivos",$ViCcoordinadoresinactivos);
				break;
			case 3:
				$ViCpermisos = DB::table("permiso")->join("alumno",function($join){
					$join->on("permiso.Alumno_idAlumno","=","alumno.idAlumno");
				})->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estado", 0)->get();
				$ViCalumnos = DB::table("alumno")->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estadoperfil", 1)->get();
				$ViCcriticos = array();
				$ViCpromedios = array();
				foreach ($ViCalumnos as $ViCkey) {
					$ViCcalificaciones = DB::table("calificaciones")->where("Alumno_idAlumno",$ViCkey->idAlumno)->get();
					$ViCnumcalificaciones = DB::table("calificaciones")->where("Alumno_idAlumno",$ViCkey->idAlumno)->count();
					$ViCsuma = 0;
					foreach ($ViCcalificaciones as $ViCkey2) {
						$ViCsuma = $ViCsuma + $ViCkey2->calificacion;
					}
					if ($ViCnumcalificaciones > 0) {$ViCpromedio = $ViCsuma/$ViCnumcalificaciones;}
					else {$ViCpromedio = 70;}
					if ($ViCpromedio<70) {
						array_push($ViCcriticos, $ViCkey);
						$ViCpromedios[$ViCkey->nombre] = $ViCpromedio;
					}
				}
				return View::make("coordinador")
				->with("permisos", $ViCpermisos)
				->with("criticos", $ViCcriticos)
				->with("promedios", $ViCpromedios);
				break;
			case 4:
				$ViCpermisos = DB::table("permiso")->where("Alumno_idAlumno", Session::get("usuario"))->get();
				return View::make("indexAlumno")->with("permisos", $ViCpermisos);
				break;
		}
	}

	public function VistaCalificacionesAlumno(){
		$ViCcalificaciones = DB::table("calificaciones")->select(array("nivel.nombre as nombren","periodo.nombre as nombrep","materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
		->join("materia",function($join){
				$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
			})->join("periodo",function($join){
				$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
			})->join("nivel",function($join){
				$join->on("calificaciones.nivel_idnivel","=","nivel.idnivel");
			})->where("Alumno_idAlumno",Session::get("usuario"))
		->orderBy('nivel_idnivel', 'asc')->get();
		$ViCniveles = DB::table("nivel")->get();
		return View::make("calificacionesalumno")
		->with("calificaiones", $ViCcalificaciones)->with("niveles",$ViCniveles);
	}

	public function VistaCoordinadorCalificacionesAlumno($ViCid){
		$ViCalumno = DB::table("alumno")->where("idAlumno",$ViCid)->first();
		if ($ViCalumno->Coordinador_idCoordinador==Session::get("usuario")) {
			$ViCcalificaciones = DB::table("calificaciones")->select(array("nivel.nombre as nombren","periodo.nombre as nombrep","materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
			->join("materia",function($join){
					$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
				})->join("periodo",function($join){
					$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
				})->join("nivel",function($join){
					$join->on("calificaciones.nivel_idnivel","=","nivel.idnivel");
				})->where("Alumno_idAlumno",$ViCid)
			->orderBy('nivel_idnivel', 'asc')->get();
			$ViCniveles = DB::table("nivel")->get();
			return View::make("calificacionescoordinadoralumno")
			->with("calificaiones", $ViCcalificaciones)->with("alumno",$ViCalumno)->with("niveles",$ViCniveles);
		}else{return Redirect::to('/inicio');}
	}

	public function VistaColegiaturasAlumno(){
		$ViCg = new HomeController();
		date_default_timezone_set('America/Mexico_City');
		$ViCfechaactual = date('Y-m-d');
		$ViCseccion = DB::table("colegiatura")->where("Alumno_idAlumno",Session::get("usuario"));
		$ViCcolegiaturas = $ViCseccion->orderBy('periodo_idperiodo', 'asc')->get();
		$ViCconcole = $ViCseccion->count();
		$ViCusuario = DB::table("alumno")->where("idAlumno",Session::get("usuario"))->first();
		$ViCadeudo = ($ViCg->restaFechas($ViCusuario->fecha, $ViCfechaactual))-$ViCconcole;
		if ($ViCadeudo < 0) {$ViCadeudo = 0;}
		return View::make("colegiaturasalumno")->with("adeudo",$ViCadeudo)->with("colegiaturas",$ViCcolegiaturas);
	}

	public function VistaCoordinadorColegiaturasAlumno($ViCid){
		$ViCusuario = DB::table("alumno")->where("idAlumno",$ViCid)->first();
		if ($ViCusuario->Coordinador_idCoordinador==Session::get("usuario")) {
			$ViCg = new HomeController();
			date_default_timezone_set('America/Mexico_City');
			$ViCfechaactual = date('Y-m-d');
			$ViCseccion = DB::table("colegiatura")->where("Alumno_idAlumno",$ViCid);
			$ViCcolegiaturas = $ViCseccion->orderBy('periodo_idperiodo', 'asc')->get();
			$ViCconcole = $ViCseccion->count();
			$ViCadeudo = ($ViCg->restaFechas($ViCusuario->fecha, $ViCfechaactual))-$ViCconcole;
			if ($ViCadeudo < 0) {$ViCadeudo = 0;}
			return View::make("colegiaturascoordinadoralumno")->with("adeudo",$ViCadeudo)->with("colegiaturas",$ViCcolegiaturas)->with("alumno",$ViCusuario);
		}else{return Redirect::to('/inicio');}
	}

	public function VistaBusquedaAlumno(){
		$ViCalumnos = DB::table("alumno")->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estadoperfil","<",2)->orderBy('idAlumno', 'asc')->get();
		$ViCalumnosgraduados = DB::table("alumno")->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estadoperfil",2)->orderBy('idAlumno', 'asc')->get();
		return View::make("busqueda")->with("alumnos",$ViCalumnos)->with("alumnosgraduados",$ViCalumnosgraduados);
	}

	public function VistaAsignarAlumnoCoordinador(){
		$ViCalumnos = DB::table("alumno")->where("estadoperfil", 1)->where("Coordinador_idCoordinador", null)->orderBy('idAlumno', 'asc')->get();
		$ViCcoordinadores = DB::table("coordinador")->where("estadoperfil", 1)->orderBy('idCoordinador', 'asc')->get();
		return View::make("AdministradorAsignarAlumnosCoordinador")->with("alumnos", $ViCalumnos)->with("coordinadores", $ViCcoordinadores);
	}

	public function VistaCambioContrasena($ViCtipo,$ViCid){
		if ($ViCtipo==3) {
			$ViCusuario = DB::table("coordinador")->where("idCoordinador",$ViCid)->first();
			$ViCnombre = "Coordinador ".$ViCusuario->nombre." con matricula: ".$ViCusuario->matriculac;
		}
		else{
			$ViCusuario = DB::table("alumno")->where("idAlumno",$ViCid)->first();
			$ViCnombre = "Alumno ".$ViCusuario->nombre." con matricula: ".$ViCusuario->matriculaa;
		}
		return View::make("cambiocontrasena")->with("tipo",$ViCtipo)->with("id",$ViCid)->with("nombre",$ViCnombre);
	}
}