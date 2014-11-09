<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<h3>Numero de colegiaturas que faltan por pagar</h3><br>
		<h1>{{$adeudo}}</h1>
	</div>
	<div>
		<table>
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
</body>
</html>