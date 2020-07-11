<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Criterios de Ordenaci�n</title>
<link rel="stylesheet" href="miestilo.css">
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al �ndice</h4></a>
</ul>

<h1>Listado de Propiedades</h1>
<hr />
<br />

<?php
session_start();
$buff=$_SESSION['ses_perfil'];
if ($buff == 2 || $buff == 1 || $buff == 3){
?>
<form name="frm_SelecCriterios" id="frm_SelecCriterios" method="post" action="DBuscarPag.php">
<table width="60%">
<tr align="left"><td><h3>Tipo de Inmueble</h3></td><td><h3>Operaci�n</h3></td><td><h3>Precio hasta</h3></td></tr>
<tr align="left"><td><select name="lst_tipo" id="lst_tipo">
<option value="%" >---</option>
<option value="Casa" >Casa</option>
<option value="Apartamento">Apartamento</option>
<option value="Local">Local</option>
<option value="Terreno">Terreno</option>
</select></td>
<td><select name="lst_opera" id="lst_opera">
<option value="%">---</option>
<option value="Venta">Venta</option>
<option value="Alquiler">Alquiler</option>
<option value="Permuta">Permuta</option>
</select></td>
<td><select name="lst_precio" id="lst_precio">
<option value="%">---</option>
<option value="40000">40000</option>
<option value="70000">70000</option>
<option value="100000">100000</option>
<option value="100000">130000</option>
</select></td>
</tr>
</table>
<br />
<table width="60%">
<tr align="left"><td><h3>Ubicaci�n</h3></td><td><h3>Dormitorios</h3></td><td><h3>Orden seg�n</h3></td></tr>
<tr align="left"><td><select name="lst_zona" id="lst_zona">
<option value="%" >---</option>
<option value="Carrasco">Carrasco</option>
<option value="Punta Gorda">Punta Gorda</option>
<option value="Malv�n">Malv�n</option>
<option value="Buceo">Buceo</option>
<option value="Malvin Norte">Malv�n Norte</option>
<option value="Pocitos">Pocitos</option>
<option value="Pque Rod�">Pque Rod�</option>
<option value="Palermo">Palermo</option>
<option value="Centro">Centro</option>
</select></td>
<td><select name="lst_dormi" id="lst_dormi">
<option value="%">---</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select></td>
<td><select name="lst_orden" id="lst_orden">
<option value="t.tipo">Tipo</option>
<option value="o.operacion">Operaci�n</option>
<option value="z.barrio">Zona</option>
<option value="p.dormitorios">Dormitorios</option>
</select></td>
</tr>
</table>

<br />
<h3>Seleccion de Comodidades (inhabilitado)</h3>
<table>
<tr><th align="left">Ninguna : </td><td><input type="radio" name="opc_comodi" id="opc_comodi" value="0" checked="checked" />
<tr><td>Garaje : </td><td><input type="radio" name="opc_comodi" id="opc_comodi" value="1"  />
<tr><td>Patio : </td><td><input type="radio" name="opc_comodi" id="opc_comodi" value="2" />
<tr><td>Jard�n : </td><td><input type="radio" name="opc_comodi" id="opc_comodi" value="3"/>
<tr><td>Aire Acondicionado : </td><td><input type="radio" name="opc_comodi" id="opc_comodi" value="4"/>
</table>
<input type="submit" name="btn_Enviar" value="Enviar" /> 
</form>
<?php
}
?>
</body>
</html>
