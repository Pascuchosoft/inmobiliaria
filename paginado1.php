<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Paginado</title>
<link rel="stylesheet" href="miestilo.css">
<script>

function siguiente(total){
	frm.txt_pag_actu.value = parseInt(frm.txt_pag_actu.value) + 1;
	frm.submit();
}

function anterior(){
	frm.txt_pag_actu.value = parseInt(frm.txt_pag_actu.value) - 1;
	if(parseInt(frm.txt_pag_actu.value)==0) frm.txt_pag_actu.value=1;
	frm.submit();
}

function mostrarPag(total){
	
}
</script>
</head>

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
session_register('ses_consulta');
session_register('ses_pag');
$SQL = $_SESSION['ses_consulta'];
$totalPag = $_SESSION['ses_pag'];
$idCone = conexion();
	

$pag_actu = $_POST['txt_pag_actu'];
	//echo $pag_actu;
	
	echo "<h3>";
	echo "<Table border=1 Align=Center width=100%>";
	
	echo "<TR>";
	
	echo "<TH>" . "Id";
	echo "<TH>" . "Dire";
	echo "<TH>" . "Tipo Inmue";
	echo "<TH>" . "Zona";
	echo "<TH>" . "Opera";
	echo "<TH>" . "Precio";
	echo "<TH>" . "Detalles";
	
	echo "</TR>";
	if($totalPag == 0) $totalPag =1;
	if($pag_actu > $totalPag){
		$pag_actu = $totalPag;
	}
	$fin = 10;
	$ini = ($pag_actu * 10) - 10;
	
	
	$SQL_1 = $SQL." limit $ini,$fin";
	//echo $SQL_1;
	$Registro = mysql_query($SQL_1,$idCone);
	
		while($Fila = mysql_fetch_array($Registro)){
			$dir = $Fila['dir'];
			echo "<Tr>";
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['idProp'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['dir'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['tipo'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['barrio'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['operacion'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['precio'];
			echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . "<a href='muestroDetalles.php?buff=$dir&pag=$pag_actu'>Ver</a>";
			echo "<Tr>";
		} 
		 echo "</table>";	
?>

<form name="frm" method="post" action="paginado1.php" >
<br />
<input type="text" name="txt_pag_actu" id="txt_pag_actu" value="<?php echo $pag_actu ?>" style="visibility:hidden" />
<input type="button" name="btn_paginar1" value="Anterior" onclick="anterior();" />
<input type="text" name="txt_num_pag" id="txt_num_pag" value="<?php echo $pag_actu ?> / <?php echo $totalPag ?>" size="2" disabled="disabled" />
<input type="button" name="btn_paginar" value="Siguiente" onclick="siguiente();" />
</form>
</body>
</html>
