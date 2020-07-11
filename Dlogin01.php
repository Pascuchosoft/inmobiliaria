<link rel="stylesheet" href="miestilo.css">
</head>

<body>
<h1>Ingreso de Usuario</h1>
<hr />
<br />

<?php
require ("conexionInmobi.php");
session_start();
//session_register('ses_perfil');
//session_register('ses_idUsu');
$idCone = conectarBD();

$ip = $_SERVER['REMOTE_ADDR'];
$consul = "select * from entradas where ip = '$ip'";
$result = mysqli_query($idCone,$consul);
if(mysqli_num_rows($result) == 0){
	$insertar = "insert into entradas (idEntrada, ip) values ('null', '$ip')";
	$res = mysqli_query($idCone,$insertar);
}

$nom=$_POST['txt_nom'];
$psw=$_POST['txt_psw'];

$SQL= "Select Nombre, Psw, IdPerfil, idUsu
       From usuarios
	   Where Nombre='$nom' and Psw='$psw'";
$rs=mysqli_query($idCone,$SQL);
	if(mysqli_num_rows($rs)!=0){
		$row=mysqli_fetch_array($rs);
		$perfil=$row['IdPerfil'];
		$idUsu = $row['idUsu'];
		$_SESSION['ses_perfil']=$perfil;
		$_SESSION['ses_idUsu']=$idUsu;
		header("Location: index.php");
	
	}else{
		echo "<h3>No existe Usuario</h3><br>";
		echo "<a href='AltaUsuario.php'>Para registrase como usuario siga este link</a><br>";
		$_SESSION['ses_perfil']=5;
	}
	
mysqli_free_result ($rs);
mysqli_close($idCone);

?>
<br />
<a href="form_post.html">Si ya está registrado como usuario, siga este link</a>
