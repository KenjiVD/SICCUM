<?php

class UsuariosController extends BaseController {
	public function IniciarSesion(){
		$g = new HomeController();
		$datos = array();
		array_push($datos, $_POST["tipo"]);
		array_push($datos, $_POST["usuario"]);
		array_push($datos, $_POST["contrasena"]);
		$validado = $g->ValidarNoVacio($datos);
		if ($validado) {
			switch ($_POST["tipo"]) {
				case 4:
					$usuariosesion = DB::table("alumno")->where("matriculaa",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->where("estadoperfil", 1)->first();
					if(isset($usuariosesion) && $usuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $usuariosesion->idAlumno);Session::put("nombre", $usuariosesion->nombre);}
					break;
				case 3:
					$usuariosesion = DB::table("coordinador")->where("matriculac",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->where("estadoperfil", 1)->first();
					if(isset($usuariosesion) && $usuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $usuariosesion->idCoordinador);Session::put("nombre", $usuariosesion->nombre);}
					break;
				case 2:
					$usuariosesion = DB::table("administrador")->where("idadministrador",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->first();
					if(isset($usuariosesion) && $usuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $usuariosesion->idadministrador);Session::put("nombre", $usuariosesion->nombre);}
					break;
				case 1:
					$usuariosesion = DB::table("administradorsiccum")->where("idadministradorsiccum",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->first();
					if(isset($usuariosesion) && $usuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $usuariosesion->idadministradorsiccum);Session::put("nombre", $usuariosesion->nombre);}
					break;
			}
		}
		return Redirect::to("/"); 
	}

	public function Nuevo(){
		$g = new HomeController();
		$datos = array();
		array_push($datos, $_POST["usuario"]);
		array_push($datos, $_POST["contrasena"]);
		$validado = $g->ValidarNoVacio($datos);
		if ($validado) {
				$existe = DB::table("coordinador")->where("matriculac",$_POST["contrasena"])->first();
				if (!isset($existe) || $existe==null) {
					$usuariosesion = DB::table("coordinador")->insertGetId(array("nombre" => $_POST["usuario"], "contrasena" => $_POST["contrasena"], "matriculac" => $_POST["contrasena"]));
				}
			}
		return Redirect::to("/inicio"); 
	}

	public function Alta($tipo,$id){
		if ($tipo == 3) {
			DB::table("coordinador")->where("idCoordinador",$id)->update(array("estadoperfil" => 1));
			return Redirect::to("/inicio"); 
		}else{
			DB::table("alumno")->where("idAlumno",$id)->update(array("estadoperfil" => 1));
			return Redirect::to("/inicio"); 
		}
	}
	
	public function Baja($tipo,$id){
		if ($tipo == 3) {
			DB::table("coordinador")->where("idCoordinador",$id)->update(array("estadoperfil" => 0));
			return Redirect::to("/inicio"); 
		}else{
			DB::table("alumno")->where("idAlumno",$id)->update(array("estadoperfil" => 0));
			return Redirect::to("/inicio"); 
		}
	}

	public function Graduado($id){
		DB::table("alumno")->where("idAlumno",$id)->update(array("estadoperfil" => 2));
		return Redirect::to("/inicio"); 
	}

	public function BusquedaAlumno(){
		$g = new HomeController();
		$validado = $g->ValidarNoVacioUno($_POST["texto"]);
		if ($validado) {
			$alumnos = DB::table("alumno")
			->where("Coordinador_idCoordinador", Session::get("usuario"))
			->where(function($query){
				$cadena = explode(" ", $_POST["texto"]);
				for ($i=0;$i<count($cadena);$i++) {
					$query->orwhere("matriculaa","like","%".$cadena[$i]."%")
					->orwhere("nombre","like","%".$cadena[$i]."%");
				}
			})->groupBy('estadoperfil')->orderBy('idAlumno', 'asc')->get();
			return View::make("busqueda")->with("alumnos",$alumnos);
		}else{
			return Redirect::to("/buscaralumno");
		}
	}

