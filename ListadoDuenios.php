<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Listado de dueños</title>
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

</script>

</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al índice</h4></a>
</ul>

<h1>Listado de Dueños</h1>
<hr />
<?php
include ("conexionInmobi.php");
session_start();
$buff=$_SESSION['ses_perfil'];

if(!$_POST) $pag_actu = 1;
else $pag_actu = $_POST['txt_pag_actu'];


if ($buff == 2 || $buff == 1){
	$idCone = conectarBD();
	$SQL="Select idDue, nombre , apellido, CI, tel, dir, email
		  From duenio";

	$Registro = mysqli_query($idCone, $SQL);
	$filas = mysqli_num_rows($Registro);
	$pag = ceil($filas/10);
	if($pag == 0) $pag =1;
	if($pag_actu > $pag){
		$pag_actu = $pag;
	}
	$fin = 10;
	$ini = ($pag_actu * 10) - 10;
	
	$SQL_1 = $SQL." limit $ini,$fin";

	$rs=mysqli_query($idCone,$SQL_1);
	$contador = 0;
	
	echo "<h5>";
	echo "<Table border=1 Align=Center width=100%>";
	echo "<tr><th>id<th>Nombre<th>Apellido<th>cédula<th>Tel<th>Dir<th>e-mail<th></tr>";
	while ($row=mysqli_fetch_array($rs)){
		$idDue = $row['idDue'];
		$contador = $contador + 1;
		echo "<tr>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['idDue']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['nombre']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['apellido']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['CI']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['tel']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['dir']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'>".$row['email']."</td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'><a href='IModificaDuenio.php?modo=2&idDue=$idDue'>Modificar</a></td>";
		echo "<td align=Center bgcolor='#eeeeee' font color='#dddddd'><a href='IBajaDue.php?modo=3&idDue=$idDue'>Eliminar</a></tr>";
		}
		echo "</table>";
}else{
	echo "<a href='form_post.html'>Debe registrarse como usuario</a>";
}
	?>

<form name="frm" method="post" action="ListadoDuenios.php" >
<br />
<input type="text" name="txt_pag_actu" id="txt_pag_actu" value="<?php echo $pag_actu ?>" style="visibility:hidden" />
<input type="button" name="btn_paginar1" value="Anterior" onClick="anterior();" />
<input type="text" name="txt_num_pag" id="txt_num_pag" value="<?php echo $pag_actu ?> / <?php echo $pag ?>" size="2" disabled="disabled" />
<input type="button" name="btn_paginar" value="Siguiente" onClick="siguiente();" />
</form>

</body>
</html>
