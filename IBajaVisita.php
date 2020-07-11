<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>I Baja de Visita</title>
<link rel="stylesheet" href="miestilo.css">

<script>
function confirmaElimina(){
	var resp;
	resp = prompt("Desea eliminar este Usuario ? : (s/n) ","");
	if (resp=="s" || resp=="S"){
		alert("Muchas gracias por enviar el formulario"); 
    	frm_baja.submit();
	}
}
</script>
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al índice</h4></a>
	<li><a href='paginado.php' align='center'><h4>volver al listado</h4></a>
</ul>

<h1>eliminación de Visita</h1>
<hr />
<br />

<?php

require ("conexionInmobi.php");
session_start();
$perfil = $_SESSION['ses_perfil'];
$idCone = conexion();
	$SQL="Select u.Nombre, u.Apellido, u.tel, p.dir, e.nombre, v.fecha, v.hora, v.idCli, v.idVisita
		  From usuarios u, propiedades p, estado e, visita v
		  where u.idUsu = v.idCli and p.idProp = v.idProp and e.idEstado = v.idEstado and v.idVisita = '$idVisita'";
$res = mysql_query($SQL, $idCone);

if ($perfil < 3){
	$row = mysql_fetch_array($res);
	$Nombre = $row['Nombre'];
	$Apellido = $row['Apellido'];
	$dir = $row['dir'];
	$tel = $row['tel'];
	$fecha = $row['fecha'];
	$hora = $row['hora'];
	$estado = $row['nombre'];
	
	echo "<form name='frm_baja' id='frm_baja' action='DMantVisita.php' method='post'>";
	echo "<table border='1' align='left' width='50%'>";
	echo "<tr><td>";
	echo "<tr><td>Nombre : </td><td><input type='text' name='txt_nombre' id='txt_nombre' value='$Nombre'></td></tr>";
	echo "<tr><td>Apellido : </td><td><input type='text' name='txt_ape' id='txt_ape' value='$Apellido'></td></tr>";
	echo "<tr><td>Dir Inmuble : </td><td><input type='text' name='txt_dir' id='txt_dir' value='$dir'></td></tr>";
	echo "<tr><td>Fecha : </td><td><input type='text' name='txt_fecha' id='txt_fecha' value='$fecha'></td></tr>";
	echo "<tr><td>Hora : </td><td><input type='text' name='txt_hora' id='txt_hora' value='$hora'></td></tr>";
	echo "<tr><td>Estado : </td><td><input type='text' name='txt_estado' id='txt_estado' value='$estado'></td></tr>";
	echo "<input type='text' name='txt_modo' id='txt_modo' value='2' style='visibility:hidden'></table>";
	echo "<input type='text' name='txt_idVisita' id='txt_idVisita' value='$idVisita' style='visibility:hidden'></table>";
	echo "</br></br></br></br></br></br></br></br></br></br></br></br>";
	echo "<input type='button' name='btn_Confirmnar' value='Eliminar' onclick='confirmaElimina();'>";
	echo "</form>";
}
?>
</body>
</html>
