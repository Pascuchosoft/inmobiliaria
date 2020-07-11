<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Baja de Usuarios</title>
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
</ul>

<h1>Baja de Usuario</h1>
<hr />
<br />
<?php

include ("conexionInmobi.php");
session_start();
$perfil = $_SESSION['ses_perfil'];
$idCone = conectarBD();
$usuario = $_GET["usuario"];
$SQL = "select Nombre, Apellido, CI, Psw, idPerfil, idUsu from usuarios where idUsu = '$usuario'";
$res = mysqli_query($idCone,$SQL);

if ($perfil < 3){
	$row = mysqli_fetch_array($res);
	$idusu = $row['idUsu'];
	$nombre = $row['Nombre'];
	$apellido = $row['Apellido'];
	$psw = $row['Psw'];
	$perfil = $row['idPerfil'];
	$ci = $row['CI'];

	echo "<form name='frm_baja' id='frm_baja' action='DMantUsu01.php' method='post'>";
	echo "<table border='1' align='left' width='50%'>";
	echo "<tr><td>";
	echo "idUsuario : </td><td><input type='text' name='txt_idusu' id='txt_idusu' size='1' value='$idusu'></td></tr>";
	echo "<tr><td>Nombre : </td><td><input type='text' name='txt_nombre' id='txt_nombre' value='$nombre'></td></tr>";
	echo "<tr><td>Apellido : </td><td><input type='text' name='txt_ape' id='txt_ape' value='$apellido'></td></tr>";
	echo "<tr><td>C.I. : </td><td><input type='text' name='txt_ci' id='txt_ci' value='$ci'></td></tr>";
	echo "<tr><td>Password : </td><td><input type='text' name='txt_psw' id='txt_psw' value='$psw'></td></tr>";
	echo "<tr><td>idPerfil : </td><td><input type='text' name='txt_perfil' id='txt_perfil' value='$perfil'></td></tr>";
	echo "<input type='text' name='txt_modo' id='txt_modo' value='3' style='visibility:hidden'></table>";
	echo "</br></br></br></br></br></br></br></br></br></br></br>";
	echo "<input type='button' name='btn_Confirmnar' value='Eliminar' onclick='confirmaElimina();'>";
	echo "</form>";
}

?>

</body>
</html>
