<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<form method="post" action="{{url('/')}}/buscaralumno">
			<label>Buscar: </label><input type="text" name="texto" placeholder="Acepta matricula, nombre o apellido" required/><input type="submit" value="buscar" />
		</form>
	</div>
	<div>
		<?php if (isset($alumnos) && $alumnos != null) { ?>
			<table>
				<tr>
					<td>Matricula</td>
					<td>Nombre</td>
					<td>Calificaciones</td>
					<td>Adeudos</td>
				</tr>
				<?php foreach ($alumnos as $key) { ?>
					<tr>
						<td>{{$key->matriculaa}}</td>
						<td>{{$key->nombre}}</td>
						<td><a href="{{url('/')}}/calificaciones/{{$key->idAlumno}}">Ver</a></td>
						<td><a href="{{url('/')}}/colegiaturas/{{$key->idAlumno}}">Ver</a></td>
					</tr>
				<?php } ?>
			</table>
		<?php } ?>
	</div>
</body>
</html>