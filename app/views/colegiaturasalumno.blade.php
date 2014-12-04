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
	<div id="content-table">
		<div id="permisos">
			<h3>Colegiaturas</h3>
			<h3>Numero de colegiaturas que faltan por pagar:   {{$adeudo}}</h3>
			<table id="table" border="1">
				<tr>
					<th>Fechas de pagos de colegiaturas realizadas</th>
				</tr>
				<?php foreach ($colegiaturas as $key) { ?>
					<tr>
						<td>{{$key->mes}}</td>
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