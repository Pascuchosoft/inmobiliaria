<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Criterios de Ordenación</title>
<link rel="stylesheet" href="miestilo.css">
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al índice</h4></a>
</ul>

<h1>Listado de Propiedades Comercializadas</h1>
<hr />
<br />

<?php
session_start();
$buff=$_SESSION['ses_perfil'];
if ($buff == 2 || $buff == 1 || $buff == 3){
?>
<form name="frm_SelecCriterios" id="frm_SelecCriterios" method="post" action="DPropComercia.php">
<table width="30%">
<tr align="center"><td><h3>Rango de fechas</h3></td></tr>
<tr><td>Desde : </td>
<td><input type="text" name="txt_fechini" id="txt_fechini" size="10" value="1900-01-01"/></td></tr>
<tr><td>Hasta : </td>
<td><input type="text" name="txt_fechfin" id="txt_fechfin" size="10" value="2050-12-31" /></td></tr>
</table>
<br />
<table width="60%">
<tr align="left"><td><h3>Orden según</h3></td></tr>
<td><select name="lst_orden" id="lst_orden">
<option value="t.tipo">Tipo</option>
<option value="o.operacion">Operación</option>
<option value="z.barrio">Zona</option>
<option value="p.dormitorios">Dormitorios</option>
<option value="t.monto">Precio</option>
</select></td>
</tr>
</table>
<br />
<input type="submit" name="btn_Enviar" value="Enviar" /> 
</form>
<?php
}
?>
</body>
</html>
