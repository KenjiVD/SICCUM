<html>
<head>
    <title>Coordinador</title>
    <link rel="stylesheet" type="text/css" href="{{(url('/'))}}/styleLogin.css">
    <meta charset="utf-8">
</head>
<body>
    <header>
        <img src="{{url('/')}}/img/siccum.png">
        <div id="conten-menu">
        <ul id="menu">
            <li><a href="{{url('/')}}/inicio">Inicio</a></li>
            <li><a href="{{url('/')}}/buscaralumno">Buscar alumno</a></li>
            <li><a href="{{url('/')}}/logout">Cerrar sesion</a></li>
        </ul>
    </div>
    </header>
    <div id="name"><h3>Coordinador:  {{Session::get("nombre")}}</h3></div>
    <div id="content-table">
        <div id="solicitudes">
            <h3>Colegiaturas de: {{$alumno->nombre}}</h3>
            <h3>Numero de colegiaturas que faltan por pagar:   {{$adeudo}}</h3>
            <table id="table" border="1">
                    <tr>
						<td>Fechas de pagos de colegiaturas realizadas</td>
					</tr>
					<?php foreach ($colegiaturas as $key) { ?>
						<tr>
							<td>{{$key->mes}}</td>
						</tr>
					<?php } ?>
            </table>
        </div>
    </div>
    <footer></footer>
</body>
</html>