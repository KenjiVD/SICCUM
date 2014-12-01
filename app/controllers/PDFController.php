<?php

class PDFController extends BaseController {
	public function GenerarPDF(){
		date_default_timezone_set('America/Mexico_City');
        $fecha = date('d-m-Y H:i:s');
		$listaalumnos = array();
		$listacarreras = array();
		$listaperiodos = array();
		$alumnos = DB::table("alumno")->select(array("alumno.nombre as NombreAlumno","carrera.nombre as NombreCarrera","alumno.idAlumno"))
		->join("carrera",function($join){
				$join->on("alumno.carrera_idcarrera","=","carrera.idcarrera");
			})->where("estadoperfil",1)->where("Coordinador_idCoordinador",Session::get("usuario"))->get();
		$periodos = DB::table("periodo")->get();
		foreach ($alumnos as $alumno) {
			$ContCaliRepro = DB::table("calificaciones")->where("Alumno_idAlumno",$alumno->idAlumno)->where("calificacion","<",70)->count();
			if ($ContCaliRepro >= 4) {
				$PeriodosConReprobadas = array();
				foreach ($periodos as $periodo) {
					$ContCaliReproPer = DB::table("calificaciones")->where("Alumno_idAlumno",$alumno->idAlumno)->where("calificacion","<",70)->where("periodo_idperiodo",$periodo->idperiodo)->count();
					if ($ContCaliReproPer > 0) {
						array_push($PeriodosConReprobadas, $periodo->nombre);
						array_push($PeriodosConReprobadas, $ContCaliReproPer);
					}
				}
				array_push($listaalumnos, $alumno->NombreAlumno);
				array_push($listacarreras, $alumno->NombreCarrera);
				array_push($listaperiodos, $PeriodosConReprobadas);
			}
		}
		$g = new HomeController();
		/*Inicio*/$html = '<html><body><head><link rel="stylesheet" type="text/css" href="PDFestilo.css" /></head>';
		$html.= '<img id="logoseguridad" src="img/logo.jpg">';
		$html.= '<div id="titulo">CENTRO UNIVERSITARIO MESOAMERICANO<br>"'.$g->Especiales("Joaquín Miguel Gutiérrez").'"<br><br><span class="subtitulo">REPORTE DE POSIBLES DESERCIONES POR EL ALUMNADO</span><br><span class="subtitulo">'.$g->Especiales("A continuación  se lista la relación de alumnos quienes presentan calificaciones críticas.").'</span><br></div>';
		/*Fin*/$html.= '</body></html>';
		return PDF::load($html, 'carta', 'portrait')->show();
	}
}