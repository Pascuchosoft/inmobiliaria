<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mantenimiento de usuarios</title>
</head>

<body>
<?php
require ("conexionVideo.php");
session_start();
//session_register('ses_perfil'); no ponerlo !!
$perfil = $_SESSION['ses_perfil'];
$idCone = conexion();
$nom=$_POST['txt_nomusu'];
$psw=$_POST['txt_psw'];
$idPerfil=$_POST['cboperfiles'];
$modo=$_POST['txt_modo'];

$tab = "usuarios";
$camp = "idUsu";

function siguienteId($tabla, $campo){
	$sql_1 = "select max($campo) from $tabla";
	$res = mysql_db_query("video", $sql_1);
	$row = mysql_fetch_array($res);
	$num = $row[0] + 1;
	return $num;
}

	if ($modo == 1){
		$id = siguienteId($tab, $camp);
		$SQL = "insert into usuarios (idUsu, Nombre, Psw, idPerfil) values ('$id', '$nom', '$psw', '$idPerfil')";
	}
	
	if(is_null($nom)==false){
		if (mysql_query ($SQL)){
					echo "<P><H1> La Alta se ha realizado con exito para: $nom</P>";
		}else{
				echo "<P>Se ha producido un error para $nom</P>";
		}
	}else{
		echo "<a href='form_post.html'>Debe registrase como usuario</a>";
	}
	
	if ($modo == 2){
		echo "Bienvenido a la Modificación !";
	}

mysql_close($idCone);

?>
</body>
</html>
