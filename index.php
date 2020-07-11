<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>índice del sitio</title>
<link rel="stylesheet" href="miestilo.css">

</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<?php
require ("conexionInmobi.php");
$idCone = conectarBD();
session_start();
//session_register('ses_perfil');
$buff=$_SESSION['ses_perfil'];
if($buff == 1){
	$texto = "Bienvenido Administrador";
	echo "<ul class='navbar'>";
	echo "<li><a href='crit_ordena.php'>Listado de Propiedades</a>";
	echo "<li><a href='Listado01.php'>Listado de Usuarios</a>";
	echo "<li><a href='ListadoDuenios.php'>Listado de Dueños</a>";
	echo "<li><a href='ListadoVisitas.php'>Listado de Visitas</a>";
	echo "<li><a href='ListadoCliProp.php'>Listado de Clientes Propietarios</a>";
	echo "<li><a href='IPropComercia.php'>Propiedades Comercializadas</a>";
	echo "<li><a href='AltaUsuario.php'>Alta de Usuarios</a>";
	echo "<li><a href='IAltaDuenio.php'>Alta de Dueños</a>";
	echo "<li><a href='DBuscarDue-List.php'>Alta de Propiedades</a>";
	echo "<li><a href='Listado01.php'>Modificación de Usuarios</a>";
	echo "<li><a href='Listado01.php'>Baja de Usuarios</a>";
	echo "<li><a href='CerrarSesion.php'>Cerrar Sesión</a>";
	echo "</ul>";
}elseif($buff == 2){
	$texto= "Bienvenido Vendedor";
	echo "<ul class='navbar'>";
	echo "<li><a href='crit_ordena.php'>Listado de Propiedades</a>";
	echo "<li><a href='Listado01.php'>Listado de Usuarios</a>";
	echo "<li><a href='ListadoDuenios.php'>Listado de Dueños</a>";
	echo "<li><a href='ListadoCliProp.php'>Listado de Clientes Propietarios</a>";
	echo "<li><a href='IPropComercia.php'>Propiedades Comercializadas</a>";
	echo "<li><a href='AltaUsuario.php'>Alta de Usuarios</a>";
	echo "<li><a href='IAltaDuenio.php'>Alta de Dueños</a>";
	echo "<li><a href='DBuscarDue-List.php'>Alta de Propiedades</a>";
	echo "<li><a href='Listado01.php'>Modificación de Usuarios</a>";
	echo "<li><a href='Listado01.php'>Baja de Usuarios</a>";
	echo "<li><a href='CerrarSesion.php'>Cerrar Sesión</a>";

	echo "</ul>";
}elseif($buff == 3 || $buff == 4) {
	$texto= "Bienvenido Cliente";
	echo "<ul class='navbar'>";
	echo "<li><a href='AltaUsuario.php'>Alta de Usuarios</a>";
	//echo "<li><a href='DBuscarDue-List.php'>Alta de Propiedades</a>";
	//echo "<li><a href='IBuscaDue.php'>Alta de Propiedades</a>";
	echo "<li><a href='crit_ordena.php'>Listado de Propiedades</a>";
	echo "<li><a href='listadoMisVisitas.php'>Propiedades a visitar</a>";
	echo "<li><a href='CerrarSesion.php'>Cerrar Sesión</a>";
	echo "</ul>";
}else{
	header("Location: form_post.html");
}
echo "<h1>$texto</h1>";
echo "<hr>";
echo "<br>";

mysqli_close($idCone);

?>
</body>
</html>
