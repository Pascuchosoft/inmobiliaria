<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>visitas.php</title>
<link rel="stylesheet" href="miestilo.css">

</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al Indice</h4></a>
</ul>
<?php

include ("conexionInmobi.php");
$idCone = conectarBD();

$idCli = $_GET["idCli"];
$idProp = $_GET["idProp"];

$SQL = "insert into visita (idVisita, idCli, idProp, idEstado) values (null, '$idCli', '$idProp', 1)";

		if (mysqli_query ($idCone,$SQL)){?>
			<script>alert("La visita a sido registrada. Un vendedor se comunicará a la brevedad con Ud.");</script>
			<center><h3><a href="paginado.php">para volver al listado siga este link</a></h3></center>
<?php
		}else{
				echo "<P>Visita pendiente, espere la comunicación de un vendedor, gracias</P>";
		}
?>
</body>
</html>
