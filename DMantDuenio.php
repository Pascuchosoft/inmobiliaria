<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mantenimiento de Dueños</title>
<link rel="stylesheet" href="miestilo.css">

</head>

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h3>volver al índice</h3></a>
</ul>

<h1>Mantenimiento de Dueños</h1>
<hr />
<br />
<?php
require ("conexionInmobi.php");
session_start();
//session_register('ses_perfil'); no ponerlo !!
$perfil = $_SESSION['ses_perfil'];
$idCone = conectarBD();

$modo=$_POST['txt_modo'];

$tab = "gerenteid";
$camp = "idDue";

function siguienteId($tabla, $campo, $Cone){
	$sql_1 = "select max($campo) from $tabla";
	$res = mysqli_query($Cone, $sql_1);
	$row = mysqli_fetch_array($res);
	$num = $row[0] + 1;
	return $num;
}

function no_esta($c, $Cone){
	$sql_2 = "select CI
			  from duenio
			  where CI = '$c'";
	$res_2 = mysqli_query($Cone, $sql_2);
	$num = mysqli_num_rows($res_2);
	if ($num == 0){
		$noesta = true;
	}else{
		 $noesta = false;
	}
	return $noesta;
}

function es_cli($c,$Cone){
	$sql_2 = "select CI
			  from usuarios
			  where CI = '$c' and idPerfil = 3";
	$res_2 = mysqli_query($Cone, $sql_2);
    $num = mysqli_num_rows($res_2);
	if ($num == 0){
		$esta = false;
	}else{
		 $esta = true;
	}
	return $esta;
}

if ($modo == 1){ // alta de dueños

	$nom=$_POST['txt_nomdue'];
	$ape=$_POST['txt_apedue'];
	$tel=$_POST['txt_tel'];
	$ci = $_POST['txt_ci'];
	$dir = $_POST['txt_dir'];
	$email = $_POST['txt_email'];	

		$id = siguienteId($tab, $camp, $idCone);
		$SQL = "insert into duenio (idDue, dir, tel, email, nombre,  apellido, CI) values ('$id', '$dir', '$tel', '$email', '$nom', '$ape', '$ci')";
		$SQL_1 = "insert into gerenteid (idDue) values ('$id')";
        $SQL_2 = "select idUsu from usuarios where CI = $ci";

	if(is_null($nom) == false && no_esta($ci, $idCone)){
		if (mysqli_query ($idCone,$SQL)){
					echo "<P><h4>El Alta se ha realizado con exito para el señor $nom "." "."$ape</h4></P>";
					mysqli_query($idCone, $SQL_1);
					if(es_cli($ci, $idCone)){
                                  $Fil = mysqli_fetch_array(mysqli_query($idCone, $SQL_2));
                                  $idP = $Fil['idUsu'];
                                  $SQL_3 = "insert into cli_prop (idProp, idCli) values ('$id', '$idP')";
                                  mysqli_query($idCone, $SQL_3);
                    }

		}else{
				echo "<P>Se ha producido un error para $nom"." "."$ape</P>";
		}
	}else{
		echo "<script>alert('el dueño que intenta ingresar ya existe');</script>";
	}
	
}elseif ($modo == 2){ // modoficación de dueños
		$idDue=$_POST['txt_idDue'];
		$nom_m = $_POST['txt_nombre'];
		$ape_m =$_POST['txt_ape'];
		$ci_m = $_POST['txt_ci'];
		$tel = $_POST['txt_tel'];
		$dir = $_POST['txt_dir'];
		$email = $_POST['txt_email'];
		
		$SQL_M = "update duenio set dir = '$dir', tel = '$tel', email = '$email', nombre = '$nom_m', apellido = '$ape_m', CI = '$ci_m' where idDue = '$idDue'";
		if(mysqli_query ($idCone,$SQL_M)){
			echo "<P><H2> La Modificación  se ha realizado con exito para: $nom_m"." "."$ape_m</P>";
		}else{
				echo "<P>Se ha producido un error para $nom_m</P>";
		}
}elseif ($modo == 3){ // baja de dueños
	$idDue = $_POST['txt_idDue'];
	$nom = $_POST['txt_nombre'];
	$ape = $_POST['txt_ape'];
	$SQL_B = "delete from duenio where idDue = '$idDue'";
	$SQL_1 = "select CI from duenio where idDue = '$idDue'";
	$res_1 = mysqli_query($idCone, $SQL_1);
	$row_1 = mysqli_fetch_array($res_1);
	$ci = $row_1['CI'];
		if(mysqli_query ($idCone,$SQL_B)){
			echo "<P><H2> El Propietario $nom"." "."$ape se ha eliminado con exito</P>";
		    $SQL_2 = "select idUsu from usuarios where CI = '$ci'";
			$res_2 = mysqli_query($idCone, $SQL_2);
			$row_2 = mysqli_fetch_array($res_2);
			$idUsu = $row_2['idUsu'];
			$SQL_3 = "delete from cli_prop where idCli = '$idUsu'";
			mysqli_query($idCone,$SQL_3);
		}else{
				echo "<P>Se ha producido un error al eliminar el propietrio $nom"." "."$ape</P>";
		}
	
}
?>

</body>
</html>
