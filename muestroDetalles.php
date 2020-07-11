<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>muestro detalles</title>
<link rel="stylesheet" href="miestilo.css">
</head>

<body>
<?php
require ("conexionInmobi.php");
$buff = $_GET["buff"];
$pag = $_GET["pag"];
$idProp = $_GET["idProp"];
$modo = $_GET["modo"];
$idCone = conectarBD();
	$dir = $buff;
	$contador1 = 0;
	$SQL_1 ="select c.comodidad, pc.cant, p.dir, d.nombre, d.apellido
			 from prop_comodi pc, propiedades p, comodidades c, duenio d
			 where pc.idProp = p.idProp and pc.idComo = c.idComo and p.idDue = d.idDue and
			 p.dir = '$dir'";
			 
echo "<H2>". "Detalles del Inmueble : $dir";

echo "<HR>";
echo "<h5>";
echo "<Table border=1 Align=left width=70%>";

	$Registro1 = mysqli_query($idCone,$SQL_1);
	while($Fila1 = mysqli_fetch_array($Registro1)){
		$contador1++;
		echo "<Tr>";
		echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $contador1;
		//echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila1['dir'];
		echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila1['comodidad'];
		echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila1['cant'];
		echo "<Tr>";
	} 
echo "</table>";

$SQL_2 = "select * from imagenes where id_propiedad = $idProp";
$reg2 = mysqli_query($idCone,$SQL_2);
echo "<Table border=1 Align=left width=70%>";
while($Fila2 = mysqli_fetch_array($reg2)){
	$nombre = $Fila2['id_propiedad']."_".$Fila2['id'].$Fila2['extencion'];
	echo "<Tr>";
	echo $Fila2['descripcion'];
	echo "</Tr>";
	echo "<Tr>";
?>	
<img width='200' height='200' src='imagenes_prop/<?php echo $nombre ?>'>
<?php
	echo "</Tr>";
}
echo "</table>";
echo "<br /><br /><br /><br /><br />";

if ($modo == 1){
	echo "<form name='frm_volver' id='frm_volver' method='post' action='paginado.php'>";
	echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
	?><input type="text" name="txt_pag_actu" id="txt_pag_actu" value="<?php echo $pag ?>" size="1"  style="visibility:hidden"/><br /><?php
	echo "<input type='submit' name='enviar' value='Volver Propiedades' />";
	echo "</form>";
}elseif($modo == 2){
	echo "<form name='frm_volv_comer' id='frm_volv_comer' method='post' action='ListadoComercia.php'>";
	?><input type="text" name="txt_pag_actu" id="txt_pag_actu" value="<?php echo $pag ?>" size="1"  style="visibility:hidden"/><br /><?php
	echo "<input type='submit' name='enviar' value='Volver Transacciones' />";
	echo "</form>";
}

mysqli_free_result ($Registro1);
mysqli_close($idCone);

?>
</body>
</html>
