<html>
<head>
	<title>Coordinador</title>
	<link rel="stylesheet" type="text/css" href="{{(url('/'))}}/styleLogin.css">
</head>
<body>
	<header>
		<img src="img/siccum.png">
		<div id="conten-menu">
		<ul id="menu">
            <li><a href="index.html">Solicitudes de Permiso</a></li>
            <li><a href="empresa.html">Consultar Calificaciones</a></li>
            <li><a href="servicios.html">Consultar deudas de Alumnos</a></li>
        </ul>
	</div>
	</header>
	<div id="name"><h1>Coordinador</h1></div>
	<div id="content-table">
		<table id="table" border="1">
			<td>Nombre del Alumno</td>
			<td>Fecha</td>
			<td>Motivo</td>
			<td>Archivo Evidencia</td>
			<td>Aprobado</td>
			<td>Desaprobado</td>
            <?php 
            foreach ($permisos as $key) { ?> 
            <tr>
                <td>{{$key->nombre}}</td>
                <td>{{$key->fechaSolicitud}}</td>
                <td>{{$key->descripcion}}</td>
                <td><image src="icono.jpg" href="{{url('/')}}/{{$key->descripcion}}" download></td>
                <td></td>
                <td></td>
            </tr>
       <?php } ?>
                        
		</table>
	</div>
</body>
<footer></footer>