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
				return View::make("coordinador")->with("permisos", $permisos);
				break;
			case 4:
				$permisos = DB::table("permiso")->where("Alumno_idAlumno", Session::get("usuario"))->get();
				return View::make("indexAlumno")->with("permisos", $permisos);
				break;
		}
	}

	public function VistaCalificacionesAlumno(){
		$calificaciones = DB::table("calificaciones")->select(array('periodo.nombre as nombrep',"materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
		->join("materia",function($join){
				$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
			})->join("periodo",function($join){
				$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
			})->where("Alumno_idAlumno",Session::get("usuario"))
		->orderBy('nivel_idnivel', 'asc')->get();
		return View::make("calificacionesalumno")->with("calificaiones", $calificaciones);
	}

	public function VistaCoordinadorCalificacionesAlumno($id){
		$calificaciones = DB::table("calificaciones")->select(array('periodo.nombre as nombrep',"materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
		->join("materia",function($join){
				$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
			})->join("periodo",function($join){
				$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
			})->where("Alumno_idAlumno",$id)
		->orderBy('nivel_idnivel', 'asc')->get();
		return View::make("calificacionescoordinadoralumno")->with("calificaiones", $calificaciones);
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
		return View::make("colegiaturasalumno")->with("adeudo",$adeudo)->with("colegiaturas",$colegiaturas);
	}

	public function VistaCoordinadorColegiaturasAlumno($id){
		$g = new HomeController();
		date_default_timezone_set('America/Mexico_City');
		$fechaactual = date('Y-m-d');
		$seccion = DB::table("colegiatura")->where("Alumno_idAlumno",$id);
		$colegiaturas = $seccion->orderBy('periodo_idperiodo', 'asc')->get();
		$concole = $seccion->count();
		$usuario = DB::table("alumno")->where("idAlumno",$id)->first();
		$adeudo = ($g->restaFechas($usuario->fecha, $fechaactual))-$concole;
		return View::make("colegiaturascoordinadoralumno")->with("adeudo",$adeudo)->with("colegiaturas",$colegiaturas);
	}

	public function VistaBusquedaAlumno(){
		$alumnos = DB::table("alumno")->where("Coordinador_idCoordinador", Session::get("usuario"))->orderBy('idAlumno', 'asc')->get();
		return View::make("busqueda")->with("alumnos",$alumnos);
	}
}