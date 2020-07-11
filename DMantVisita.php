<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dominio de Asignación de Visitas</title>
<link rel="stylesheet" href="miestilo.css">

</head>

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h3>volver al índice</h3></a>
</ul>

<h1>Mantenimiento de Visitas</h1>
<hr />
<br />
<?php
require ("conexionInmobi.php");
session_start();

$idCone = conectarBD();

if(! isset($modo)){
	$modo = $_POST['txt_modo'];
}

if ($modo == 1){ // asignación de la Visita
	$vendedor = $_POST['txt_vendedor'];
	$idCli = $_POST['txt_idCli'];
	$idVisita = $_POST['txt_idVisita'];
	$estado = $_POST['lst_estado'];
	$fecha = $_POST['txt_fecha'];
	$hora = $_POST['txt_hora'];
	$idVende = $_POST['txt_idVende'];
		$SQL_M = "update visita set fecha = '$fecha', hora = '$hora', idEstado = '$estado', idVende = '$idVende', vendedor = '$vendedor' where idVisita = '$idVisita'";
		$SQL_todas = "update visita set idVende = '$idVende' where idCli = '$idCli' and fecha = '$fecha'";
		if(mysqli_query ($idCone,$SQL_M) && mysqli_query($idCone,$SQL_todas)){
			echo "<P><H2> La Asignación se ha realizado con exito </P>";
		}else{
				echo "<P>Se ha producido un error en la asignación de la visita</P>";
		}
}elseif($modo == 2){ // eliminacín de la visita
	$SQL_B = "delete from visita where idVisita = '$idVisita'";
		if(mysqli_query ($idCone,$SQL_B)){
			echo "<P><H2> La visita se ha eliminado con exito para el inmueble ubicado en $dir</P>";
		}else{
				echo "<P>Se ha producido un error al eliminar la visita</P>";
		}
}
?>
</body>
</html>
