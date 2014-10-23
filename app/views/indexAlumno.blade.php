<html>
<head>
	<title>Alumno</title>
	<link rel="stylesheet" type="text/css" href="{{(url('/'))}}/styleLogin.css">
</head>
<body>
	<header>
		<img src="img/siccum.png">
		<div id="conten-menu">
		<ul id="menu">
            <li><a href="">Permisos Solicitados</a></li>
            <li><a href="{{(url('/'))}}/logout">Cerrar Sesion</a></li>
        </ul>
	</div>
	</header>
	<div id="name"><h3>Alumno:   {{Session::get("nombre")}}</h3></div>
	<div id="content-table">
		<div id="permisos">
			<table id="table" border="1">
				<tr>
					<td>Fecha</td>
					<td>Estatus</td>
					<td>Archivo</td>
				</tr>
				<tr>
					<td>08/12/2014</td>
					<td>Aprovado</td>
					<td>permiso</td>
				</tr>
				<?php
				$g = new HomeController();
				foreach ($permisos as $key) { ?>
					<td>{{$g->FechaNormal($key->fechaSolicitud)}}</td>
					<td>{{$g->Estado($key->estado)}}</td>
					<td><a target="_blank" href="{{url('/')}}/{{$key->URL}}">permiso</a></td>
				<?php } ?>
			</table>
		</div>
		<input type="button" name="nombre" value="Nueva Solicitud"><br>
		<form method="POST" action="{{url('NuevoPermiso')}}" enctype="multipart/form-data">
			<textarea placeholder="Escriba motivo de permiso" name="address"cols="30" rows="4"></textarea><br>
			<input name="uploadedfile" type="file" accept="image/jpg,image/jpeg,image/png,application/pdf" required/><br>
			<label>Inicio del permiso</label><input placeholder="yyyy-mm-dd" type="date" name="inicio" required/><br>
			<label>Fin del permiso</label><input placeholder="yyyy-mm-dd" type="date" name="fin" required/><br>
			<input type="submit" value="Enviar" /><br>
		</form>
	</div>
	<footer></footer>
</body>
</html>