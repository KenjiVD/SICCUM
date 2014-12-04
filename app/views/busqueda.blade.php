<html>
<head>
    <?php $g = new HomeController(); ?>
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
    <div id="name"><h3>Coordinador:  {{Session::get("nombre")}}</h3></div>
    <div id="content-table">
    	<div id ="formularios">
			<h3>Busqueda</h3><br>
				<form method="post" action="{{url('/')}}/buscaralumno">
				<label>Buscar: </label><input type="text" name="texto" placeholder="Acepta matricula, nombre o apellido" required/><input type="submit" value="buscar" />
			</form>
            <?php if (isset($alumnos) && $alumnos != null) { ?>
			<table id="table" border="1">
				<tr>
					<th>Matricula</th>
					<th>Nombre</th>
                    <th>Estado</th>
					<th>Calificaciones</th>
					<th>Adeudos</th>
				</tr>
                <?php if (isset($alumnosgraduados) && $alumnosgraduados != null) {
                foreach ($alumnosgraduados as $key) { ?>
                    <tr>
                        <td>{{$key->matriculaa}}</td>
                        <td>{{$key->nombre}}</td>
                        <td>{{$g->EstadoAlumno($key->estadoperfil)}}</td>
                        <td><a href="{{url('/')}}/calificaciones/{{$key->idAlumno}}">Ver</a></td>
                        <td><a href="{{url('/')}}/colegiaturas/{{$key->idAlumno}}">Ver</a></td>
                    </tr>
                <?php } 
                }
                foreach ($alumnos as $key) { ?>
					<tr>
						<td>{{$key->matriculaa}}</td>
						<td>{{$key->nombre}}</td>
                        <td>{{$g->EstadoAlumno($key->estadoperfil)}}</td>
						<td><a href="{{url('/')}}/calificaciones/{{$key->idAlumno}}">Ver</a></td>
						<td><a href="{{url('/')}}/colegiaturas/{{$key->idAlumno}}">Ver</a></td>
					</tr>
				<?php } ?>
			</table>
		<?php } ?>
        </div>
    </div>
    <footer>
    	<script type="text/javascript" src="{{url('/')}}/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="{{url('/')}}/indexAjax.js"></script>
    </footer>
</body>
</html>