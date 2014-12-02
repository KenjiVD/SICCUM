<html>
<head>
	<title>Alumno</title>
	<link rel="stylesheet" type="text/css" href="{{(url('/'))}}/styleLogin.css">
</head>
<body>
	<header>
		<img src="{{url('/')}}/img/siccum.png">
		<div id="conten-menu">
		<ul id="menu">
            <li><a href="">Permisos Solicitados</a></li>
            <li><a href="{{(url('/'))}}/calificaciones">Consultar Calificaciones</a></li>
            <li><a href="{{(url('/'))}}/colegiaturas">Consultar Colegiaturar - Adeudos: <span id="adeudos">0</span></a></li>
            <li><a href="{{(url('/'))}}/logout">Cerrar Sesion</a></li>
        </ul>
	</div>
	</header>
	<div id="name"><h3>Alumno:   {{Session::get("nombre")}}</h3></div>
	<div id="content-table">
		<div id="permisos">
			<h2>Permisos Solicitados</h2>
			<table id="table" border="1">
				<tr>
					<td>Fecha</td>
					<td>Estatus</td>
					<td>Archivo</td>
				</tr>
				<?php
				$g = new HomeController();
				foreach ($permisos as $key) { ?>
					<tr>
						<td>{{$g->FechaNormal($key->fechaSolicitud)}}</td>
						<td>{{$g->Estado($key->estado)}}</td>
						<td><a target="_blank" href="{{url('/')}}/{{$key->URL}}"><img src="img/descargar.png" width"10px" height"20px"></a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
		<div id ="formulario">
			<h3>Nueva solicitud</h3><br>
			<form method="POST" action="{{url('NuevoPermiso')}}" enctype="multipart/form-data">
				<textarea placeholder="Escriba motivo de permiso" name="address"cols="30" rows="4"></textarea><br><br>
				<input name="uploadedfile" type="file" accept="image/jpg,image/jpeg,image/png,application/pdf" required/><br><br>
				<label>Inicio del permiso</label><input placeholder="yyyy-mm-dd" type="date" name="inicio" required/><br><br>
				<label>Fin del permiso</label><input placeholder="yyyy-mm-dd" type="date" name="fin" required/><br><br>
				<input type="submit" value="Enviar" /><br><br>
			</form>
		</div>
	</div>
	<footer>
		<script type="text/javascript" src="{{url('/')}}/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="{{url('/')}}/indexAjax.js"></script>
	</footer>
</body>
</html>