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
            <li><a target="_blank" href="{{url('/')}}/reporte">Reporte</a></li>
            <li id="numpermisos">
                <ul class="nav">
                    <li><a href=''>Notificaciones(0)</a>
                        <ul>
                            <li><a href=''>Permisos(0)</a></li><br>
                            <li><a href=''>Alumnos Criticos(0)</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="{{url('/')}}/logout">Cerrar sesion</a></li>
        </ul>
    </div>
    </header>
    <div id="name">
        <h3>Coordinador:  {{Session::get("nombre")}}</h3><br>
        <h3>Calificaciones de: {{$alumno->nombre}}</h3>
    </div>
    <div id="filtro">
        <label>Filtro por nivel</label>
        <select id="nivel"><?php foreach ($niveles as $key) { ?>
            <option value="{{$key->idnivel}}">{{$key->nombre}}</option>
        <?php }?></select>
        <input type="hidden" id="idalumno" value="{{$alumno->idAlumno}}" />
        <input type="button" id="EnvioC" value="Aplicar"/>
    </div>
    <div id="content-table">
        <div id="coordinadorcal">
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