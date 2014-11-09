<html>
<head>
	<title></title>
	<meta charset="utf-8">
	{{HTML::style('styleIndex.css')}}
</head>
<body>
	<header><p>Sistema de Altas</p> <img src="img/logo.jpg"></header>
	<div id="contenido">
		<div id="menu">
			<li><a onclick="MostrarCoordinador()"><p>Alta Coordinador</p></a></li>
			<li><a onclick="MostrarAlumno()"><p>Ingresar Alumno</p></a></li>
			<li><a onclick="MostrarCalificaciones()"><p>Ingresar Calificación</p></a></li>
			<li><a onclick="MostrarColegiaturas()"><p>Ingresar Colegiatura</p></a></li>
			<li><a onclick="MostrarMateria()"><p>Agregar materia</p></a></li>
			<li><a id="cerrar" href="{{url('/')}}/logout"><p>Cerrar sesion</p></a></li>
		</div>
	<div id="altas">
	<div id="coordinador">
		<form action="{{url('NuevoPerfil')}}" method="POST">
			<label>Dar de alta a Coordinador</label><br><br>
			<input name="usuario" placeholder="usuario" type="text" required/><br>
			<input name="contrasena" placeholder="contraseña" type="text" required/><br>
			<div class="enviar"><input type="submit" value="Nuevo"/></div>
		</form>
	</div>
	<div id="alumno">
		<form action="{{(url('NuevoAlumno'))}}" method="post">
			<label>Dar de alta a alumno</label><br><br>
			<input placeholder="Nombre" type="text" name="nombre" required/><br>
			<input placeholder="Curp" type="text" name="curp" required/><br>
			<select name="periodo" required>
				<option>Periodo</option>
				<?php foreach ($periodo as $key) { ?>
					<option value="{{$key->idperiodo}}">{{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<select name="carrera" required>
				<option>Carrera</option>
				<?php foreach ($carrera as $key) { ?>
					<option value="{{$key->idcarrera}}">{{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<select name="grupo" required>
				<option>Grupo</option>
				<?php foreach ($grupo as $key) { ?>
					<option value="{{$key->idgrupo}}">{{$key->periodo_idperiodo}} - {{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<select name="nivel" required>
				<option>Nivel</option>
				<?php foreach ($nivel as $key) { ?>
					<option value="{{$key->idnivel}}">{{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<div class="enviar"><input type="submit" value="Enviar"/></div>
		</form>
	</div>
	<div id="calificaciones">
		<form action="{{(url('NuevaCalificacion'))}}" method="post">
			<label>Dar de alta a Calificaciones</label><br><br>
			<input placeholder="Matricula" type="text" name="matricula" required/><br>
			<input placeholder="Calificacion" type="text" name="calificacion" required/><br>
			<select name="materia" required>
				<option>Materia</option>
				<?php foreach ($materia as $key) { ?>
					<option value="{{$key->idmateria}}">{{$key->nombrec}} : {{$key->nombrem}}</option>
				<?php }?>
			</select><br>
			<select name="periodo" required>
				<option>Periodo</option>
				<?php foreach ($periodo as $key) { ?>
					<option value="{{$key->idperiodo}}">{{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<select name="carrera" required>
				<option>Carrera</option>
				<?php foreach ($carrera as $key) { ?>
					<option value="{{$key->idcarrera}}">{{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<select name="grupo" required>
				<option>Grupo</option>
				<?php foreach ($grupo as $key) { ?>
					<option value="{{$key->idgrupo}}">{{$key->periodo_idperiodo}} - {{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<select name="nivel" required>
				<option>Nivel</option>
				<?php foreach ($nivel as $key) { ?>
					<option value="{{$key->idnivel}}">{{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<div class="enviar"><input type="submit" value="Enviar"/></div>
		</form>
	</div>
	<div id="colegiaturas">
		<form action="{{(url('NuevaColegiatura'))}}" method="post">
			<label>Dar de alta a Colegituaras</label><br><br>
			<input placeholder="Matricula" type="text" name="matricula" required/><br>
			<select name="periodo" required>
				<option>Periodo</option>
				<?php foreach ($periodo as $key) { ?>
					<option value="{{$key->idperiodo}}">{{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<input type="date" name="mes" />
			<div class="enviar"><input type="submit" value="Enviar"/></div>
		</form>
	</div>
	<div id="materia">
		<form action="{{(url('NuevaMateria'))}}" method="post">
			<label>Dar de alta a Materia</label><br><br>
			<input placeholder="Nombre de la materia" type="text" name="nombre" required/><br>
			<select name="periodo" required>
				<option>Periodo</option>
				<?php foreach ($periodo as $key) { ?>
					<option value="{{$key->idperiodo}}">{{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<select name="carrera" required>
				<option>Carrera</option>
				<?php foreach ($carrera as $key) { ?>
					<option value="{{$key->idcarrera}}">{{$key->nombre}}</option>
				<?php }?>
			</select><br>
			<div class="enviar"><input type="submit" value="Enviar"/></div>
		</form>
	</div>
	</div>
	</div>
	<footer>
		<p>Cento Universitario Mesoamericano Joaquin Miguel Gutierrez</p>
		{{ HTML::script('scriptIndex.js')}}</script>
	</footer>
</body>
</html>