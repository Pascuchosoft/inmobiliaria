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


$tipo = $_POST['lst_tipo'];
$zona = $_POST['lst_zona'];
$opera = $_POST['lst_opera'];
$cant_dormi = $_POST['lst_dormi'];
$orden = $_POST['lst_orden'];
$comidi = $_POST['opc_comodi'];
$precio = $_POST['lst_precio'];
$precio = $precio +1;

	$SQL = "select p.idProp, p.dir, t.tipo, z.barrio, o.operacion, p.dormitorios, p.precio, d.nombre, d.apellido
		from propiedades p, tipo t, zona z, operacion o, duenio d
		where   p.idTipo = t.idTipo and p.idZona = z.idZona and o.idOpera = p.idOpera and d.idDue = p.idDue and o.idOpera not in (4, 5)";

//sin condiciones
if($tipo == '%' && $zona == '%' && $opera == '%' && $cant_dormi == '%' && $precio == 1){
	$SQL = "select p.idProp, p.dir, t.tipo, z.barrio, o.operacion, p.dormitorios, p.precio, d.nombre, d.apellido
		from propiedades p, tipo t, zona z, operacion o, duenio d
		where   p.idTipo = t.idTipo and p.idZona = z.idZona and o.idOpera = p.idOpera and d.idDue = p.idDue and o.idOpera not in (4, 5) order by $orden";
}elseif($zona == '%' && $opera == '%' && $cant_dormi == '%' && $precio == 1){
	$SQL.=" and t.tipo like '$tipo' order by $orden";
}elseif($tipo == '%' && $opera == '%' && $cant_dormi == '%' && $precio == 1){
	$SQL.=" and z.barrio like '$zona' order by $orden";
}elseif($tipo == '%' && $zona == '%' && $cant_dormi == '%' && $precio == 1){
	$SQL.=" and o.operacion like '$opera' order by $orden";
}elseif($tipo == '%' && $zona == '%' && $opera == '%' && $precio == 1){
	$SQL.=" and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($tipo == '%' && $zona == '%' && $opera == '%' && $cant_dormi == '%'){
	$SQL.=" and p.precio < '$precio' order by $orden";
}elseif($opera == '%' && $cant_dormi == '%' && $precio == 1){
	$SQL.=" and t.tipo like '$tipo' and z.barrio like '$zona' order by $orden";
}elseif($tipo == '%' && $zona == '%' && $precio == 1){
	$SQL.=" and o.operacion like '$opera' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($zona == '%' && $cant_dormi == '%' && $precio == 1){
	$SQL.=" and t.tipo like '$tipo' and o.operacion like '$opera' order by $orden";
}elseif($opera == '%' && $tipo == '%' && $precio == 1){
	$SQL.=" and z.barrio like '$zona' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($opera == '%' && $zona == '%' && $precio == 1){
	$SQL.=" and t.tipo like '$tipo' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($tipo == '%' && $cant_dormi == '%' && $precio == 1){
	$SQL.=" and z.barrio like '$zona' and o.operacion like '$opera' order by $orden";
}elseif($tipo == '%' && $zona == '%' && $opera == '%'){
	$SQL.=" and p.precio < '$precio' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($tipo == '%' && $zona == '%' && $cant_dormi == '%'){
	$SQL.=" and p.precio < '$precio' and o.operacion like '$opera' order by $orden";
}elseif($tipo == '%' && $opera == '%' && $cant_dormi == '%'){
	$SQL.=" and p.precio < '$precio' and z.barrio like '$zona' order by $orden";
}elseif($zona == '%' && $opera == '%' && $cant_dormi == '%'){
	$SQL.=" and p.precio < '$precio' and t.tipo like '$tipo' order by $orden";
}elseif($precio == 1 && $tipo =='%'){
	$SQL.=" and z.barrio like '$zona' and o.operacion like '$opera' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($precio == 1 && $zona =='%'){
	$SQL.=" and t.tipo like '$tipo' and o.operacion like '$opera' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($precio == 1 && $opera =='%'){
	$SQL.=" and t.tipo like '$tipo' and z.barrio like '$zona' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($precio == 1 && $cant_dormi =='%'){
	$SQL.=" and t.tipo like '$tipo' and z.barrio like '$zona' and o.operacion like '$opera' order by $orden";
}elseif($tipo == '%' && $zona == '%'){
	$SQL.=" and p.dormitorios like '$cant_dormi' and p.precio < '$precio' and o.operacion like '$opera' order by $orden";
}elseif($tipo == '%' && $opera == '%'){
	$SQL.=" and p.dormitorios like '$cant_dormi' and p.precio < '$precio' and z.barrio like '$zona' order by $orden";
}elseif($tipo == '%' && $cant_dormi == '%'){
	$SQL.=" and o.operacion like '$opera' and p.precio < '$precio' and z.barrio like '$zona' order by $orden";
}elseif($zona == '%' && $opera == '%'){
	$SQL.=" and t.tipo like '$tipo' and p.precio < '$precio' and z.barrio like '$zona' order by $orden";
}elseif($zona == '%' && $cant_dormi == '%'){
	$SQL.=" and o.operacion like '$opera' and p.precio < '$precio' and t.tipo like '$tipo' order by $orden";
}elseif($opera == '%' && $cant_dormi == '%'){
	$SQL.=" and z.barrio like '$zona' and p.precio < '$precio' and t.tipo like '$tipo' order by $orden";
}elseif($tipo == '%'){
	$SQL.=" and p.precio < '$precio' and z.barrio like '$zona' and o.operacion like '$opera' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($opera == '%'){
	$SQL.=" and p.precio < '$precio' and z.barrio like '$zona' and t.tipo like '$tipo' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($zona == '%'){
	$SQL.=" and p.precio < '$precio' and o.operacion like '$opera' and t.tipo like '$tipo' and p.dormitorios like '$cant_dormi' order by $orden";
}elseif($cant_dormi == '%'){
	$SQL.=" and p.precio < '$precio' and o.operacion like '$opera' and t.tipo like '$tipo' and z.barrio like '$zona' order by $orden";
}elseif($precio == 1){
	$SQL.=" and o.operacion like '$opera' and t.tipo like '$tipo' and z.barrio like '$zona' and p.dormitorios like '$cant_dormi' order by $orden";
}else{
	$SQL.=" and p.precio < '$precio' and o.operacion like '$opera' and t.tipo like '$tipo' and z.barrio like '$zona' and p.dormitorios like '$cant_dormi' order by $orden";
}
	

$Registro = mysqli_query($idCone,$SQL);
$filas = mysqli_num_rows($Registro);

$pag = ceil($filas/10);
if($pag == 0) $pag = 1;

$_SESSION['ses_consulta'] = $SQL;
$_SESSION['ses_pag'] = $pag;
header("Location: paginado.php");

mysqli_free_result ($Registro);
mysqli_close($idCone);

?>
<br />
<a href="crit_ordena.html">Volver</a>
</body>
</html>
