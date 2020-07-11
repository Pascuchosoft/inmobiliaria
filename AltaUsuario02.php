<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alta de Usuarios</title>
</head>

<body>
<?php
session_start();
session_register('ses_perfil');
$conn=mysql_connect("localhost","root","");
mysql_select_db("video",$conn);
if ($_SESSION['ses_perfil']<=4){
	$sql = "select nomperfil, idPerfil from perfiles";
	$res = mysql_db_query("video", $sql);
	while ($row = mysql_fetch_array($res)){
		$buff=$row['idPerfil'];
		echo "$buff";
	}
}else{
	echo "<a href='form_post.html'>debe registrarse como usuario</a>";
}
?>
</body>
</html>
