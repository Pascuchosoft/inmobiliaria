<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>IAltaPropiedad</title>
<link rel="stylesheet" href="miestilo.css">
<script>
function valida_envia(){
	if (frm_alta.txt_ci.value.length==0 || frm_alta.txt_dir.value.length==0 || valido_email(frm_alta.txt_email.value) == false || frm_alta.txt_tel.value.length==0 || frm_alta.txt_nomdue.value.length==0 || frm_alta.txt_apedue.value.length==0 || isNaN(frm_alta.txt_tel.value)){
       alert("Verifique los datos ingresados"); 
       frm_alta.txt_nomdue.focus();
       return 0; 
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
		frm_alta.txt_email.focus();
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

<h1>Alta de Dueños</h1>
<hr />
<br />

<?php
session_start();
//session_register('ses_perfil');
$buff=$_SESSION['ses_perfil'];
if ($buff==1 || $buff==2 || $buff==3 || $buff==4){
?>
<br /><br />
<?
// formulario de alta de Dueño
?>
	<form name='frm_alta' id='frm_alta' method='post' action='DMantDuenio.php'>
	<table border='1' align='left' width='30%'>
	<tr><td>Nombre (*): </td><td><input type='text' name='txt_nomdue' id='txt_nomdue'></td></tr>
	<tr><td>Apellido (*): </td><td><input type='text' name='txt_apedue' id='txt_apedue' ></td></tr>
	<tr><td>Telefono (*): </td><td><input type='text' name='txt_tel' id='txt_tel'></td></tr>
	<tr><td>email (*): </td><td><input type='text' name='txt_email' id='txt_email'></td></tr>
	<tr><td>c.i. (*): </td><td><input type='text' name='txt_ci' id='txt_ci'></td></tr>
	<tr><td>Dirección (*): </td><td><input type='text' name='txt_dir' id='txt_dir'></td></tr>
	</table>
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<input type='button' name='btn_Enviar' value='Enviar' onclick='valida_envia();'>
	<input type='text' name='txt_modo' id='txt_modo' value='1' style='visibility:hidden'>
	</form>
<?php
}
?>
</body>
</html>
