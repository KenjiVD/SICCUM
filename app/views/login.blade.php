<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{(url('/'))}}/styleLogin.css">
	<title></title>
</head>
<body>
	<header>  
		<img src="img/siccum.png">
	</header>
	<div id="caja">
		<form id="login" action="{{url('/')}}/iniciarsesion" method="POST">
			<div id="login-header">Iniciar sesion</div>
			<label>Tipo de usuario</label>
			<select name="tipo">
				<option value="4">Alumno</option>
				<option value="3">Coordinador</option>
				<option value="2">Administrador</option>
				<option value="1">Administrador SICCUM</option>
			</select><br><br>
			<div class="icon"><img src="img/usuario.png"></div>
			<div class="input"><input name="usuario" placeholder="usuario" tyoe="text" required/></div><br>
			<div class="icon1"><img src="img/key.png"></div>
			<div class="input1"><input name="contrasena" placeholder="contraseña" type="password" required/></div>
			<div id="login-footer"><input type="submit" value="Entrar"/></div>
		</form>
	</div>
	<footer><p>Cento Universitario Mesoamericano Joaquin Miguel Gutierrez</p></footer>
</body>
</html>