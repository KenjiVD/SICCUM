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
					$usuariosesion = DB::table("alumno")->where("nombre",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->where("estadoperfil", 1)->first();
					if(isset($usuariosesion) && $usuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $usuariosesion->idAlumno);Session::put("nombre", $usuariosesion->nombre);}
					break;
				case 3:
					$usuariosesion = DB::table("coordinador")->where("nombre",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->where("estadoperfil", 1)->first();
					if(isset($usuariosesion) && $usuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $usuariosesion->idCoordinador);Session::put("nombre", $usuariosesion->nombre);}
					break;
				case 2:
					$usuariosesion = DB::table("administrador")->where("nombre",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->first();
					if(isset($usuariosesion) && $usuariosesion !=null){Session::put("tipo",$_POST["tipo"]);Session::put("usuario", $usuariosesion->idadministrador);Session::put("nombre", $usuariosesion->nombre);}
					break;
				case 1:
					$usuariosesion = DB::table("administradorsiccum")->where("nombre",$_POST["usuario"])->where("contrasena", $_POST["contrasena"])->first();
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
			})->orderBy('idAlumno', 'asc')->get();
			return View::make("busqueda")->with("alumnos",$alumnos);
		}else{
			return Redirect::to("/buscaralumno");
		}
	}
}