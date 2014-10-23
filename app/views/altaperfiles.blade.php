<html>
<head>
	<title>Alta de perfiles</title>
</head>
<body>
<div>
	<form action="{{url('NuevoPerfil')}}" method="POST">
		<table>
			<tr>
				<td>Nombre: </td>
				<td><input name="usuario" placeholder="usuario" type="text" required/></td>
			</tr>
			<tr>
				<td>Matricula: </td>
				<td><input name="contrasena" placeholder="contraseña" type="text" required/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Nuevo"/></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>