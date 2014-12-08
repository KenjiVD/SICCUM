<?php

class VistaController extends BaseController {
	public function VistaInicio(){
		switch (Session::get("tipo")) {
			case 1:
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
				break;
			case 2:
				$alumnosactivos = DB::table("alumno")->where("estadoperfil",1)->get();
				$alumnosinactivos = DB::table("alumno")->where("estadoperfil",0)->get();
				$coordinadoresactivos = DB::table("coordinador")->where("estadoperfil",1)->get();
				$coordinadoresinactivos = DB::table("coordinador")->where("estadoperfil",0)->get();
				return View::make("indexAdministrador")
					->with("alumnosactivos",$alumnosactivos)
					->with("alumnosinactivos",$alumnosinactivos)
					->with("coordinadoresactivos",$coordinadoresactivos)
					->with("coordinadoresinactivos",$coordinadoresinactivos);
				break;
			case 3:
				$permisos = DB::table("permiso")->join("alumno",function($join){
					$join->on("permiso.Alumno_idAlumno","=","alumno.idAlumno");
				})->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estado", 0)->get();
				$alumnos = DB::table("alumno")->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estadoperfil", 1)->get();
				$criticos = array();
				$promedios = array();
				foreach ($alumnos as $key) {
					$calificaciones = DB::table("calificaciones")->where("Alumno_idAlumno",$key->idAlumno)->get();
					$numcalificaciones = DB::table("calificaciones")->where("Alumno_idAlumno",$key->idAlumno)->count();
					$suma = 0;
					foreach ($calificaciones as $key2) {
						$suma = $suma + $key2->calificacion;
					}
					if ($numcalificaciones > 0) {$promedio = $suma/$numcalificaciones;}
					else {$promedio = 70;}
					if ($promedio<70) {
						array_push($criticos, $key);
						$promedios[$key->nombre] = $promedio;
					}
				}
				return View::make("coordinador")
				->with("permisos", $permisos)
				->with("criticos", $criticos)
				->with("promedios", $promedios);
				break;
			case 4:
				$permisos = DB::table("permiso")->where("Alumno_idAlumno", Session::get("usuario"))->get();
				return View::make("indexAlumno")->with("permisos", $permisos);
				break;
		}
	}

	public function VistaCalificacionesAlumno(){
		$calificaciones = DB::table("calificaciones")->select(array("nivel.nombre as nombren","periodo.nombre as nombrep","materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
		->join("materia",function($join){
				$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
			})->join("periodo",function($join){
				$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
			})->join("nivel",function($join){
				$join->on("calificaciones.nivel_idnivel","=","nivel.idnivel");
			})->where("Alumno_idAlumno",Session::get("usuario"))
		->orderBy('nivel_idnivel', 'asc')->get();
		$niveles = DB::table("nivel")->get();
		return View::make("calificacionesalumno")
		->with("calificaiones", $calificaciones)->with("niveles",$niveles);
	}

	public function VistaCoordinadorCalificacionesAlumno($id){
		$alumno = DB::table("alumno")->where("idAlumno",$id)->first();
		if ($alumno->Coordinador_idCoordinador==Session::get("usuario")) {
			$calificaciones = DB::table("calificaciones")->select(array("nivel.nombre as nombren","periodo.nombre as nombrep","materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
			->join("materia",function($join){
					$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
				})->join("periodo",function($join){
					$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
				})->join("nivel",function($join){
					$join->on("calificaciones.nivel_idnivel","=","nivel.idnivel");
				})->where("Alumno_idAlumno",$id)
			->orderBy('nivel_idnivel', 'asc')->get();
			$niveles = DB::table("nivel")->get();
			return View::make("calificacionescoordinadoralumno")
			->with("calificaiones", $calificaciones)->with("alumno",$alumno)->with("niveles",$niveles);
		}else{return Redirect::to('/inicio');}
	}

	public function VistaColegiaturasAlumno(){
		$g = new HomeController();
		date_default_timezone_set('America/Mexico_City');
		$fechaactual = date('Y-m-d');
		$seccion = DB::table("colegiatura")->where("Alumno_idAlumno",Session::get("usuario"));
		$colegiaturas = $seccion->orderBy('periodo_idperiodo', 'asc')->get();
		$concole = $seccion->count();
		$usuario = DB::table("alumno")->where("idAlumno",Session::get("usuario"))->first();
		$adeudo = ($g->restaFechas($usuario->fecha, $fechaactual))-$concole;
		if ($adeudo < 0) {$adeudo = 0;}
		return View::make("colegiaturasalumno")->with("adeudo",$adeudo)->with("colegiaturas",$colegiaturas);
	}

	public function VistaCoordinadorColegiaturasAlumno($id){
		$usuario = DB::table("alumno")->where("idAlumno",$id)->first();
		if ($usuario->Coordinador_idCoordinador==Session::get("usuario")) {
			$g = new HomeController();
			date_default_timezone_set('America/Mexico_City');
			$fechaactual = date('Y-m-d');
			$seccion = DB::table("colegiatura")->where("Alumno_idAlumno",$id);
			$colegiaturas = $seccion->orderBy('periodo_idperiodo', 'asc')->get();
			$concole = $seccion->count();
			$adeudo = ($g->restaFechas($usuario->fecha, $fechaactual))-$concole;
			if ($adeudo < 0) {$adeudo = 0;}
			return View::make("colegiaturascoordinadoralumno")->with("adeudo",$adeudo)->with("colegiaturas",$colegiaturas)->with("alumno",$usuario);
		}else{return Redirect::to('/inicio');}
	}

	public function VistaBusquedaAlumno(){
		$alumnos = DB::table("alumno")->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estadoperfil","<",2)->orderBy('idAlumno', 'asc')->get();
		$alumnosgraduados = DB::table("alumno")->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estadoperfil",2)->orderBy('idAlumno', 'asc')->get();
		return View::make("busqueda")->with("alumnos",$alumnos)->with("alumnosgraduados",$alumnosgraduados);
	}

	public function VistaAsignarAlumnoCoordinador(){
		$alumnos = DB::table("alumno")->where("estadoperfil", 1)->where("Coordinador_idCoordinador", null)->orderBy('idAlumno', 'asc')->get();
		$coordinadores = DB::table("coordinador")->where("estadoperfil", 1)->orderBy('idCoordinador', 'asc')->get();
		return View::make("AdministradorAsignarAlumnosCoordinador")->with("alumnos", $alumnos)->with("coordinadores", $coordinadores);
	}

	public function VistaCambioContrasena($tipo,$id){
		if ($tipo==3) {
			$usuario = DB::table("coordinador")->where("idCoordinador",$id)->first();
			$nombre = "Coordinador ".$usuario->nombre." con matricula: ".$usuario->matriculac;
		}
		else{
			$usuario = DB::table("alumno")->where("idAlumno",$id)->first();
			$nombre = "Alumno ".$usuario->nombre." con matricula: ".$usuario->matriculaa;
		}
		return View::make("cambiocontrasena")->with("tipo",$tipo)->with("id",$id)->with("nombre",$nombre);
	}
}