<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DBuscarDue.php</title>
</head>

<body>
<?php
require ("conexionInmobi.php");
session_start();
//session_register('ses_consulta');
//session_register('ses_pag');
$idCone = conectarBD();

$SQL = "select nombre, apellido, dir, tel, idDue, email, CI
		from duenio order by apellido";

$Registro = mysqli_query($idCone,$SQL);
$filas = mysqli_num_rows($Registro);

$pag = ceil($filas/10);
if($pag == 0) $pag = 1;

$_SESSION['ses_consulta'] = $SQL;
$_SESSION['ses_pag'] = $pag;
header("Location: PaginaDue.php");

mysqli_free_result ($Registro);
mysqli_close($idCone);

?>
</body>
</html>
