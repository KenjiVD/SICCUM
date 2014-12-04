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
		<div id="asignar">
			<h3>Asignar Coordinador a Alumnos</h3>
			<table id="table" border="1">
				<tr>
					<th class="negritas">Alumno</th>
					<th class="negritas">Coordinador</th>
					<th>Asignar</th>
				</tr>
				<?php foreach ($alumnos as $key) { ?>
					<form action="{{url('/')}}/Asignar" method="post">
						<tr>
							<th class="listaAlumnos"><input name="id" type="hidden" value="{{$key->idAlumno}}"/>{{$key->nombre}}</th>
							<th class="listaAlumnos"><select name="coordinador" required>
									<option value="">Coordinador</option>
									<?php foreach ($coordinadores as $key) { ?>
										<option value="{{$key->idCoordinador}}">{{$key->idCoordinador}} -> {{$key->nombre}}</option>
									<?php }?>
								</select><br></th>
							<th class="listaAlumnos"><input value="Enviar" type="image" src="img/palomita.png">Asignar</th>
						</tr>
					</form>
				<?php } ?>
			</table>
		</div>
	</div>
	<footer></footer>
</body>
</html>