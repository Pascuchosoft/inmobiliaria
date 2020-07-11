<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procesa Selección</title>
</head>

<body>
<?php
include ("Propiedad.php");
session_start();
session_register('ses_array');
$idCone = conexion();

$miarreglo = array();
$tab = "propiedades";
$camp = "idProp";

function maximoId($tabla, $campo){
	$sql_1 = "select max($campo) from $tabla";
	$res = mysql_db_query("inmobili", $sql_1);
	$row = mysql_fetch_array($res);
	$num = $row[0];
	return $num;
}

$cant = maximoId($tab, $camp);

$cont = 1;
$cont_2 = 0;
$chk = 'chk';

	while($cont <= $cant){
		$buff = $chk.$cont;
		if(!isset($_POST[$buff])){
			$cont++;
		}else{
			$buff1 = $_POST[$buff];
			$miarreglo[$cont_2]=$cont;
			$cont_2++;
			$cont++;
		}
	}

$Propiedades = array();
$i=0;
foreach($miarreglo as $indice => $v){
	$SQL = "select idProp, dir, idTipo, idZona, idOpera, precio, dormitorios from propiedades where idProp = $v";
	$Registro = mysql_query($SQL,$idCone);
	$row=mysql_fetch_array($Registro);
		$idPeli = $row['idPeli'];
		$nombre = $row['nombre'];
		$descrip = $row['descrip'];
		$Prop = new Propiedad($row['idProp'], $row['dir'], $row['idTipo'], $row['idZona'], $row['idOpera'], $row['precio'], $row['dormitorios'], "");
		$Propiedades[$i]=$Prop;
		$i++;
}

$_SESSION['ses_array'] = $Propiedades;
header ("Location: miarray.php");

?>
</body>
</html>