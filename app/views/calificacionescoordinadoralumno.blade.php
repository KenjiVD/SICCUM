<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<table>
			<tr>
				<td>Nivel</td>
				<td>Materia</td>
				<td>Calificacion</td>
			</tr>
			<?php foreach ($calificaiones as $key) { ?>
				<tr>
					<td>{{$key->nombrep}}</td>
					<td>{{$key->nombrem}}</td>
					<td>{{$key->calificacion}}</td>
				</tr>
			<?php } ?>
		</table>
	</div>	
</body>
</html>