	public function NumPermisos(){
		$permisos = DB::table("permiso")->join("alumno",function($join){
				$join->on("permiso.Alumno_idAlumno","=","alumno.idAlumno");
			})->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estado", 0)->count();
		$alumnos = DB::table("alumno")->where("Coordinador_idCoordinador", Session::get("usuario"))->where("estadoperfil", 1)->get();
		$cont = 0;
		foreach ($alumnos as $key) {
			$calificaciones = DB::table("calificaciones")->where("Alumno_idAlumno",$key->idAlumno)->get();
			$numcalificaciones = DB::table("calificaciones")->where("Alumno_idAlumno",$key->idAlumno)->count();
			$suma = 0;
			foreach ($calificaciones as $key2) {
				$suma = $suma + $key2->calificacion;
			}
			$promedio = $suma/$numcalificaciones;
			if ($promedio<70) {
				$cont++;
			}
		}
		$Notificaciones = $cont+$permisos;
		return "<ul class='nav'>
                    <li><a href=''>Notificaciones(".$Notificaciones.")</a>
                        <ul>
                            <li><a href=''>Permisos(".$permisos.")</a></li><br>
                            <li><a href=''>Alumnos Criticos(".$cont.")</a></li>
                        </ul>
                    </li>
                </ul>";
	}

	public function AsignarAlumnoCoordinador(){
		$g = new HomeController();
		$datos = array();
		array_push($datos, $_POST["id"]);
		array_push($datos, $_POST["coordinador"]);
		$validado = $g->ValidarNoVacio($datos);
		if ($validado) {
			DB::table("alumno")->where("idAlumno",$_POST["id"])->update(array("Coordinador_idCoordinador" => $_POST["coordinador"]));
		}
		return Redirect::to("/AsignarCoordinador");
	}

	public function CalificacionAlumnoNivel(){
		$calificaciones = DB::table("calificaciones")->select(array("nivel.nombre as nombren","periodo.nombre as nombrep","materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
		->join("materia",function($join){
				$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
			})->join("periodo",function($join){
				$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
			})->join("nivel",function($join){
				$join->on("calificaciones.nivel_idnivel","=","nivel.idnivel");
			})->where("Alumno_idAlumno",Session::get("usuario"))->where("nivel_idnivel",$_POST["nivel"])
		->orderBy('nivel_idnivel', 'asc')->get();
		$niveles = DB::table("nivel")->get();
		return View::make("calificaciones")
		->with("calificaiones", $calificaciones);
	}

	public function CalificacionCoordinadorAlumnoNivel(){
		$calificaciones = DB::table("calificaciones")->select(array("nivel.nombre as nombren","periodo.nombre as nombrep","materia.nombre as nombrem","calificaciones.calificacion as calificacion"))
		->join("materia",function($join){
				$join->on("calificaciones.materia_idmateria","=","materia.idmateria");
			})->join("periodo",function($join){
				$join->on("calificaciones.periodo_idperiodo","=","periodo.idperiodo");
			})->join("nivel",function($join){
				$join->on("calificaciones.nivel_idnivel","=","nivel.idnivel");
			})->where("Alumno_idAlumno",$_POST["idAlumno"])->where("nivel_idnivel",$_POST["nivel"])
		->orderBy('nivel_idnivel', 'asc')->get();
		$niveles = DB::table("nivel")->get();
		return View::make("calificaciones")
		->with("calificaiones", $calificaciones);
	}

	public function CambioContrasena(){
		$g = new HomeController();
		$datos = array();
		array_push($datos, $_POST["id"]);
		array_push($datos, $_POST["tipo"]);
		array_push($datos, $_POST["newpass"]);
		$validado = $g->ValidarNoVacio($datos);
		if ($validado) {
			if ($_POST["tipo"]==3) {DB::table("coordinador")->where("idCoordinador",$_POST["id"])->update(array("contrasena" => $_POST["newpass"]));}
			else {DB::table("alumno")->where("idAlumno",$_POST["id"])->update(array("contrasena" => $_POST["newpass"]));}
		}
		return Redirect::to("/inicio");
	}
}