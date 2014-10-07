<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{(url('/'))}}/styleLogin.css">
	<title></title>
</head>
<body>
	<header>  
		<p>sistema</p>
		<img src="img/siccum.png">
	</header>
	<div id="caja">
		<form id="login">
			<div id="login-header">Iniciar sesion</div>
			<label>Tipo de usuario</label>
			<select>
				<option value="">Alumno</option>
				<option value="">Coordinador</option>
				<option value="">Administrador</option>
			</select><br><br>
			<div class="icon"><img src="img/usuario.png"></div>
			<div class="input"><input placeholder="usuario" tyoe="text" required/></div><br>
			<div class="icon1"><img src="img/key.png"></div>
			<div class="input1"><input  placeholder="contraseña" type="password" required/></div>
			<div id="login-footer"><input type="submit" value="Entrar"/></div>
		</form>
	</div>
	<footer><p>Cento Universitario Mesoamericano Joaquin Miguel Gutierrez</p></footer>
</body>
</html>