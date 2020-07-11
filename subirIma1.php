<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subir imagen</title>
</head>

<body>
	<?php
$nomArch = $HTTP_POST_FILES['userfile']['name'];
$tipoArch = $HTTP_POST_FILES['userfile']['type'];
$tamArch = $HTTP_POST_FILES['userfile']['size'];

$idProp = $_POST['txt_idProp'];

if(!((strpos ($tipoArch, "gif")||strpos ($tipoArch, "jpg"))&&($tamArch < 100000))){
	echo "La extensión o el tambaño del archivo son incorrectos. Se permiten archivos gif o jpg de 100Kb como máximo";
}else{
		$nombreDirectorio = "imagenes_prop/";
		$nombreFichero = $idProp;
		if(move_uploaded_file ($_FILES['userfile']['tmp_name'], 
		$nombreDirectorio . $nombreFichero.".jpg")){
			echo "El archivo se envió OK";
		}else{
			echo "Error al enviar el archivo";
		}
}
	?>
</body>
</html>
