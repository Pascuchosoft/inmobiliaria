<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Listado de mis Visitas</title>
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

function open_popup(file,window){
		popup_imagen_casa=open(file,window,'resizable=no,width=800,height=400');
}

</script>

</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al índice</h4></a>
</ul>

<h1>Propiedades a Visitar</h1>
<hr />
<br />

<?php
include ("conexionInmobi.php");
session_start();
session_register('ses_idUsu');
$idUsu = $_SESSION['ses_idUsu'];
$idCone = conexion();

if(!$_POST) $pag_actu = 1;
else $pag_actu = $_POST['txt_pag_actu'];

$SQL = "select p.dir, t.tipo, z.barrio, o.operacion, p.precio, v.idVisita, p.idProp
		from propiedades p, zona z, operacion o, visita v, tipo t
		where p.idZona = z.idZona and p.idTipo = t.idTipo and p.idOpera = o.idOpera and p.idProp = v.idProp and v.idCli = $idUsu and v.idEstado = 1";

	$Registro = mysql_query($SQL,$idCone);	
	$filas = mysql_num_rows($Registro);
	$pag = ceil($filas/10);
	if($pag == 0) $pag =1;
	if($pag_actu > $pag){
		$pag_actu = $pag;
	}
	$fin = 10;
	$ini = ($pag_actu * 10) - 10;
	
	$SQL_1 = $SQL." limit $ini,$fin";

	$rs=mysql_query($SQL_1,$idCone);
	$contador = 0;

	echo "<h5>";
	echo "<Table border=1 Align=Center width=100%>";
	echo "<tr><th>Cant<th>dir<th>tipo<th>barrio<th>opera<th>precio<th>imag<th></tr>";
	while ($row=mysql_fetch_array($rs)){
		$contador = $contador + 1;
		$idVisita = $row['idVisita'];
		$dir = $row['dir'];
		$idProp = $row['idProp'];
		echo "<tr>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$contador."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['dir']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['tipo']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['barrio']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['operacion']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['precio']."</td>";
?><Td align=Center bgcolor="#eeeeee" font color="#dddddd"><img width="50" height="50" src="imagenes_prop/<?php echo $idProp ?>.jpg" onclick="open_popup('popup_imagen_casa.php?idProp=<?php echo $idProp ?>','win2')"  /><?php
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'><a href='DMantVisita.php?modo=2&idVisita=$idVisita&dir=$dir'>Eliminar</a></tr>";
		
	}
	 echo "</table>";	
	 
?>
<form name="frm" method="post" action="listadoMisVisitas.php" >
<br />
<input type="text" name="txt_pag_actu" id="txt_pag_actu" value="<?php echo $pag_actu ?>" style="visibility:hidden" />
<input type="button" name="btn_paginar1" value="Anterior" onclick="anterior();" />
<input type="text" name="txt_num_pag" id="txt_num_pag" value="<?php echo $pag_actu ?> / <?php echo $pag ?>" size="2" disabled="disabled" />
<input type="button" name="btn_paginar" value="Siguiente" onclick="siguiente();" />
</form>

</body>
</html>
