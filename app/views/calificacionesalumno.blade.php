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
            <li><a href="{{url('/')}}/inicio">Permisos Solicitados</a></li>
            <li><a href="{{(url('/'))}}/calificaciones">Consultar Calificaciones</a></li>
            <li><a href="{{(url('/'))}}/colegiaturas">Consultar Adeudos</a></li>
            <li><a href="{{(url('/'))}}/logout">Cerrar Sesion</a></li>
        </ul>
	</div>
	</header>
	<div id="name"><h3>Alumno:   {{Session::get("nombre")}}</h3></div>
	<div id="content-table">
		<div id="permisos">
			<h2>Calificaciones</h2>
			<table id="table" border="1">
				<tr>
					<td>Nivel</td>
					<td>Periodo</td>
					<td>Materia</td>
					<td>Calificacion</td>
				</tr>
				<?php foreach ($calificaiones as $key) { ?>
					<tr>
						<td>{{$key->nombren}}</td>
						<td>{{$key->nombrep}}</td>
						<td>{{$key->nombrem}}</td>
						<td>{{$key->calificacion}}</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<footer></footer>
</body>
</html>