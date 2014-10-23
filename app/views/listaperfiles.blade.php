<html>
<head>
	<title>Lista de perfiles</title>
</head>
<body>
	<div>
		<table>
			<?php
			foreach ($coordinadoresactivos as $key) {
				?>
				<tr>
					<td>{{$key->nombre}}</td>
					<td><a href="{{url('/')}}/Baja/3/{{$key->idCoordinador}}">Baja</a></td>
				</tr>
				<?php
			}
			?>
		</table>
		<table>
			<?php
			foreach ($alumnosactivos as $key) {
				?>
				<tr>
					<td>{{$key->nombre}}</td>
					<td><a href="{{url('/')}}/Baja/4/{{$key->idAlumno}}">Baja</a></td>
				</tr>
				<?php
			}
			?>
		</table>
		<table>
			<?php
			foreach ($coordinadoresinactivos as $key) {
				?>
				<tr>
					<td>{{$key->nombre}}</td>
					<td><a href="{{url('/')}}/Alta/3/{{$key->idCoordinador}}">Alta</a></td>
				</tr>
				<?php
			}
			?>
		</table>
		<table>
			<?php
			foreach ($alumnosinactivos as $key) {
				?>
				<tr>
					<td>{{$key->nombre}}</td>
					<td><a href="{{url('/')}}/Alta/4/{{$key->idAlumno}}">Alta</a></td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
</body>
</html>