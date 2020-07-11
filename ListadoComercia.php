<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Paginado</title>
<link rel="stylesheet" href="miestilo.css">
<script>
function siguiente(){
	frm.txt_pag_actu.value = parseInt(frm.txt_pag_actu.value) + 1;
	frm.submit();
}

function anterior(){
	frm.txt_pag_actu.value = parseInt(frm.txt_pag_actu.value) - 1;
	if(parseInt(frm.txt_pag_actu.value)==0) frm.txt_pag_actu.value=1;
	frm.submit();
}

function open_popup(file,window){
		popup_imagen_casa=open(file,window,'resizable=no,width=800,height=400');
}

</script>
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />
<body>
<ul class='navbar'>
	<li><a href='IPropComercia.php' align='center'><h4>volver a Búsqueda</h4></a>
</ul>

<h1>Datos de Inmuebles Comercializados</h1>
<hr />
<br />
<?php

include ("conexionInmobi.php");
include ("Propiedad.php");
session_start();
//session_register('ses_perfil');
//session_register('ses_consulta');
//session_register('ses_pag');
//session_register('ses_idUsu');
$SQL = $_SESSION['ses_consulta'];
$pag = $_SESSION['ses_pag'];
$idUsu = $_SESSION['ses_idUsu'];
$idCone = conectarBD();
$perfil = $_SESSION['ses_perfil'];

if($perfil == 1 || $perfil == 2){
	if(!$_POST) $pag_actu = 1;
else $pag_actu = $_POST['txt_pag_actu'];

	echo "<h6>";
	echo "<Table border=1 Align=Center width=100%>";
	
	echo "<TR>";
	
	echo "<TH>" . "idProp";
	echo "<TH>" . "Dire";
	echo "<TH>" . "Tipo Inmue";
	echo "<TH>" . "Zona";
	echo "<TH>" . "Opera";
	echo "<TH>" . "Precio";
	echo "<TH>" . "Comprador";
	echo "<TH>" . "Nombre Dueño";
	echo "<TH>" . "Apellido Dueño";
	echo "<TH>" . "Fecha";
	echo "<TH>" . "Imagen";
	echo "<TH>" . "Detalles";
	
	echo "</TR>";
	
	if($pag == 0) $pag =1;
	if($pag_actu > $pag){
		$pag_actu = $pag;
	}
	$fin = 10;
	$ini = ($pag_actu * 10) - 10;
	
	$SQL_1 = $SQL." limit $ini,$fin";
	//echo $SQL_1;
	$Registro = mysqli_query($idCone,$SQL_1);
	
		while($Fila = mysqli_fetch_array($Registro)){
			$dir = $Fila['dir'];
			$idProp = $Fila['idProp'];
			echo "<Tr>";
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['idProp'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['dir'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['tipo'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['barrio'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['operacion'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['monto'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['NomComp'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['nombre'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['apellido'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['fecha_comer'];
?><Td align=Center bgcolor="#eeeeee" font color="#dddddd"><img width="50" height="50" src="imagenes_prop/<?php echo $idProp ?>.jpg" onclick="open_popup('popup_imagen_casa.php?idProp=<?php echo $idProp ?>','win2')"  /><?php
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . "<a href='muestroDetalles.php?buff=$dir&pag=$pag_actu&idProp=$idProp&modo=2'>Ver</a>";
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . "<a href='IBajaProp.php?idProp=$idProp&pag=$pag_actu'>Eliminar</a>";
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . "<a href='IModificaProp.php?idProp=$idProp&pag=$pag_actu'>Modifica</a>";
		//echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'><input type='checkbox' name='chk".$Prop->getidProp()."' id='chk".$Prop->getidProp()."'></td>";
			echo "<Tr>";
		} 
		 echo "</table>";	

}

?>
		 
<form name="frm" method="post" action="ListadoComercia.php" >
<br />
<input type="text" name="txt_pag_actu" id="txt_pag_actu" value="<?php echo $pag_actu ?>" style="visibility:hidden" />
<input type="button" name="btn_paginar1" value="Anterior" onclick="anterior();" />
<input type="text" name="txt_num_pag" id="txt_num_pag" value="<?php echo $pag_actu ?> / <?php echo $pag ?>" size="2" disabled="disabled" />
<input type="button" name="btn_paginar" value="Siguiente" onclick="siguiente();" />
</form>

</body>
</html>
