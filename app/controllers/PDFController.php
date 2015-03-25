<?php

class PDFController extends BaseController {
	public function GenerarPDF(){
		date_default_timezone_set('America/Mexico_City');
        $PDFCfecha = date('d-m-Y H:i:s');

		$PDFCalumnos = DB::table("alumno")->select(array("alumno.nombre as NombreAlumno","carrera.nombre as NombreCarrera","alumno.idAlumno"))
		->join("carrera",function($join){
				$join->on("alumno.carrera_idcarrera","=","carrera.idcarrera");
			})->where("estadoperfil",1)->where("Coordinador_idCoordinador",Session::get("usuario"))->get();
		$PDFCperiodos = DB::table("periodo")->get();

		$PDFCg = new HomeController();
		/*Inicio*/$PDFChtml = '<html><body><head><link rel="stylesheet" type="text/css" href="PDFestilo.css" /></head>';
		$PDFChtml.= '<img id="logoseguridad" src="img/logo.jpg">';
		$PDFChtml.= '<div id="titulo">CENTRO UNIVERSITARIO MESOAMERICANO<br>"'.$PDFCg->Especiales("Joaquín Miguel Gutiérrez").'"<br><br><span class="subtitulo">REPORTE DE POSIBLES DESERCIONES POR EL ALUMNADO</span><br><span class="subtitulo">'.$PDFCg->Especiales("A continuación  se lista la relación de alumnos quienes presentan calificaciones críticas.").'</span><br></div>';
		$PDFChtml.= '<div id="contenido"><table><tr><td>Nombre</td><td>Carrera</td><td>Periodo</td><td>'.$PDFCg->Especiales("Número de materias que adeuda").'</td></tr>';
				
		foreach ($PDFCalumnos as $PDFCalumno) {
			$PDFCContCaliRepro = DB::table("calificaciones")->where("Alumno_idAlumno",$PDFCalumno->idAlumno)->where("calificacion","<",70)->count();
			if ($PDFCContCaliRepro >= 4) {
				$PDFCPeriodosConReprobadas = array();
				foreach ($PDFCperiodos as $PDFCperiodo) {
					$PDFCContCaliReproPer = DB::table("calificaciones")->where("Alumno_idAlumno",$PDFCalumno->idAlumno)->where("calificacion","<",70)->where("periodo_idperiodo",$PDFCperiodo->idperiodo)->count();
					if ($PDFCContCaliReproPer > 0) {
						$PDFChtml.= '<tr><td>'.$PDFCg->Especiales($PDFCalumno->NombreAlumno).'</td><td>'.$PDFCg->Especiales($PDFCalumno->NombreCarrera).'</td><td>'.$PDFCg->Especiales($PDFCperiodo->nombre).'</td><td>'.$PDFCg->Especiales($PDFCContCaliReproPer).'</td>';
					}
				}
			}
		}
		$PDFChtml.= '</table></div>';
		/*Fin*/$PDFChtml.= '</body></html>';
		return PDF::load($PDFChtml, 'carta', 'portrait')->show();
	}
}