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
	<li><a href='crit_ordena.php' align='center'><h4>volver a Búsqueda</h4></a>
</ul>

<h1>Datos de Inmuebles Encontrados</h1>
<hr />
<br />
<?php

include ("conexionInmobi.php");
session_start();
session_register('ses_perfil');
session_register('ses_consulta');
session_register('ses_pag');
session_register('ses_idUsu');
$SQL = $_SESSION['ses_consulta'];
$pag = $_SESSION['ses_pag'];
$idUsu = $_SESSION['ses_idUsu'];
$idCone = conexion();
$perfil = $_SESSION['ses_perfil'];


if($perfil == 1 || $perfil == 2){
	if(!$_POST) $pag_actu = 1;
else $pag_actu = $_POST['txt_pag_actu'];

	if($pag == 0) $pag =1;
	if($pag_actu > $pag){
		$pag_actu = $pag;
	}
	$fin = 10;
	$ini = ($pag_actu * 10) - 10;
	
	$SQL_1 = $SQL." limit $ini,$fin";
	//echo $SQL_1;
	$Registro = mysql_query($SQL_1,$idCone);
	
	echo "<h6>";
		while($Fila = mysql_fetch_array($Registro)){
			$dir = $Fila['dir'];
			$idProp = $Fila['idProp'];
	echo "<Table align='left' width=20%>";
	echo "<Tr>";
?><Td><img width="100" height="100" src="imagenes_prop/<?php echo $idProp ?>.jpg" onclick="open_popup('popup_imagen_casa.php?idProp=<?php echo $idProp ?>','win2')"  /></Td></Tr></table><?php
			echo "<Table align='left' width=20%><tr>";
			echo "<Td >" . $Fila['dir']."</td></tr>";
			echo "<Td >" . $Fila['tipo']."</td></tr>";
			echo "<Td >" . $Fila['barrio']."</td></tr>";
			echo "<Td >" . $Fila['operacion']."</td></tr>";
			echo "<Td >" . $Fila['precio']."</td></tr>";
			echo "<Td>" . $Fila['nombre']."</td></tr>";
			echo "<Td >" . $Fila['apellido']."</td></tr>";
			echo "<Td >" . "<a href='muestroDetalles.php?buff=$dir&pag=$pag_actu&idProp=$idProp'>Ver</a>"."</td></tr>";
			echo "<Td >" . "<a href='IBajaProp.php?idProp=$idProp&pag=$pag_actu'>Eliminar</a>"."</td></tr>";
			echo "<Td >" . "<a href='IModificaProp.php?idProp=$idProp&pag=$pag_actu'>Modifica</a>"."</td></tr>";
			echo "<Td >" . "<a href='visitas.php?idCli=$idUsu&idProp=$idProp&pag=$pag_actu'>visitar</a>"."</td></tr>";
		 echo "</table>";	
		} 

}else{
	if(!$_POST) $pag_actu = 1;
	else $pag_actu = $_POST['txt_pag_actu'];

	
	if($pag == 0) $pag =1;
	if($pag_actu > $pag){
		$pag_actu = $pag;
	}
	$fin = 10;
	$ini = ($pag_actu * 10) - 10;
	
	$SQL_1 = $SQL." limit $ini,$fin";
	//echo $SQL_1;
	$Registro = mysql_query($SQL_1,$idCone);
	
	echo "<h6>";
		while($Fila = mysql_fetch_array($Registro)){
			$dir = $Fila['dir'];
			$idProp = $Fila['idProp'];
	echo "<Table align='left' width=20%>";
	echo "<Tr>";
?><Td><img width="100" height="100" src="imagenes_prop/<?php echo $idProp ?>.jpg" onclick="open_popup('popup_imagen_casa.php?idProp=<?php echo $idProp ?>','win2')"  /></Td></Tr></table><?php
			echo "<Table align='left' width=20%><tr>";
			echo "<Td >" . $Fila['dir']."</td></tr>";
			echo "<Td >" . $Fila['tipo']."</td></tr>";
			echo "<Td >" . $Fila['barrio']."</td></tr>";
			echo "<Td >" . $Fila['operacion']."</td></tr>";
			echo "<Td >" . $Fila['precio']."</td></tr>";
			echo "<Td>" . $Fila['nombre']."</td></tr>";
			echo "<Td >" . $Fila['apellido']."</td></tr>";
			echo "<Td >" . "<a href='muestroDetalles.php?buff=$dir&pag=$pag_actu&idProp=$idProp'>Ver</a>"."</td></tr>";
			echo "<Td >" . "<a href='IBajaProp.php?idProp=$idProp&pag=$pag_actu'>Eliminar</a>"."</td></tr>";
			echo "<Td >" . "<a href='IModificaProp.php?idProp=$idProp&pag=$pag_actu'>Modifica</a>"."</td></tr>";
			echo "<Td >" . "<a href='visitas.php?idCli=$idUsu&idProp=$idProp&pag=$pag_actu'>visitar</a>"."</td></tr>";
		 echo "</table>";	
		} 

}

?>
	 
<form name="frm" method="post" action="paginado02.php" >
<br /><br /><br /><br /><br />
<input type="text" name="txt_pag_actu" id="txt_pag_actu" value="<?php echo $pag_actu ?>" style="visibility:hidden" />
<input type="button" name="btn_paginar1" value="Anterior" onclick="anterior();" />
<input type="text" name="txt_num_pag" id="txt_num_pag" value="<?php echo $pag_actu ?> / <?php echo $pag ?>" size="2" disabled="disabled" />
<input type="button" name="btn_paginar" value="Siguiente" onclick="siguiente();" />
</form>

</body>
</html>
