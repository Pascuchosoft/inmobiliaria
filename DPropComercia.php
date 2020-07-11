<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DBuscar.php</title>
<link rel="stylesheet" href="miestilo.css">
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<?php
require ("conexionInmobi.php");
session_start();
//session_register('ses_consulta');
//session_register('ses_pag');
$idCone = conectarBD();


$fechini = $_POST['txt_fechini'];
$fechfin = $_POST['txt_fechfin'];
$orden = $_POST['lst_orden'];

	$SQL = "select tr.idProp, p.dir, t.tipo, z.barrio, o.operacion, p.dormitorios, tr.monto, tr.NomComp, d.nombre, d.apellido, tr.fecha_comer
		from propiedades p, tipo t, zona z, operacion o, duenio d, transacciones tr
		where   tr.idProp = p.idProp and p.idTipo = t.idTipo and p.idZona = z.idZona and o.idOpera = tr.idOpera and d.idDue = p.idDue and tr.fecha_comer between '$fechini' and '$fechfin' order by $orden";
	

$Registro = mysqli_query($idCone,$SQL);
$filas = mysqli_num_rows($Registro);

$pag = ceil($filas/10);
if($pag == 0) $pag = 1;

$_SESSION['ses_consulta'] = $SQL;
$_SESSION['ses_pag'] = $pag;
header("Location: ListadoComercia.php");

mysqli_free_result ($Registro);
mysqli_close($idCone);

?>
<br />
<a href="IPropComercia.html">Volver</a>
</body>
</html>
