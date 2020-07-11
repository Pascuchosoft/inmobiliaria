<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>I Modificación</title>
<link rel="stylesheet" href="miestilo.css">
<script>
function valida_envia(){
	if (frm_mod.txt_nomusu.value.length==0 || frm_mod.txt_psw.value.length==0 || frm_mod.txt_perfil.value.length==0 || valido_email(frm_mod.txt_email.value) == false || valido_ci(frm_mod.txt_ci.value) == false){ 
       alert("Verifique los datos ingresados"); 
       frm_mod.txt_nombre.focus();
       return 0; 
	}else if (frm_mod.txt_perfil.value<1 || frm_mod.txt_perfil.value>4){
		alert("Perfil inexistente");
       frm_mod.txt_perfil.focus();
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

function valido_ci(ci){
	var e = new String();
	e = ci;
	ret = true;
	if (e.indexOf('-')==-1){
		ret=false;
		alert("No es una cédula de identidad válida");
		frm_mod.txt_ci.focus();
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
$usuario = $_GET["usuario"];
$SQL = "select Nombre, Apellido, Psw, idPerfil, idUsu, fech_nac, dir, tel, email, CI from usuarios where idUsu = '$usuario'";
$res = mysqli_query($idCone,$SQL);
if ($perfil < 3){
	$row = mysqli_fetch_array($res);
	$idusu = $row['idUsu'];
	$nombre = $row['Nombre'];
	$apellido = $row['Apellido'];
	$psw = $row['Psw'];
	$perfil_m = $row['idPerfil'];
	$fech_nac = $row['fech_nac'];
	$dir = $row['dir'];
	$tel = $row['tel'];
	$email = $row['email'];
	$ci = $row['CI'];
	
	echo "<form name='frm_mod' id='frm_mod' action='DMantUsu01.php' method='post'>";
	echo "<table border='1' align='left' width='30%'>";
	echo "<tr>";
	echo "<td>Nombre : </td>";
	echo "<td><input type='text' name='txt_nomusu' id='txt_nomusu' value='$nombre'></td></tr>";
	echo "<tr>";
	echo "<td>Apellido : </td>";
	echo "<td><input type='text' name='txt_apeusu' id='txt_apeusu' value='$apellido'></td></tr>";
	echo "<tr>";
	echo "<td>C.I. : </td>";
	echo "<td><input type='text' name='txt_ci' id='txt_ci' value='$ci'></td></tr>";
	echo "<tr>";
	echo "<td>Password : </td>";
	echo "<td><input type='text' name='txt_psw' id='txt_psw' value='$psw'></td></tr>";
	echo "<tr>";
	echo "<td>idPerfil : </td>";
	echo "<td><input type='text' name='txt_perfil' id='txt_perfil' value='$perfil_m'></td></tr>";
	echo "<td>Fecha Nacimiento : </td>";
	echo "<td><input type='text' name='txt_fecha' id='txt_fecha' value='$fech_nac'></td></tr>";
	echo "<td>Dirección : </td>";
	echo "<td><input type='text' name='txt_dir' id='txt_dir' value='$dir'></td></tr>";
	echo "<td>Teléfono : </td>";
	echo "<td><input type='text' name='txt_tel' id='txt_tel' value='$tel'></td></tr>";
	echo "<td>e-mail : </td>";
	echo "<td><input type='text' name='txt_email' id='txt_email' value='$email'></td></tr>";
	echo "</table></br>";
	echo "</br></br></br></br></br></br></br></br></br></br></br></br></br>";
	echo "<input type='text' name='txt_modo' id='txt_modo' value='2' style='visibility:hidden'><br>";
	echo "<input type='button' name='btn_Enviar' value='Enviar' onclick='valida_envia();'>";
	echo "<input type='text' name='txt_idusu' id='txt_idusu' size='1' value='$idusu' style='visibility:hidden'><br>";
	echo "<table align='left' width='30%'>";
	echo "</br>";
	echo "<tr>";
	echo "<th align='left'>Id Perfil :</th></tr>";
	echo "<tr></tr>";
	echo "<td>1 - Administrador</td></tr>";
	echo "<td>2 - Vendedor</td></tr>";
	echo "<td>3 - Cliente</td></tr>";
	echo "<td>4 - Limpieza</td></tr>";
	echo "</table>";
	echo "</form>";
}

?>
</body>
</html>
