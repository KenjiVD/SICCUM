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
            <h3>Solicitud de Permiso</h3>
            <table id="table" border="1">
                    <th>Nombre del Alumno</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Archivo Evidencia</th>
                    <th>Aprobado</th>
                    <th>Desaprobado</th>
                </tr>
                <?php 
            foreach ($permisos as $key) { ?> 
                <tr>
                    <td>{{$key->nombre}}</td>
                    <td>{{$key->fechaSolicitud}}</td>
                    <td>{{$key->descripcion}}</td>
                    <td><a target="_blank" href="{{url('/')}}/{{$key->URL}}"><img src="{{url('/')}}/img/descargar.png" width"10px" height"20px"></a></td>
                    <td><a href="{{url('/')}}/coordinador/permiso/1/{{$key->idpermiso}}"><img src="{{url('/')}}/img/palomita.png"></a></td>
                    <td><a href="{{url('/')}}/coordinador/permiso/2/{{$key->idpermiso}}"><img src="{{url('/')}}/img/tacha.png"></a></td>
                </tr>
           <?php } ?>
            </table>
        </div>
    </div>
    <footer></footer>
</body>
</html>