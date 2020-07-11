<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>I Baja de Dueño</title>
<link rel="stylesheet" href="miestilo.css">

<script>
function confirmaElimina(){
	var resp;
	resp = prompt("Desea eliminar este Usuario ? : (s/n) ","");
	if (resp=="s" || resp=="S"){
		alert("Muchas gracias por enviar el formulario"); 
    	frm_baja.submit();
	}
}
</script>
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h4>volver al índice</h4></a>
	<li><a href='ListadoDuenios.php' align='center'><h4>volver al listado</h4></a>
</ul>

<h1>Baja de Usuario</h1>
<hr />
<br />

<?php

include ("conexionInmobi.php");
session_start();
$perfil = $_SESSION['ses_perfil'];
$idCone = conectarBD();
$idDue = $_GET["idDue"];
$SQL = "select nombre, apellido, CI, tel, dir, email
	    from duenio 
		where idDue = '$idDue'";
$res = mysqli_query($idCone,$SQL );

function no_esta($id, $Cone){
	$sql_2 = "select idDue
			  from propiedades
			  where idDue = '$id'";
	$res_2 = mysqli_query($Cone, $sql_2);
	$num = mysqli_num_rows($res_2);
	if ($num == 0){
		$noesta = true;
	}else{
		 $noesta = false;
	}
	return $noesta;
}


if ($perfil < 3){
	if(no_esta($idDue,$idCone)){
		$row = mysqli_fetch_array($res);
		$nombre = $row['nombre'];
		$ci = $row['CI'];
		$apellido = $row['apellido'];
		$tel = $row['tel'];
		$dir = $row['dir'];
		$email = $row['email'];
		
	echo "<form name='frm_baja' id='frm_baja' action='DMantDuenio.php' method='post'>";
	echo "<table border='1' align='left' width='50%'>";
	echo "<tr><td>";
	echo "idDuenio : </td><td><input type='text' name='txt_idDue' id='txt_idDue' size='1' value='$idDue'></td></tr>";
	echo "<tr><td>Nombre : </td><td><input type='text' name='txt_nombre' id='txt_nombre' value='$nombre'></td></tr>";
	echo "<tr><td>Apellido : </td><td><input type='text' name='txt_ape' id='txt_ape' value='$apellido'></td></tr>";
	echo "<tr><td>C.I. : </td><td><input type='text' name='txt_ci' id='txt_ci' value='$ci'></td></tr>";
	echo "<tr><td>Tel : </td><td><input type='text' name='txt_tel' id='txt_tel' value='$tel'></td></tr>";
	echo "<tr><td>Dir : </td><td><input type='text' name='txt_dir' id='txt_dir' value='$dir'></td></tr>";
	echo "<tr><td>email : </td><td><input type='text' name='txt_email' id='txt_email' value='$email'></td></tr>";
	echo "<input type='text' name='txt_modo' id='txt_modo' value='3' style='visibility:hidden'></table>";
	echo "</br></br></br></br></br></br></br></br></br></br></br></br></br></br>";
	echo "<input type='button' name='btn_Confirmnar' value='Eliminar' onclick='confirmaElimina();'>";
	echo "</form>";
	}else{
		echo "el dueño que pretende eliminar tiene propiedades asignadas";
	}
}
?>
</body>
</html>
