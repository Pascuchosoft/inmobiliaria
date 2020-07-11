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
	if ($modo==2){
		$SQL_M = "select Nombre, Psw, idPerfil from usuarios where idUsu = '$usuario'";
		$res_m = mysql_db_query("video", $SQL_M);
		echo '<select name ="cboperfiles" id="cboperfiles">';
			
			
			
			echo "<form name='frm_alta' id='frm_alta' method='post' action='DMantUsu01.php'>";
			$sql = "select nomperfil, idPerfil from perfil";
			$res = mysql_db_query("video", $sql);
			echo '<select name ="cboperfiles" id="cboperfiles">';
			while ($row = mysql_fetch_array($res)){
				//echo "$row['idPerfil']";
				echo "<option value=".$row["idPerfil"].">".$row["nomperfil"]."</option>";
			}
			echo "</select></br>";
			echo "Nombre : <input type='text' name='txt_nomusu' id='txt_nomusu'></br>";
			echo "Psw : <input type='password' name='txt_psw' id='txt_psw'></br>";
			echo "<input type='submit' name='btn_Enviar' value='Enviar'>";
			echo "<input type='text' name='txt_modo' id='txt_modo' value='1' style='visibility:hidden'>";
			echo "</form>";
}else{
	echo "<a href='form_post.html'>debe registrarse como usuario</a>";
}
?>
</body>
</html>
