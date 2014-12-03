<div id="permisos">
	<h2>Calificaciones</h2>
	<table id="table" border="1">
		<tr>
			<th>Nivel</th>
			<th>Periodo</th>
			<th>Materia</th>
			<th>Calificacion</th>
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