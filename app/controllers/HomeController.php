<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function restaFechas($dFecIni, $dFecFin){
		$dFecIni = str_replace("-"," ",$dFecIni);
		$dFecIni = str_replace("/"," ",$dFecIni);
		$dFecFin = str_replace("-"," ",$dFecFin);
		$dFecFin = str_replace("/"," ",$dFecFin);

		$aFecIni = explode(" ", $dFecIni);
		$aFecFin = explode(" ", $dFecFin);

		$timestamp1 = mktime(0,0,0,$aFecIni[1], $aFecIni[2], $aFecIni[0]);
		$timestamp2 = mktime(0,0,0,$aFecFin[1], $aFecFin[2], $aFecFin[0]);

		$segundos_diferencia = $timestamp1 - $timestamp2; 
		$mes_diferencia = floor(abs($segundos_diferencia / (60 * 60 * 24 * 30))); 

		return $mes_diferencia;
	}

	public function ValidarNoVacio($array){
		$valor = true;
		foreach ($array as $key) {
			if (!isset($key)||$key==null||$key=="") {
				$valor = false;
			}
		}
		return $valor;
	}

	public function Estado($value){
		if ($value == 0) {
			return "No visto";
		}elseif ($value == 1) {
			return "Aceptado";
		}else{
			return "Rechazado";
		}
	}

	public function FechaNormal($value){
		$cadena = explode("-", $value);
		$value = $cadena[2]."/".$cadena[1]."/".$cadena[0];
		return $value;
	}

	public function ValidarNoVacioUno($value){
		$valor = true;
		if(!isset($value) || $value==null || $value==" "){
			$valor = false;
		}
		return $valor;
	}
	
	public function obtenerExt($value){
		$nombre=explode(".", $value);
		$tam = count($nombre);
		return $nombre[$tam-1];
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

}
