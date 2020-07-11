<?php
session_start();
session_register('ses_perfil');
$conn=mysql_connect("localhost","root","");
mysql_select_db("Video",$conn);
$nom=$_POST['txt_nom'];
$psw=$_POST['txt_psw'];

$SQL= "Select Nombre, Psw, IdPerfil
       From Usuarios
	   Where Nombre='$nom' and Psw='$psw'";
$rs=mysql_query($SQL,$conn);
	if(mysql_num_rows($rs)!=0){
		$row=mysql_fetch_array($rs);
		$perfil=$row['IdPerfil'];
		$_SESSION['ses_perfil']=$perfil;
		header("Location: index.php");
	
	}else{
		echo "No existe Usuario";
	}
?>
<br />
<a href="form_post.html">volver</a>
