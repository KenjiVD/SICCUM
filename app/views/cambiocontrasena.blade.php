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
	            <li><a href="{{url('/')}}/logout">Cerrar sesion</a></li>
	        </ul>
		</div>
	</header>
	<div id="name"><h3>Cambio de Contraseña para {{$nombre}}</h3></div>
	<div id="content-table">
		<div id ="formulario">
			<form method="POST" action="{{url('CambioContrasena')}}">
				<input type="hidden" name="tipo" value="{{$tipo}}" required/>
				<input type="hidden" name="id" value="{{$id}}" required/>
				<input size="70" placeholder="Nueva Contraseña para {{$nombre}}" type="password" name="newpass" required/><br><br>
				<input type="submit" value="Enviar" /><br><br>
			</form>
		</div>
	</div>
	<footer></footer>
</body>
</html>