<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Interface de modifiacación de Visitas</title>
<link rel="stylesheet" href="miestilo.css">
<script>
function valida_envia(){
	if (frm_mod.txt_nomcli.value.length==0 || frm_mod.txt_apecli.value.length==0 || frm_mod.txt_dir.value.length==0){ 
       alert("Verifique los datos ingresados"); 
       frm_mod.txt_nomcli.focus();
       return 0; 
	}else{
		alert("Muchas gracias por enviar el formulario"); 
    	frm_mod.submit();
	}				
}

function open_popup(file,window){
	popup_dueño=open(file,window,'resizable=no,width=900,height=500');
}

</script>
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al índice</h4></a>
	<li><a href='ListadoVisitas.php' align='center'><h4>volver al listado</h4></a>
</ul>

<h1>Formulario de Asignación de Visitas</h1>
<hr />
<br />

<?php
require ("conexionInmobi.php");
session_start();
$perfil = $_SESSION['ses_perfil'];
$idCone = conectarBD();

		  
if ($perfil==1 || $perfil==2){
	if($_GET){
           $Nombre = $_GET["Nombre"];
           $Apellido =$_GET["Apellido"];
           $dir = $_GET["dir"];
           $tel = $_GET["tel"];
           $fecha = $_GET["fecha"];
           $hora = $_GET["hora"];
           $idCli = $_GET["idCli"];
           $idVisita = $_GET["idVisita"];
?>
<br /><br />
<?
//Empieza formulario.
?>
	<form name='frm_mod' id='frm_mod' method='post' action='DMantVisita.php'>
	<table border='1' bordercolor="#F9EDAC" align='left' width='35%'>
	<tr><td>Nombre : </td><td><input type='text' name='txt_nomcli' id='txt_nomcli' value="<?php echo $Nombre ?>" disabled="disabled"></td></tr>
	<tr><td>Apellido : </td><td><input type='text' name='txt_apecli' id='txt_apecli' value="<?php echo $Apellido ?>" disabled="disabled"></td></tr>
	<tr><td>Dir Inmuble : </td><td><input type='text' name='txt_dir' id='txt_dir' value="<?php echo $dir ?>" disabled="disabled"></td></tr>
	<tr><td>Tel : </td><td><input type='text' name='txt_tel' id='txt_tel' value="<?php echo $tel ?>" disabled="disabled"></td></tr>
	<tr><td>Fecha (*): </td><td><input type='text' name='txt_fecha' id='txt_fecha' value="<?php echo $fecha ?>"></td></tr>
	<tr><td>Hora (*): </td><td><input type='text' name='txt_hora' id='txt_hora' value="<?php echo $hora ?>"></td></tr>
	<tr><td>Estado : </td><td><select name="lst_estado" id="lst_estado">
<option value="0" ></option>
<option value="1" >Pendiente</option>
<option value="2">Asignada</option>
<option value="3">Realizada</option>
</select></td></tr>
<input type='button' value='asignar vendedor' onClick="open_popup('popup_vendedor.php','win2')">
</table>
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<input type='button' name='btn_Enviar' value='Enviar' onclick='valida_envia();'>
	<input type='text' name='txt_modo' id='txt_modo' value='1' style='visibility:hidden'>
	<input type='text' name='txt_idVende' id='txt_idVende' style='visibility:hidden'>
	<input type='text' name='txt_idCli' id='txt_idCli' value="<?php echo $idCli ?>" style='visibility:hidden'>
	<input type='text' name='txt_vendedor' id='txt_vendedor' style='visibility:hidden'>
	<input type='text' name='txt_idVisita' id='txt_idVisita' value="<?php echo $idVisita ?>" style='visibility:hidden'>
</form>
<?php
	}
}
?>
</body>
</html>
