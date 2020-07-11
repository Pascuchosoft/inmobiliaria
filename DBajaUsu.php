<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Baja de Usuarios</title>
<script>
function confirmaElimina(){
	var resp;
	resp = prompt("Desea eliminar este Usuario ? : (s/n) ","");
	if (resp=="s" || resp=="S"){
		alert("Muchas gracias por enviar el formulario"); 
    	Alta.submit();
	}
}
</script>
</head>

<body>
<?php

require ("conexionVideo.php");
session_start();
$perfil = $_SESSION['ses_perfil'];
$idCone = conexion();
$SQL = "select Nombre, Psw, idPerfil, idUsu from usuarios where idUsu = '$usuario'";
$res = mysql_query($SQL, $idCone);

if ($perfil < 3){
	$row = mysql_fetch_array($res);
	$idusu = $row['idUsu'];
	$nombre = $row['Nombre'];
	$psw = $row['Psw'];
	$perfil = $row['idPerfil'];

	echo "<form name='frm_baja' id='frm_baja' action='DMantUsu01.php' method='post'>";
	echo "idUsuario : <input type='text' name='txt_idusu' id='txt_idusu' size='1' value='$idusu'><br>";
	echo "Nombre : <input type='text' name='txt_nombre' id='txt_nombre' value='$nombre'><br>";
	echo "Password : <input type='text' name='txt_psw' id='txt_psw' value='$psw'><br>";
	echo "idPerfil : <input type='text' name='txt_perfil' id='txt_perfil' value='$perfil'><br>";
	echo "<input type='text' name='txt_modo' id='txt_modo' value='3' style='visibility:hidden'>";
	echo "<input type='button' name='btn_Confirmnar' value='Eliminar' onclick='confirmaElimina();'>";
	echo "</form>";
}


?>
</body>
</html>
