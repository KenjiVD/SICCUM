<html>
<head>
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="{{(url('/'))}}/styleLogin.css">
	<meta charset="utf-8">
</head>
<body>
	<header>
		<img src="{{url('/')}}/img/siccum.png">
		<div id="conten-menu">
			<ul id="menu">
				<li><a href="{{url('/')}}/inicio">Inicio</a></li>
				<li><a href="{{url('/')}}/AsignarCoordinador">Administracion de Perfiles</a></li>
	            <li><a href="{{url('/')}}/logout">Cerrar sesion</a></li>
	        </ul>
		</div>
	</header>
	<div id="name"><h3>Administador</h3></div>
	<div id="content-table">
		<div id="perfiles">
			<h3>Administrador de Perfiles</h3>
			<table id="table" border="1">
				<tr>
					<th class="negritas">Matricula</th>
					<th class="negritas">Coordinadores Activos</th>
					<th class="negritas">Cambio de contraseña</th>
					<th class="negritas">Dar de baja</th>
				</tr>
				<?php
					foreach ($coordinadoresactivos as $key) {
						?>
						<tr>
							<td>{{$key->matriculac}}</td>
							<td>{{$key->nombre}}</td>
							<td><a href="{{url('/')}}/CambioContrasena/3/{{$key->idCoordinador}}"><img width="20" src="img/editar.png"></a></td>
							<td><a href="{{url('/')}}/Baja/3/{{$key->idCoordinador}}"><img src="img/tacha.png"></a></td>
						</tr>
						<?php
					}
					?>
			</table>
			<table id="table" border="1">
				<tr>
					<th class="negritas">Matricula</th>
					<th class="negritas">Alumnos Activos</th>
					<th class="negritas">Cambio de contraseña</th>
					<th class="negritas">Dar de baja</th>
					<th class="negritas">Dar estatus de graduado</th>
				</tr>
				<?php
					foreach ($alumnosactivos as $key) {
						?>
						<tr>
							<td>{{$key->matriculaa}}</td>
							<td>{{$key->nombre}}</td>
							<td><a href="{{url('/')}}/CambioContrasena/4/{{$key->idAlumno}}"><img width="20" src="img/editar.png"></a></td>
							<td><a href="{{url('/')}}/Baja/4/{{$key->idAlumno}}"><img src="img/tacha.png"></a></td>
							<td><a href="{{url('/')}}/Graduado/{{$key->idAlumno}}"><img src="img/palomita.png"></a></td>
						</tr>
						<?php
					}
					?>
			</table>
			<table id="table" border="1">
				<tr>
					<th class="negritas">Matricula</th>
					<th class="negritas">Coordinadores Inactivos</th>
					<th class="negritas">Cambio de contraseña</th>
					<th class="negritas">Dar de alta</th>
				</tr>
				<?php
					foreach ($coordinadoresinactivos as $key) {
						?>
						<tr>
							<td>{{$key->matriculac}}</td>
							<td>{{$key->nombre}}</td>
							<td><a href="{{url('/')}}/CambioContrasena/3/{{$key->idCoordinador}}"><img width="20" src="img/editar.png"></a></td>
							<td><a href="{{url('/')}}/Alta/3/{{$key->idCoordinador}}"><img src="img/palomita.png"></a></td>
						</tr>
						<?php
					}
					?>
			</table>
			<table id="table" border="1">
				<tr>
					<th class="negritas">Matricula</th>
					<th class="negritas">Alumnos Inactivos</th>
					<th class="negritas">Cambio de contraseña</th>
					<th class="negritas">Dar de alta</th>
				</tr>
				<?php
					foreach ($alumnosinactivos as $key) {
						?>
						<tr>
							<td>{{$key->matriculaa}}</td>
							<td>{{$key->nombre}}</td>
							<td><a href="{{url('/')}}/CambioContrasena/4/{{$key->idAlumno}}"><img width="20" src="img/editar.png"></a></td>
							<td><a href="{{url('/')}}/Alta/4/{{$key->idAlumno}}"><img src="img/palomita.png"></a></td>
						</tr>
						<?php
					}
					?>
			</table>
		</div>
	</div>
	<footer></footer>
</body>
</html>