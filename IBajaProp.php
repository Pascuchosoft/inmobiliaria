<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>I Baja de Propiedades</title>
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
</ul>

<h1>Eliminación de Propiedad</h1>
<hr />
<br />

<?php

include ("conexionInmobi.php");
session_start();
$perfil = $_SESSION['ses_perfil'];
$idCone = conectarBD();
$idProp = $_GET["idProp"];
	$SQL="Select d.nombre, d.apellido, p.dir, p.precio, z.barrio, t.tipo, o.operacion, p.dormitorios
		  From duenio d, propiedades p, zona z, operacion o, tipo t
		  where p.idDue = d.idDue and p.idZona = z.idZona and p.idTipo = t.idTipo and p.idOpera = o.idOpera and p.idProp = '$idProp'";
$res = mysqli_query($idCone,$SQL);

if ($perfil < 3){
	$row = mysqli_fetch_array($res);
	$nombre = $row['nombre'];
	$apellido = $row['apellido'];
	$dir = $row['dir'];
	$precio = $row['precio'];
	$tipo = $row['tipo'];
	$operacion = $row['operacion'];
	$barrio = $row['barrio'];
	$dormitorios = $row['dormitorios'];

	echo "<form name='frm_baja' id='frm_baja' action='DMantProp.php' method='post'>";
	echo "<table border='1' align='left' width='50%'>";
	echo "<tr><td>";
	echo "<tr><td>Nombre : </td><td><input type='text' name='txt_nombre' id='txt_nombre' value='$nombre'></td></tr>";
	echo "<tr><td>Apellido : </td><td><input type='text' name='txt_ape' id='txt_ape' value='$apellido'></td></tr>";
	echo "<tr><td>Dir Inmuble : </td><td><input type='text' name='txt_dir' id='txt_dir' value='$dir'></td></tr>";
	echo "<tr><td>Precio : </td><td><input type='text' name='txt_precio' id='txt_precio' value='$precio'></td></tr>";
	echo "<tr><td>Tipo : </td><td><input type='text' name='txt_tipo' id='txt_tipo' value='$tipo'></td></tr>";
	echo "<tr><td>Operación : </td><td><input type='text' name='txt_operacion' id='txt_operacion' value='$operacion'></td></tr>";
	echo "<tr><td>Barrio : </td><td><input type='text' name='txt_barrio' id='txt_barrio' value='$barrio'></td></tr>";
	echo "<tr><td>Dormitorios : </td><td><input type='text' name='txt_dormi' id='txt_dormi' value='$dormitorios'></td></tr>";
	echo "<input type='text' name='txt_modo' id='txt_modo' value='3' style='visibility:hidden'></table>";
	echo "<input type='text' name='txt_idProp' id='txt_idProp' value='$idProp' style='visibility:hidden'></table>";
	echo "</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>";
	echo "<input type='button' name='btn_Confirmnar' value='Eliminar' onclick='confirmaElimina();'>";
	echo "</form>";
}
?>
</body>
</html>
