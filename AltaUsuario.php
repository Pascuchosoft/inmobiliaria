<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alta de Usuarios</title>
<link rel="stylesheet" href="miestilo.css">
<script>
function valida_envia(){
	if (frm_alta.txt_nomusu.value.length==0 || frm_alta.txt_nomusu.value.length==0 || frm_alta.txt_psw.value.length==0 ||  valido_email(frm_alta.txt_email.value) == false || valido_ci(frm_alta.txt_ci.value) == false){ 
       alert("Verifique los datos ingresados"); 
       frm_alta.txt_nomusu.focus();
       return 0; 
	}else if (frm_alta.txt_psw.value != frm_alta.txt_psw2.value){
		alert("Rectifique contraseña");
        frm_alta.txt_psw.focus();
	}else{
		alert("Muchas gracias por enviar el formulario"); 
    	frm_alta.submit();
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

<h1>Alta de Usuarios</h1>
<hr />
<br />

<?php
require ("conexionInmobi.php");
session_start();
//session_register('ses_perfil');
$buff=$_SESSION['ses_perfil'];
$idCone=conectarBD();
if ($buff==1 || $buff==2){

	if ($_SESSION['ses_perfil']<=2){
		
		echo "<form name='frm_alta' id='frm_alta' method='post' action='DMantUsu01.php'>";
		echo "<br>";
		echo "<table border='1' align='left' width='30%'>";
		$sql = "select nomperfil, idPerfil from perfiles";
		$res = mysqli_query($idCone, $sql);
		echo '<select name ="cboperfiles" id="cboperfiles">';
		while ($row = mysqli_fetch_array($res)){
			echo "<option value=".$row["idPerfil"].">".$row["nomperfil"]."</option>";
		}
		echo "</select></br></br>";
		echo "<tr><td>Nombre (*): </td><td><input type='text' name='txt_nomusu' id='txt_nomusu'></td></tr>";
		echo "<tr><td>Apellido (*): </td><td><input type='text' name='txt_apeusu' id='txt_apeusu'></td></tr>";
		echo "<tr><td>C.I. : (*): </td><td><input type='text' name='txt_ci' id='txt_ci'></td></tr>";
		echo "<tr><td>Fech_nac : </td><td><input type='text' name='txt_fecha' id='txt_fecha'></td></tr>";
		echo "<tr><td>Dirección  : </td><td><input type='text' name='txt_dir' id='txt_dir'></td></tr>";
		echo "<tr><td>Tel : </td><td><input type='text' name='txt_tel' id='txt_tel'></td></tr>";
		echo "<tr><td>e-mail (*): </td><td><input type='text' name='txt_email' id='txt_email'></td></tr>";
		echo "<tr><td>Psw (*): </td><td><input type='password' name='txt_psw' id='txt_psw'></td></tr>";
		echo "<tr><td>Psw (*): </td><td><input type='password' name='txt_psw2' id='txt_psw2'></td></tr>";
		echo "</table>";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		echo "<input type='button' name='btn_Enviar' value='Enviar' onclick='valida_envia();'>";
		echo "<input type='text' name='txt_modo' id='txt_modo' value='1' style='visibility:hidden'>";
		echo "</form>";
	}else{
		echo "<a href='form_post.html'>debe registrarse como usuario</a>";
	}
}elseif($buff == 5 || $buff==3 || $buff==4){

		echo "<form name='frm_alta' id='frm_alta' method='post' action='DMantUsu01.php'>";
		echo "<br>";
		echo "<table border='1' align='left' width='30%'>";
		echo '<select name ="cboperfiles" id="cboperfiles" style="visibility:hidden">';
		echo "<option value='3'>--</option>";
		echo "</select></br></br>";
		echo "<tr><td>Nombre (*): </td><td><input type='text' name='txt_nomusu' id='txt_nomusu'></td></tr>";
		echo "<tr><td>Apellido (*): </td><td><input type='text' name='txt_apeusu' id='txt_apeusu'></td></tr>";
		echo "<tr><td>C.I. : (*): </td><td><input type='text' name='txt_ci' id='txt_ci'></td></tr>";
		echo "<tr><td>Fech_nac : </td><td><input type='text' name='txt_fecha' id='txt_fecha'></td></tr>";
		echo "<tr><td>Dirección  : </td><td><input type='text' name='txt_dir' id='txt_dir'></td></tr>";
		echo "<tr><td>Tel : </td><td><input type='text' name='txt_tel' id='txt_tel'></td></tr>";
		echo "<tr><td>e-mail (*): </td><td><input type='text' name='txt_email' id='txt_email'></td></tr>";
		echo "<tr><td>Psw (*): </td><td><input type='password' name='txt_psw' id='txt_psw'></td></tr>";
		echo "<tr><td>Psw (*): </td><td><input type='password' name='txt_psw2' id='txt_psw2'></td></tr>";
		echo "</table>";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		echo "<input type='button' name='btn_Enviar' value='Enviar' onclick='valida_envia();'>";
		echo "<input type='text' name='txt_modo' id='txt_modo' value='1' style='visibility:hidden'>";
		echo "</form>";
}else{
	echo "<a href='form_post.html'>Siga este link para logearse o registrarse como usuario</a>";
}
?>

</body>
</html>


