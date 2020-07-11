<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>IAltaPropiedad</title>
<link rel="stylesheet" href="miestilo.css">
<script>
function valida_envia(){
	if (frm_alta.txt_ci.value.length==0 || frm_alta.txt_dir.value.length==0 || valido_email(frm_alta.txt_email.value) == false || frm_alta.txt_tel.value.length==0 || frm_alta.txt_nomdue.value.length==0 || frm_alta.txt_apedue.value.length==0 || frm_alta.txt_precio.value.length==0 || frm_alta.txt_dormi.value.length==0 || isNaN(frm_alta.txt_tel.value) || isNaN(frm_alta.txt_precio.value) || isNaN(frm_alta.txt_dormi.value) || isNaN(frm_alta.txt_garaje.value) || isNaN(frm_alta.txt_patio.value) || isNaN(frm_alta.txt_jardin.value) || isNaN(frm_alta.txt_aire.value) || isNaN(frm_alta.txt_metros.value) || isNaN(frm_alta.txt_alarma.value) || isNaN(frm_alta.txt_parri.value) || isNaN(frm_alta.txt_lenia.value)){
       alert("Verifique los datos ingresados"); 
       frm_alta.txt_dir.focus();
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
	<li><a href='DBuscarDue-List.php' align='center'><h4>volver al Listado</h4></a>
</ul>

<h1>Alta de Propiedad</h1>
<hr />
<br />
<?php
session_start();
//session_register('ses_perfil');
$buff=$_SESSION['ses_perfil'];




if ($buff==1 || $buff==2 || $buff==3 || $buff==4){

	if($_GET){
                 $apellido=$_GET["apellido"];
                 $nombre = $_GET["nombre"];
                 $tel = $_GET["tel"];
                 $email = $_GET["email"];
                 $idDuenio = $_GET["idDuenio"];
                 $ci = $_GET["ci"];
                 $dirdue = $_GET["dirdue"];

?>
<br /><br />
<?
//Empieza formulario para ingresar todos los datos de la propiedad, incluidas sus comodidades, teniendo ya su dueño.
?>
	<form name='frm_alta' id='frm_alta' method='post' action='DMantProp.php'>
	<table border='1' bordercolor="#F9EDAC" align='left' width='30%'>
	<tr><td>Nombre (*): </td><td><input type='text' name='txt_nomdue' id='txt_nomdue' value="<?php echo $nombre ?>" disabled="disabled"></td></tr>
	<tr><td>Apellido (*): </td><td><input type='text' name='txt_apedue' id='txt_apedue' value="<?php echo $apellido ?>"disabled="disabled"></td></tr>
	<tr><td>Telefono (*): </td><td><input type='text' name='txt_tel' id='txt_tel' value="<?php echo $tel ?>"disabled="disabled"></td></tr>
	<tr><td>email (*): </td><td><input type='text' name='txt_email' id='txt_email' value="<?php echo $email ?>"disabled="disabled"></td></tr>
	<tr><td>c.i. (*): </td><td><input type='text' name='txt_ci' id='txt_ci' value="<?php echo $ci ?>"disabled="disabled"></td></tr>
	<tr><td>Dirección (*): </td><td><input type='text' name='txt_dirdue' id='txt_dirdue' value="<?php echo $dirdue ?>"disabled="disabled"></td></tr>
	<tr><td>Tipo Inmueble : </td><td><select name="lst_tipo" id="lst_tipo">
<option value="1" >Casa</option>
<option value="2">Apartamento</option>
<option value="3">Local</option>
<option value="4">Terreno</option>
</select></td></tr>
	<tr><td>Direccion : </td><td><input type='text' name='txt_dir' id='txt_dir'></td></tr>
	<tr><td>Operación : </td><td><select name="lst_opera" id="lst_opera">
<option value="1">Venta</option>
<option value="2">Alquiler</option>
<option value="3">Permuta</option>
</select></td></tr>
	<tr><td>Zona : </td><td><select name="lst_zona" id="lst_zona">
<option value="1">Carrasco</option>
<option value="2">Punta Gorda</option>
<option value="3">Malvin</option>
<option value="4">Malvin Norte</option>
<option value="5">Buceo</option>
<option value="6">Pocitos</option>
<option value="7">Pque Rodó</option>
<option value="8">Palermo</option>
<option value="9">Centro</option>
</select></td></tr>
	<tr><td>Precio (*): </td><td><input type='text' name='txt_precio' id='txt_precio'></td></tr>
	</table>
	<table border='1' bordercolor="#F9EDAC"  align='left' width='35%'>
	<tr><td>Dormitorios (*): </td><td><input type='text' name='txt_dormi' id='txt_dormi'></td></tr>
	<tr><td>Garaje : </td><td><input type='text' name='txt_garaje' id='txt_garaje'></td></tr>
	<tr><td>Patio : </td><td><input type='text' name='txt_patio' id='txt_patio'></td></tr>
	<tr><td>Jardín : </td><td><input type='text' name='txt_jardin' id='txt_jardin'></td></tr>
	<tr><td>Aire Acond : </td><td><input type='text' name='txt_aire' id='txt_aire'></td></tr>
	<tr><td>Metros : </td><td><input type='text' name='txt_metros' id='txt_metros'></td></tr>
	<tr><td>Alarma : </td><td><input type='text' name='txt_alarma' id='txt_alarma'></td></tr>
	<tr><td>Parrillero : </td><td><input type='text' name='txt_parri' id='txt_parri'></td></tr>
	<tr><td>Estufa Leña : </td><td><input type='text' name='txt_lenia' id='txt_lenia'></td></tr>
	</table>
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<input type='button' name='btn_Enviar' value='Enviar' onclick='valida_envia();'>
	<input type='text' name='txt_modo' id='txt_modo' value='1' style='visibility:hidden'>
	<input type='text' name='txt_idDue' id='txt_idDue' value='<?php echo $idDuenio ?>' style='visibility:hidden'>
	</form>
<?php
	}else{
?>
<br /><br />
<?
//Empieza formulario para ingresar todos los datos de la propiedad incluido sus comodidades, e incluido su dueño en el ingreso.
?>
	<form name='frm_alta' id='frm_alta' method='post' action='DMantProp.php' enctype="multipart/form-data">
	<table border='1' align='left' width='30%'>
	<tr><td>Nombre (*): </td><td><input type='text' name='txt_nomdue' id='txt_nomdue'></td></tr>
	<tr><td>Apellido (*): </td><td><input type='text' name='txt_apedue' id='txt_apedue' ></td></tr>
	<tr><td>Telefono (*): </td><td><input type='text' name='txt_tel' id='txt_tel'></td></tr>
	<tr><td>email (*): </td><td><input type='text' name='txt_email' id='txt_email'></td></tr>
	<tr><td>c.i. (*): </td><td><input type='text' name='txt_ci' id='txt_ci'></td></tr>
	<tr><td>Dirección (*): </td><td><input type='text' name='txt_dirdue' id='txt_dirdue'></td></tr>
	<tr><td>Tipo Inmueble : </td><td><select name="lst_tipo" id="lst_tipo">
<option value="1" >Casa</option>
<option value="2">Apartamento</option>
<option value="3">Local</option>
<option value="4">Terreno</option>
</select></td></tr>
	<tr><td>Direccion : </td><td><input type='text' name='txt_dir' id='txt_dir'></td></tr>
	<tr><td>Operación : </td><td><select name="lst_opera" id="lst_opera">
<option value="1">Venta</option>
<option value="2">Alquiler</option>
<option value="3">Permuta</option>
</select></td></tr>
	<tr><td>Zona : </td><td><select name="lst_zona" id="lst_zona">
<option value="1">Carrasco</option>
<option value="2">Punta Gorda</option>
<option value="3">Malvin</option>
<option value="4">Malvin Norte</option>
<option value="5">Buceo</option>
<option value="6">Pocitos</option>
<option value="7">Pque Rodó</option>
<option value="8">Palermo</option>
<option value="9">Centro</option>
</select></td></tr>
	<tr><td>Precio (*): </td><td><input type='text' name='txt_precio' id='txt_precio'></td></tr>
	</table>
	<table border='1' align='left' width='35%'>
	<tr><td>Dormitorios (*): </td><td><input type='text' name='txt_dormi' id='txt_dormi'></td></tr>
	<tr><td>Garaje : </td><td><input type='text' name='txt_garaje' id='txt_garaje'></td></tr>
	<tr><td>Patio : </td><td><input type='text' name='txt_patio' id='txt_patio'></td></tr>
	<tr><td>Jardín : </td><td><input type='text' name='txt_jardin' id='txt_jardin'></td></tr>
	<tr><td>Aire Acond : </td><td><input type='text' name='txt_aire' id='txt_aire'></td></tr>
	<tr><td>Metros : </td><td><input type='text' name='txt_metros' id='txt_metros'></td></tr>
	<tr><td>Alarma : </td><td><input type='text' name='txt_alarma' id='txt_alarma'></td></tr>
	<tr><td>Parrillero : </td><td><input type='text' name='txt_parri' id='txt_parri'></td></tr>
	<tr><td>Estufa Leña : </td><td><input type='text' name='txt_lenia' id='txt_lenia'></td></tr>
	</table>
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<input type='button' name='btn_Enviar' value='Enviar' onclick='valida_envia();'>
	<input type='text' name='txt_modo' id='txt_modo' value='2' style='visibility:hidden'>
	</form>
<?php
	}
}

?>
</body>
</html>
