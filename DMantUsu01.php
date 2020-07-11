<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mantenimiento de usuarios</title>
<link rel="stylesheet" href="miestilo.css">

</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h3>volver al índice</h3></a>
</ul>

<h1>Mantenimiento de Usuarios</h1>
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
$camp = "idUsu";

function siguienteId($tabla, $campo,$Cone){
	$sql_1 = "select max($campo) from $tabla";
	$res = mysqli_query($Cone, $sql_1);
	$row = mysqli_fetch_array($res);
	$num = $row[0] + 1;
	return $num;
}

function no_esta($c, $Cone){
	$sql_2 = "select CI, Psw
			  from usuarios
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

function es_due($c,$Cone){
	$sql_2 = "select *
			  from duenio
			  where CI = '$c'";
	$res_2 = mysqli_query($Cone, $sql_2);
	$num = mysqli_num_rows($res_2);
	if ($num == 0){
		$esta = false;
	}else{
		 $esta = true;
	}
	return $esta;
}

if ($modo == 1){

	$nom=$_POST['txt_nomusu'];
	$ape=$_POST['txt_apeusu'];
	$psw=$_POST['txt_psw'];
	$idPerfil=$_POST['cboperfiles'];
	$fecha = $_POST['txt_fecha'];
	$dir = $_POST['txt_dir'];
	$tel = $_POST['txt_tel'];	
	$email = $_POST['txt_email'];
	$ci = $_POST['txt_ci'];	

		$id = siguienteId($tab, $camp, $idCone);
		$SQL = "insert into usuarios (idUsu, Nombre, Apellido, idPerfil, Psw,  fech_nac, dir, tel, email, CI) values ('$id', '$nom', '$ape', '$idPerfil', '$psw', '$fecha', '$dir', '$tel', '$email', '$ci')";
		$SQL_1 = "insert into gerenteid (idUsu) values ('$id')";
	
	if(is_null($nom) == false && no_esta($ci, $idCone)){
		if (mysqli_query ($idCone, $SQL)){
					echo "<P><H2> La Alta se ha realizado con exito para: $nom</P>";
					mysqli_query($idCone, $SQL_1);
					if(es_due($ci, $idCone)){
						$SQL_2 = "select idDue from duenio where CI = '$ci'";
						$res = mysqli_query($idCone, $SQL_2);
						$row = mysqli_fetch_array($res);
						$idDue = $row['idDue'];
						
						$SQL_3 = "select idProp from due_prop where idDue = '$idDue'";
						$res_3 = mysqli_query($idCone, $SQL_3);
						while ($row_3=mysqli_fetch_array($res_3)){
							$idProp = $row_3['idProp'];
							$SQL_4 = "insert into cli_prop (idProp, idCli) values ('$idProp', '$id')";
							mysqli_query($idCone,$SQL_4);
						}
					} 
		}else{
				echo "<P>Se ha producido un error para $nom"." "."$ape</P>";
		}
	}else{
		echo "<script>alert('el usuario que intenta ingresar ya existe');</script>";
	}
	}elseif ($modo == 2){ // modoficación de usuarios
		$idusu=$_POST['txt_idusu'];
		$nom_m = $_POST['txt_nomusu'];
		$ape_m =$_POST['txt_apeusu'];
		$psw_m = $_POST['txt_psw'];
		$idPerfil_m = $_POST['txt_perfil'];
		$fech_nac = $_POST['txt_fecha'];
		$dir = $_POST['txt_dir'];
		$tel = $_POST['txt_tel'];
		$email = $_POST['txt_email'];
		$ci = $_POST['txt_ci'];	
		
		$SQL_M = "update usuarios set Nombre = '$nom_m', Apellido = '$ape_m', Psw = '$psw_m', idPerfil = '$idPerfil_m', fech_nac = '$fech_nac', dir = '$dir', tel = $tel, email = '$email', CI = '$ci' where idUsu = '$idusu'";
		if(mysqli_query ($idCone,$SQL_M)){
			echo "<P><H2> La Modificación  se ha realizado con exito para: $nom_m"." "."$ape_m</P>";
		}else{
				echo "<P>Se ha producido un error para $nom_m</P>";
		}
	}elseif ($modo == 3){ // baja de usuarios
		$idusu=$_POST['txt_idusu'];
		$nom_b = $_POST['txt_nombre'];
		$ape_b = $_POST['txt_ape'];
		$SQL_B = "delete from usuarios where idUsu = '$idusu'";
		if(mysqli_query ($idCone,$SQL_B)){
			echo "<P><H2> La Baja se ha realizado con exito para: $nom_b"." "."$ape_b</P>";
			$SQ = "delete from cli_prop where idCli = '$idusu'";
			mysqli_query ($idCone,$SQ);
		}else{
				echo "<P>Se ha producido un error para $nom_m</P>";
		}
	}else{
		echo "<a href='form_post.html'>Debe registrase como usuario</a>";
	}


mysqli_close($idCone);

?>
</body>
</html>
