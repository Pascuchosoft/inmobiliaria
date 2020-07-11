<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Prueba de Listado paginado</title>
</head>

<body>
<?php

$conn = mysql_connect("localhost","root","");
$SQL = "select p.dir, t.tipo, z.barrio, o.operacion, p.dormitorios, p.precio
		from propiedades p, tipo t, zona z, operacion o
		where   p.idTipo = t.idTipo and p.idZona = z.idZona and o.idOpera = p.idOpera order by $orden";
		

echo "<H2>". "Datos de los Inmuebles Encontrados";

echo "<HR>";
echo "<h5>";
echo "<Table border=1 Align=Center width=100%>";

echo "<TR>";

echo "<TH>" . "Pos";
echo "<TH>" . "Dire";
echo "<TH>" . "Tipo Inmue";
echo "<TH>" . "Zona";
echo "<TH>" . "Opera";
echo "<TH>" . "Precio";
echo "<TH>" . "Detalles";

echo "</TR>";

$contador = 0;

$Registro = mysql_query($SQL,$idCone);

while($Fila = mysql_fetch_array($Registro)){
	$contador++;
	$dir = $Fila['dir'];
	echo "<Tr>";
	echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $contador;
	echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['dir'];
	echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['tipo'];
	echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['barrio'];
	echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['operacion'];
	echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . $Fila['precio'];
	echo "<Td align=Center bgcolor='#eeeeee' font color='#dddddd'>" . "<a href='muestroDetalles.php?buff=$dir'>Ver</a>";
	echo "<Tr>";
} 
echo "</table>";

?>
</body>
</html>
