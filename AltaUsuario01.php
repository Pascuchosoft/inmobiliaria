<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alta de Usuarios</title>
</head>

<body>
<?php
require ("conexionVideo.php");
$idCone = conexion();
session_start();
$buff=$_SESSION['ses_perfil'];
echo "$buff";
if ($buff==2){
	echo "No hay nadie";
}else{
	$SQL = "select nomperfil, idPerfil 
			from perfiles";
	$Registro = mysql_db_query("video", $SQL);
	while($Fila = mysql_fetch_array($Registro)){
		$buff1 = $row['IdPerfil'];
		echo "$buff1";
	}
}
?>
</body>
</html>
