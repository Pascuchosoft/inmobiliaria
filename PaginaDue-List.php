<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PaginaDue.php</title>
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

</script>
</head>

<body>
<ul class='navbar'>
	<li><a href='IBuscaDue.php' align='center'><h4>volver a Búsqueda</h4></a>
</ul>

<h1>Datos de Dueños Encontrados</h1>
<hr />
<br />
<?php
include ("conexionInmobi.php");
session_start();
session_register('ses_pag');
session_register('ses_consulta');
$pag = $_SESSION['ses_pag'];
$idCone = conexion();

	if(!$_POST) $pag_actu = 1;
	else $pag_actu = $_POST['txt_pag_actu'];
	
		echo "<h3>";
		echo "<Table border=1 Align=Center width=100%>";
		
		echo "<TR>";
		
		echo "<TH>" . "Pos";
		echo "<TH>" . "Nombre";
		echo "<TH>" . "Apellido";
		echo "<TH>" . "Tel";
		echo "<TH>" . "Dir";
		echo "<TH>" . "email";
		
		echo "</TR>";
	
		if($pag == 0) $pag =1;
		if($pag_actu > $pag){
			$pag_actu = $pag;
		}
		$fin = 10;
		$ini = ($pag_actu * 10) - 10;
		
		$SQL_1 = $SQL." limit $ini,$fin";
	
		$Registro = mysql_query($SQL_1,$idCone);
		
			while($Fila = mysql_fetch_array($Registro)){
				$nombre = $Fila['nombre'];
				$apellido = $Fila['apellido'];
				$id = $Fila['idDue'];
				$tel = $Fila['tel'];
				$email = $Fila['email'];
				echo "<Tr>";
				echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['idDue'];
				echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['nombre'];
				echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['apellido'];
				echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['tel'];
				echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['dir'];
				echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['email'];
				echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . "<a href='IAltaPropiedad.php?nombre=$nombre&apellido=$apellido&tel=$tel&email=$email&id=$id&pag=$pag_actu'>Seleccionar</a>";
				echo "<Tr>";
			} 
			 echo "</table>";
?>
<form name="frm" method="post" action="PaginaDue.php" >
<br />
<blockquote><blockquote><blockquote><blockquote><input type="text" name="txt_pag_actu" id="txt_pag_actu" value="<?php echo $pag_actu ?>" style="visibility:hidden" />
<input type="button" name="btn_paginar1" value="Anterior" onclick="anterior();" />
<input type="text" name="txt_num_pag" id="txt_num_pag" value="<?php echo $pag_actu ?> / <?php echo $pag ?>" size="2" disabled="disabled" />
<input type="button" name="btn_paginar" value="Siguiente" onclick="siguiente();" />
<br />
<center><h6><a href="IAltaPropiedad.php">Si no se encuentra en la lista, siga este link</a></center>
</form>

</body>
</html>
