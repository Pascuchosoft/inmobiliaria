<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>I Modificación</title>
<link rel="stylesheet" href="miestilo.css">
<script>
function valida_envia(){
	if (frm_mod.txt_nombre.value.length==0 || frm_mod.txt_ape.value.length==0 || frm_mod.txt_ci.value.length==0 || frm_mod.txt_tel.value.length==0 || frm_mod.txt_email.value.length==0 || isNaN(frm_mod.txt_tel.value) || valido_email(frm_mod.txt_email.value) == false){ 
       alert("Verifique los datos ingresados"); 
       frm_mod.txt_nombre.focus();
       return 0; 
	}else{
		alert("Muchas gracias por enviar el formulario"); 
    	frm_mod.submit();
	}				
}

function valido_email(ema){
	var e = new String();
	e = ema;
	ret = true;
	if (e.indexOf('@')==-1 || e.indexOf('.')==-1){
		ret=false;
		alert("No es una dirección de correo válida");
		frm_mod.txt_email.focus();
	}
	return ret;
}

</script>
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al índice</h4></a>
</ul>

<h1>Formulario de Modificación</h1>
<hr />
<br />
<?php
require ("conexionInmobi.php");
session_start();
$perfil = $_SESSION['ses_perfil'];
$idCone = conectarBD();
$idDue = $_GET["idDue"];
$SQL = "select nombre, apellido, idDue, CI, tel, dir, email from duenio where idDue = '$idDue'";
$res = mysqli_query( $idCone,$SQL);
if ($perfil < 3){
	$row = mysqli_fetch_array($res);
	
	$nombre = $row['nombre'];
	$apellido = $row['apellido'];
	$ci = $row['CI'];
	$tel = $row['tel'];
	$dir = $row['dir'];
	$email = $row['email'];

	echo "<form name='frm_mod' id='frm_mod' action='DMantDuenio.php' method='post'>";
	echo "<table border='1' align='left' width='33%'>";
	echo "<tr>";
	echo "<td>Nombre (*) : </td>";
	echo "<td><input type='text' name='txt_nombre' id='txt_nombre' value='$nombre'></td></tr>";
	echo "<tr>";
	echo "<td>Apellido (*) : </td>";
	echo "<td><input type='text' name='txt_ape' id='txt_ape' value='$apellido'></td></tr>";
	echo "<tr>";
	echo "<td>C.I. (*) : </td>";
	echo "<td><input type='text' name='txt_ci' id='txt_ci' value='$ci'></td></tr>";
	echo "<td>Teléfono (*) : </td>";
	echo "<td><input type='text' name='txt_tel' id='txt_tel' value='$tel'></td></tr>";
	echo "<td>Dirección : </td>";
	echo "<td><input type='text' name='txt_dir' id='txt_dir' value='$dir'></td></tr>";
	echo "<td>e-mail (*) : </td>";
	echo "<td><input type='text' name='txt_email' id='txt_email' value='$email' ></td></tr>";
	echo "</table></br>";
	echo "</br></br></br></br></br></br></br></br></br></br></br>";
	echo "<input type='text' name='txt_modo' id='txt_modo' value='2' style='visibility:hidden'><br>";
	echo "<input type='button' name='btn_Enviar' value='Enviar' onclick='valida_envia();'>";
	echo "<input type='text' name='txt_idDue' id='txt_idDue' size='1' value='$idDue' style='visibility:hidden'><br>";
	echo "</form>";
}
	
?>
</body>
</html>
