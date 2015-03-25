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
	public function restaFechas($HoCdFecIni, $HoCdFecFin){
		$HoCdFecIni = str_replace("-"," ",$HoCdFecIni);
		$HoCdFecIni = str_replace("/"," ",$HoCdFecIni);
		$HoCdFecFin = str_replace("-"," ",$HoCdFecFin);
		$HoCdFecFin = str_replace("/"," ",$HoCdFecFin);

		$HoCaFecIni = explode(" ", $HoCdFecIni);
		$HoCaFecFin = explode(" ", $HoCdFecFin);

		$HoCtimestamp1 = mktime(0,0,0,$HoCaFecIni[1], $HoCaFecIni[2], $HoCaFecIni[0]);
		$HoCtimestamp2 = mktime(0,0,0,$HoCaFecFin[1], $HoCaFecFin[2], $HoCaFecFin[0]);

		$HoCsegundos_diferencia = $HoCtimestamp1 - $HoCtimestamp2; 
		$HoCmes_diferencia = floor(abs($HoCsegundos_diferencia / (60 * 60 * 24 * 30))); 

		return $HoCmes_diferencia;
	}

	public function ValidarNoVacio($HoCarray){
		$HoCvalor = true;
		foreach ($HoCarray as $HoCkey) {
			if (!isset($HoCkey)||$HoCkey==null||$HoCkey=="") {
				$HoCvalor = false;
			}
		}
		return $HoCvalor;
	}

	public function Estado($HoCvalue){
		if ($HoCvalue == 0) {
			return "No visto";
		}elseif ($HoCvalue == 1) {
			return "Aceptado";
		}else{
			return "Rechazado";
		}
	}

	public function EstadoAlumno($HoCvalue){
		if ($HoCvalue == 0) {
			return "Inactivo";
		}elseif ($HoCvalue == 1) {
			return "Activo";
		}else{
			return "Graduado";
		}
	}

	public function FechaNormal($HoCvalue){
		$HoCcadena = explode("-", $HoCvalue);
		$HoCvalue = $HoCcadena[2]."/".$HoCcadena[1]."/".$HoCcadena[0];
		return $HoCvalue;
	}

	public function ValidarNoVacioUno($HoCvalue){
		$HoCvalor = true;
		if(!isset($HoCvalue) || $HoCvalue==null || $HoCvalue==" "){
			$HoCvalor = false;
		}
		return $HoCvalor;
	}
	
	public function obtenerExt($HoCvalue){
		$HoCnombre=explode(".", $HoCvalue);
		$HoCtam = count($HoCnombre);
		return $HoCnombre[$HoCtam-1];
	}

	public function Especiales($HoCtexto){
		if (strpos($HoCtexto, " ")) { $HoCtexto = str_replace(" ", "&nbsp;", $HoCtexto);}
		if (strpos($HoCtexto, "¡")) { $HoCtexto = str_replace("¡", "&iexcl;", $HoCtexto);}
		if (strpos($HoCtexto, "¢")) { $HoCtexto = str_replace("¢", "&cent;", $HoCtexto);}
		if (strpos($HoCtexto, "£")) { $HoCtexto = str_replace("£", "&pound;", $HoCtexto);}
		if (strpos($HoCtexto, "¤")) { $HoCtexto = str_replace("¤", "&curren;", $HoCtexto);}
		if (strpos($HoCtexto, "¥")) { $HoCtexto = str_replace("¥", "&yen;", $HoCtexto);}
		if (strpos($HoCtexto, "§")) { $HoCtexto = str_replace("§", "&sect;", $HoCtexto);}
		if (strpos($HoCtexto, "¨")) { $HoCtexto = str_replace("¨", "&uml;", $HoCtexto);}
		if (strpos($HoCtexto, "©")) { $HoCtexto = str_replace("©", "&copy;", $HoCtexto);}
		if (strpos($HoCtexto, "ª")) { $HoCtexto = str_replace("ª", "&ordf;", $HoCtexto);}
		if (strpos($HoCtexto, "« ")) { $HoCtexto = str_replace("« ", "&laquo;", $HoCtexto);}
		if (strpos($HoCtexto, "¬")) { $HoCtexto = str_replace("¬", "&not;", $HoCtexto);}
		if (strpos($HoCtexto, "®")) { $HoCtexto = str_replace("®", "&reg;", $HoCtexto);}
		if (strpos($HoCtexto, "¯")) { $HoCtexto = str_replace("¯", "&macr;", $HoCtexto);}
		if (strpos($HoCtexto, "°")) { $HoCtexto = str_replace("°", "&deg;", $HoCtexto);}
		if (strpos($HoCtexto, "±")) { $HoCtexto = str_replace("±", "&plusmn;", $HoCtexto);}
		if (strpos($HoCtexto, "´")) { $HoCtexto = str_replace("´", "&acute;", $HoCtexto);}
		if (strpos($HoCtexto, "µ")) { $HoCtexto = str_replace("µ", "&micro;", $HoCtexto);}
		if (strpos($HoCtexto, "¶")) { $HoCtexto = str_replace("¶", "&para;", $HoCtexto);}
		if (strpos($HoCtexto, "·")) { $HoCtexto = str_replace("·", "&middot;", $HoCtexto);}
		if (strpos($HoCtexto, "¸")) { $HoCtexto = str_replace("¸", "&cedil;", $HoCtexto);}
		if (strpos($HoCtexto, "º")) { $HoCtexto = str_replace("º", "&ordm;", $HoCtexto);}
		if (strpos($HoCtexto, " »")) { $HoCtexto = str_replace(" »", "&raquo;", $HoCtexto);}
		if (strpos($HoCtexto, "¿")) { $HoCtexto = str_replace("¿", "&iquest;", $HoCtexto);}
		if (strpos($HoCtexto, "À")) { $HoCtexto = str_replace("À", "&Agrave;", $HoCtexto);}
		if (strpos($HoCtexto, "Á")) { $HoCtexto = str_replace("Á", "&Aacute;", $HoCtexto);}
		if (strpos($HoCtexto, "Â")) { $HoCtexto = str_replace("Â", "&Acirc;", $HoCtexto);}
		if (strpos($HoCtexto, "Ã")) { $HoCtexto = str_replace("Ã", "&Atilde;", $HoCtexto);}
		if (strpos($HoCtexto, "Ä")) { $HoCtexto = str_replace("Ä", "&Auml;", $HoCtexto);}
		if (strpos($HoCtexto, "Å")) { $HoCtexto = str_replace("Å", "&Aring;", $HoCtexto);}
		if (strpos($HoCtexto, "Æ")) { $HoCtexto = str_replace("Æ", "&AElig;", $HoCtexto);}
		if (strpos($HoCtexto, "Ç")) { $HoCtexto = str_replace("Ç", "&Ccedil;", $HoCtexto);}
		if (strpos($HoCtexto, "È")) { $HoCtexto = str_replace("È", "&Egrave;", $HoCtexto);}
		if (strpos($HoCtexto, "É")) { $HoCtexto = str_replace("É", "&Eacute;", $HoCtexto);}
		if (strpos($HoCtexto, "Ê")) { $HoCtexto = str_replace("Ê", "&Ecirc;", $HoCtexto);}
		if (strpos($HoCtexto, "Ë")) { $HoCtexto = str_replace("Ë", "&Euml;", $HoCtexto);}
		if (strpos($HoCtexto, "Ì")) { $HoCtexto = str_replace("Ì", "&Igrave;", $HoCtexto);}
		if (strpos($HoCtexto, "Í")) { $HoCtexto = str_replace("Í", "&Iacute;", $HoCtexto);}
		if (strpos($HoCtexto, "Î")) { $HoCtexto = str_replace("Î", "&Icirc;", $HoCtexto);}
		if (strpos($HoCtexto, "Ï")) { $HoCtexto = str_replace("Ï", "&Iuml;", $HoCtexto);}
		if (strpos($HoCtexto, "Ñ")) { $HoCtexto = str_replace("Ñ", "&Ntilde;", $HoCtexto);}
		if (strpos($HoCtexto, "Ò")) { $HoCtexto = str_replace("Ò", "&Ograve;", $HoCtexto);}
		if (strpos($HoCtexto, "Ó")) { $HoCtexto = str_replace("Ó", "&Oacute;", $HoCtexto);}
		if (strpos($HoCtexto, "Ô")) { $HoCtexto = str_replace("Ô", "&Ocirc;", $HoCtexto);}
		if (strpos($HoCtexto, "Õ")) { $HoCtexto = str_replace("Õ", "&Otilde;", $HoCtexto);}
		if (strpos($HoCtexto, "Ö")) { $HoCtexto = str_replace("Ö", "&Ouml;", $HoCtexto);}
		if (strpos($HoCtexto, "Ø")) { $HoCtexto = str_replace("Ø", "&Oslash;", $HoCtexto);}
		if (strpos($HoCtexto, "Ù")) { $HoCtexto = str_replace("Ù", "&Ugrave;", $HoCtexto);}
		if (strpos($HoCtexto, "Ú")) { $HoCtexto = str_replace("Ú", "&Uacute;", $HoCtexto);}
		if (strpos($HoCtexto, "Û")) { $HoCtexto = str_replace("Û", "&Ucirc;", $HoCtexto);}
		if (strpos($HoCtexto, "Ü")) { $HoCtexto = str_replace("Ü", "&Uuml;", $HoCtexto);}
		if (strpos($HoCtexto, "ß")) { $HoCtexto = str_replace("ß", "&szlig;", $HoCtexto);}
		if (strpos($HoCtexto, "à")) { $HoCtexto = str_replace("à", "&agrave;", $HoCtexto);}
		if (strpos($HoCtexto, "á")) { $HoCtexto = str_replace("á", "&aacute;", $HoCtexto);}
		if (strpos($HoCtexto, "â")) { $HoCtexto = str_replace("â", "&acirc;", $HoCtexto);}
		if (strpos($HoCtexto, "ã")) { $HoCtexto = str_replace("ã", "&atilde;", $HoCtexto);}
		if (strpos($HoCtexto, "ä")) { $HoCtexto = str_replace("ä", "&auml;", $HoCtexto);}
		if (strpos($HoCtexto, "å")) { $HoCtexto = str_replace("å", "&aring;", $HoCtexto);}
		if (strpos($HoCtexto, "æ")) { $HoCtexto = str_replace("æ", "&aelig;", $HoCtexto);}
		if (strpos($HoCtexto, "ç")) { $HoCtexto = str_replace("ç", "&ccedil;", $HoCtexto);}
		if (strpos($HoCtexto, "è")) { $HoCtexto = str_replace("è", "&egrave;", $HoCtexto);}
		if (strpos($HoCtexto, "é")) { $HoCtexto = str_replace("é", "&eacute;", $HoCtexto);}
		if (strpos($HoCtexto, "ê")) { $HoCtexto = str_replace("ê", "&ecirc;", $HoCtexto);}
		if (strpos($HoCtexto, "ë")) { $HoCtexto = str_replace("ë", "&euml;", $HoCtexto);}
		if (strpos($HoCtexto, "ì")) { $HoCtexto = str_replace("ì", "&igrave;", $HoCtexto);}
		if (strpos($HoCtexto, "í")) { $HoCtexto = str_replace("í", "&iacute;", $HoCtexto);}
		if (strpos($HoCtexto, "î")) { $HoCtexto = str_replace("î", "&icirc;", $HoCtexto);}
		if (strpos($HoCtexto, "ï")) { $HoCtexto = str_replace("ï", "&iuml;", $HoCtexto);}
		if (strpos($HoCtexto, "ñ")) { $HoCtexto = str_replace("ñ", "&ntilde;", $HoCtexto);}
		if (strpos($HoCtexto, "ò")) { $HoCtexto = str_replace("ò", "&ograve;", $HoCtexto);}
		if (strpos($HoCtexto, "ó")) { $HoCtexto = str_replace("ó", "&oacute;", $HoCtexto);}
		if (strpos($HoCtexto, "ô")) { $HoCtexto = str_replace("ô", "&ocirc;", $HoCtexto);}
		if (strpos($HoCtexto, "õ")) { $HoCtexto = str_replace("õ", "&otilde;", $HoCtexto);}
		if (strpos($HoCtexto, "ö")) { $HoCtexto = str_replace("ö", "&ouml;", $HoCtexto);}
		if (strpos($HoCtexto, "÷")) { $HoCtexto = str_replace("÷", "&divide;", $HoCtexto);}
		if (strpos($HoCtexto, "ø")) { $HoCtexto = str_replace("ø", "&oslash;", $HoCtexto);}
		if (strpos($HoCtexto, "ù")) { $HoCtexto = str_replace("ù", "&ugrave;", $HoCtexto);}
		if (strpos($HoCtexto, "ú")) { $HoCtexto = str_replace("ú", "&uacute;", $HoCtexto);}
		if (strpos($HoCtexto, "û")) { $HoCtexto = str_replace("û", "&ucirc;", $HoCtexto);}
		if (strpos($HoCtexto, "ü")) { $HoCtexto = str_replace("ü", "&uuml;", $HoCtexto);}
		if (strpos($HoCtexto, "ÿ")) { $HoCtexto = str_replace("ÿ", "&yuml;", $HoCtexto);}
		if (strpos($HoCtexto, "₫")) { $HoCtexto = str_replace("₫", "&dong;", $HoCtexto);}
		return $HoCtexto;
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

}
