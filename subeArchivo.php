<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fromulario de subida de archivos</title>
<link rel="stylesheet" href="miestilo.css">
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al índice</h4></a>
</ul>

<?php

$modo = $_GET["modo"];
$idProp = $_GET["idProp"];
//$pag = $_GET["pag"];

if($modo == 1){
?>
	<form action="subirIma.php" method="post" enctype="multipart/form-data">
	<input type="text" name="txt_idProp" id="txt_idProp" value="<?php echo $idProp ?>" style="visibility:hidden" />
	<input type="text" name="txt_modo" id="txt_modo" value="1" style="visibility:hidden" />
	<br />
	Archivo :<input type="file" name="userfile" id="userfile" />
	<input type="submit" value="enviar" /> 
	</form>
<?php
}

if($modo == 2){

?>
	<form name="frm_subir" id="frm_subir" method="post" action="subirIma.php" enctype="multipart/form-data">
	<input type="text" name="txt_idProp" id="txt_idProp" value="<?php echo $idProp ?>" style="visibility:hidden"  />
	<br />
	Descripción : <input type="text" name="txt_desc" id="txt_desc" />
	Archivo :<input type="file" name="userfile" id="userfile" />
	<input type="text" name="txt_modo" id="txt_modo" value="2" style="visibility:hidden" />
	<input type="submit" value="enviar" /> 
	</form>
<?php
}
?>
</body>
</html>
