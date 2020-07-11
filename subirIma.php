<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subir imagen</title>
<link rel="stylesheet" href="miestilo.css">
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al índice</h4></a>
</ul>

<?php
include ("conexionInmobi.php");
$idCone = conectarBD();
$modo = $_POST['txt_modo'];	

function max_id($Cone){
	$sql = "select max(id) from imagenes";
	$res = mysqli_query($Cone, $sql);
	$row = mysqli_fetch_array($res);
	$id = $row[0];
	return $id;
}
	
if($modo == 1){
	$idProp = $_POST['txt_idProp'];
	$tipoArch = $_FILES['userfile']['type'];
	$tamArch = $_FILES['userfile']['size'];
	$nombreDirectorio = "imagenes_prop/";
	$nombreFichero = $idProp;
	//$inicio = strlen($_FILES['userfile']['name']);    // esto que está comentado, hace lo mismo que en el paso siguiente.
	//$inicio = $inicio - 4;							// 	Solo que el siguiente paso lo hace en 1 sola línea !
	//$extencion = substr($_FILES['userfile']['name'], $inicio, 4);	
	if(!((strpos ($tipoArch, "gif")||strpos ($tipoArch, "jpeg"))&&($tamArch < 100000))){
		echo "La extensión o el tambaño del archivo son incorrectos. Se permiten archivos gif o jpg de 100Kb como máximo";
	}else{
		$extencion = substr($_FILES['userfile']['name'], strlen($_FILES['userfile']['name']) - 4, 4);
		move_uploaded_file ($_FILES['userfile']['tmp_name'],
		$nombreDirectorio . $nombreFichero . $extencion);
	}
}
if($modo == 2){
	$idProp = $_POST['txt_idProp'];
	$desc = $_POST['txt_desc'];
	$extencion = substr($_FILES['userfile']['name'], strlen($_FILES['userfile']['name']) - 4, 4);
	$SQL = "insert into imagenes (id, id_propiedad, descripcion, extencion) values ('null', '$idProp', '$desc', '$extencion')";
	mysqli_query ($idCone,$SQL);
	$id = max_id($idCone);
	$SQL = "select * from imagenes where id = $id";
	
	$tipoArch = $_FILES['userfile']['type'];
	$tamArch = $_FILES['userfile']['size'];
	$nombreDirectorio = "imagenes_prop/";
	$nombreFichero = $idProp;
	$res = mysqli_query($idCone, $SQL);
	$row = mysqli_fetch_array($res);
	if(!((strpos ($tipoArch, "gif")||strpos ($tipoArch, "jpeg"))&&($tamArch < 100000))){
		echo "La extensión o el tambaño del archivo son incorrectos. Se permiten archivos gif o jpg de 100Kb como máximo";
	}else{
		$extencion = substr($_FILES['userfile']['name'], strlen($_FILES['userfile']['name']) - 4, 4);
		move_uploaded_file ($_FILES['userfile']['tmp_name'],
		$nombreDirectorio . $nombreFichero."_".$row['id'].$row['extencion']);
	}
	
}
?>

	<br /><br />
	<a href='subeArchivo.php?modo=2&idProp=<?php echo $idProp ?>'>para subir más imágenes siga este link</a>
	
</body>
</html>
