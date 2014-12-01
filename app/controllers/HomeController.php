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

	public function EstadoAlumno($value){
		if ($value == 0) {
			return "Inactivo";
		}elseif ($value == 1) {
			return "Activo";
		}else{
			return "Graduado";
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

	public function Especiales($texto){
		if (strpos($texto, " ")) { $texto = str_replace(" ", "&nbsp;", $texto);}
		if (strpos($texto, "¡")) { $texto = str_replace("¡", "&iexcl;", $texto);}
		if (strpos($texto, "¢")) { $texto = str_replace("¢", "&cent;", $texto);}
		if (strpos($texto, "£")) { $texto = str_replace("£", "&pound;", $texto);}
		if (strpos($texto, "¤")) { $texto = str_replace("¤", "&curren;", $texto);}
		if (strpos($texto, "¥")) { $texto = str_replace("¥", "&yen;", $texto);}
		if (strpos($texto, "§")) { $texto = str_replace("§", "&sect;", $texto);}
		if (strpos($texto, "¨")) { $texto = str_replace("¨", "&uml;", $texto);}
		if (strpos($texto, "©")) { $texto = str_replace("©", "&copy;", $texto);}
		if (strpos($texto, "ª")) { $texto = str_replace("ª", "&ordf;", $texto);}
		if (strpos($texto, "« ")) { $texto = str_replace("« ", "&laquo;", $texto);}
		if (strpos($texto, "¬")) { $texto = str_replace("¬", "&not;", $texto);}
		if (strpos($texto, "®")) { $texto = str_replace("®", "&reg;", $texto);}
		if (strpos($texto, "¯")) { $texto = str_replace("¯", "&macr;", $texto);}
		if (strpos($texto, "°")) { $texto = str_replace("°", "&deg;", $texto);}
		if (strpos($texto, "±")) { $texto = str_replace("±", "&plusmn;", $texto);}
		if (strpos($texto, "´")) { $texto = str_replace("´", "&acute;", $texto);}
		if (strpos($texto, "µ")) { $texto = str_replace("µ", "&micro;", $texto);}
		if (strpos($texto, "¶")) { $texto = str_replace("¶", "&para;", $texto);}
		if (strpos($texto, "·")) { $texto = str_replace("·", "&middot;", $texto);}
		if (strpos($texto, "¸")) { $texto = str_replace("¸", "&cedil;", $texto);}
		if (strpos($texto, "º")) { $texto = str_replace("º", "&ordm;", $texto);}
		if (strpos($texto, " »")) { $texto = str_replace(" »", "&raquo;", $texto);}
		if (strpos($texto, "¿")) { $texto = str_replace("¿", "&iquest;", $texto);}
		if (strpos($texto, "À")) { $texto = str_replace("À", "&Agrave;", $texto);}
		if (strpos($texto, "Á")) { $texto = str_replace("Á", "&Aacute;", $texto);}
		if (strpos($texto, "Â")) { $texto = str_replace("Â", "&Acirc;", $texto);}
		if (strpos($texto, "Ã")) { $texto = str_replace("Ã", "&Atilde;", $texto);}
		if (strpos($texto, "Ä")) { $texto = str_replace("Ä", "&Auml;", $texto);}
		if (strpos($texto, "Å")) { $texto = str_replace("Å", "&Aring;", $texto);}
		if (strpos($texto, "Æ")) { $texto = str_replace("Æ", "&AElig;", $texto);}
		if (strpos($texto, "Ç")) { $texto = str_replace("Ç", "&Ccedil;", $texto);}
		if (strpos($texto, "È")) { $texto = str_replace("È", "&Egrave;", $texto);}
		if (strpos($texto, "É")) { $texto = str_replace("É", "&Eacute;", $texto);}
		if (strpos($texto, "Ê")) { $texto = str_replace("Ê", "&Ecirc;", $texto);}
		if (strpos($texto, "Ë")) { $texto = str_replace("Ë", "&Euml;", $texto);}
		if (strpos($texto, "Ì")) { $texto = str_replace("Ì", "&Igrave;", $texto);}
		if (strpos($texto, "Í")) { $texto = str_replace("Í", "&Iacute;", $texto);}
		if (strpos($texto, "Î")) { $texto = str_replace("Î", "&Icirc;", $texto);}
		if (strpos($texto, "Ï")) { $texto = str_replace("Ï", "&Iuml;", $texto);}
		if (strpos($texto, "Ñ")) { $texto = str_replace("Ñ", "&Ntilde;", $texto);}
		if (strpos($texto, "Ò")) { $texto = str_replace("Ò", "&Ograve;", $texto);}
		if (strpos($texto, "Ó")) { $texto = str_replace("Ó", "&Oacute;", $texto);}
		if (strpos($texto, "Ô")) { $texto = str_replace("Ô", "&Ocirc;", $texto);}
		if (strpos($texto, "Õ")) { $texto = str_replace("Õ", "&Otilde;", $texto);}
		if (strpos($texto, "Ö")) { $texto = str_replace("Ö", "&Ouml;", $texto);}
		if (strpos($texto, "Ø")) { $texto = str_replace("Ø", "&Oslash;", $texto);}
		if (strpos($texto, "Ù")) { $texto = str_replace("Ù", "&Ugrave;", $texto);}
		if (strpos($texto, "Ú")) { $texto = str_replace("Ú", "&Uacute;", $texto);}
		if (strpos($texto, "Û")) { $texto = str_replace("Û", "&Ucirc;", $texto);}
		if (strpos($texto, "Ü")) { $texto = str_replace("Ü", "&Uuml;", $texto);}
		if (strpos($texto, "ß")) { $texto = str_replace("ß", "&szlig;", $texto);}
		if (strpos($texto, "à")) { $texto = str_replace("à", "&agrave;", $texto);}
		if (strpos($texto, "á")) { $texto = str_replace("á", "&aacute;", $texto);}
		if (strpos($texto, "â")) { $texto = str_replace("â", "&acirc;", $texto);}
		if (strpos($texto, "ã")) { $texto = str_replace("ã", "&atilde;", $texto);}
		if (strpos($texto, "ä")) { $texto = str_replace("ä", "&auml;", $texto);}
		if (strpos($texto, "å")) { $texto = str_replace("å", "&aring;", $texto);}
		if (strpos($texto, "æ")) { $texto = str_replace("æ", "&aelig;", $texto);}
		if (strpos($texto, "ç")) { $texto = str_replace("ç", "&ccedil;", $texto);}
		if (strpos($texto, "è")) { $texto = str_replace("è", "&egrave;", $texto);}
		if (strpos($texto, "é")) { $texto = str_replace("é", "&eacute;", $texto);}
		if (strpos($texto, "ê")) { $texto = str_replace("ê", "&ecirc;", $texto);}
		if (strpos($texto, "ë")) { $texto = str_replace("ë", "&euml;", $texto);}
		if (strpos($texto, "ì")) { $texto = str_replace("ì", "&igrave;", $texto);}
		if (strpos($texto, "í")) { $texto = str_replace("í", "&iacute;", $texto);}
		if (strpos($texto, "î")) { $texto = str_replace("î", "&icirc;", $texto);}
		if (strpos($texto, "ï")) { $texto = str_replace("ï", "&iuml;", $texto);}
		if (strpos($texto, "ñ")) { $texto = str_replace("ñ", "&ntilde;", $texto);}
		if (strpos($texto, "ò")) { $texto = str_replace("ò", "&ograve;", $texto);}
		if (strpos($texto, "ó")) { $texto = str_replace("ó", "&oacute;", $texto);}
		if (strpos($texto, "ô")) { $texto = str_replace("ô", "&ocirc;", $texto);}
		if (strpos($texto, "õ")) { $texto = str_replace("õ", "&otilde;", $texto);}
		if (strpos($texto, "ö")) { $texto = str_replace("ö", "&ouml;", $texto);}
		if (strpos($texto, "÷")) { $texto = str_replace("÷", "&divide;", $texto);}
		if (strpos($texto, "ø")) { $texto = str_replace("ø", "&oslash;", $texto);}
		if (strpos($texto, "ù")) { $texto = str_replace("ù", "&ugrave;", $texto);}
		if (strpos($texto, "ú")) { $texto = str_replace("ú", "&uacute;", $texto);}
		if (strpos($texto, "û")) { $texto = str_replace("û", "&ucirc;", $texto);}
		if (strpos($texto, "ü")) { $texto = str_replace("ü", "&uuml;", $texto);}
		if (strpos($texto, "ÿ")) { $texto = str_replace("ÿ", "&yuml;", $texto);}
		if (strpos($texto, "₫")) { $texto = str_replace("₫", "&dong;", $texto);}
		return $texto;
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

}
