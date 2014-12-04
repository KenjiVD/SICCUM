<html>
<head>
	<title>Alumno</title>
	<link rel="stylesheet" type="text/css" href="{{(url('/'))}}/styleLogin.css">
</head>
<body>
	<header>
		<img src="{{url('/')}}/img/siccum.png">
		<div id="conten-menu">
		<ul id="menu">
            <li><a href="{{url('/')}}/inicio">Permisos Solicitados</a></li>
            <li><a href="{{(url('/'))}}/calificaciones">Consultar Calificaciones</a></li>
            <li><a href="{{(url('/'))}}/colegiaturas">Consultar Colegiaturar<span id="adeudos"></span></a></li>
            <li><a href="{{(url('/'))}}/logout">Cerrar Sesion</a></li>
        </ul>
	</div>
	</header>
	<div id="name"><h3>Alumno:   {{Session::get("nombre")}}</h3></div>
	<div id="filtro">
		<label>Filtro por nivel</label>
        <select id="nivel"><?php foreach ($niveles as $key) { ?>
            <option value="{{$key->idnivel}}">{{$key->nombre}}</option>
        <?php }?></select>
        <input type="button" id="Envio" value="Aplicar"/>
    </div>
	<div id="content-table">
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
	</div>
	<footer>
		<script type="text/javascript" src="{{url('/')}}/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="{{url('/')}}/indexAjax.js"></script>
	</footer>
</body>
</html>