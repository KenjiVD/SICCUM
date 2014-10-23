<html>
<head>
	<title>Administrador</title>
	<link rel="stylesheet" type="text/css" href="{{(url('/'))}}/styleLogin.css">
	<meta charset="utf-8">
</head>
<body>
	<header>
		<img src="img/siccum.png">
		<div id="conten-menu">
			<ul id="menu">
				<li><a href="">Inicio</a></li>
	            <li><a href="">Administracion de Perfiles</a></li>
	        </ul>
		</div>
	</header>
	<div id="name"><h3>Administador</h3></div>
	<div id="content-table">
		<div id="solicitudes">
			<h3>Administrador de Perfiles</h3>
			<table id="table" border="1">
					<th>Nombre de perfil</th>
					<th>Accion para Perfil</th>
				</tr>
				<tr>
					<td class="negritas">Coordinadores Activos</td>
					<td><img src="img/tacha.png">Dar de baja</td>
				</tr>
				<?php
					foreach ($coordinadoresactivos as $key) {
						?>
						<tr>
							<td>{{$key->nombre}}</td>
							<td><a href="{{url('/')}}/Baja/3/{{$key->idCoordinador}}"><img src="img/tacha.png"></a></td>
						</tr>
						<?php
					}
					?>
				<tr>
					<td class="negritas">Alumnos Activos</td>
					<td><img src="img/tacha.png">Dar de baja</td>
				</tr>
				<?php
					foreach ($alumnosactivos as $key) {
						?>
						<tr>
							<td>{{$key->nombre}}</td>
							<td><a href="{{url('/')}}/Baja/4/{{$key->idAlumno}}"><img src="img/tacha.png"></a></td>
						</tr>
						<?php
					}
					?>
				<tr>
					<td class="negritas">Coordinadores Inactivos</td>
					<td><img src="img/palomita.png">Dar de alta</td>
				</tr>
				<?php
					foreach ($coordinadoresinactivos as $key) {
						?>
						<tr>
							<td>{{$key->nombre}}</td>
							<td><a href="{{url('/')}}/Alta/3/{{$key->idCoordinador}}"><img src="img/palomita.png"></a></td>
						</tr>
						<?php
					}
					?>
				<tr>
					<td class="negritas">Alumnos Inactivos</td>
					<td><img src="img/palomita.png">Dar de alta</td>
				</tr>
				<?php
					foreach ($alumnosinactivos as $key) {
						?>
						<tr>
							<td>{{$key->nombre}}</td>
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