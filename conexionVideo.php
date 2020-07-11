<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Conexión Video</title>
</head>

<body>
<?php

//  Fichero: conexionVideo.php

function conexion()
 {
  $host = "127.0.0.1";
  $usuario = "root";
  $clave = "";
  $BaseDeDato = "video";

  $idCone = mysql_connect ($host, $usuario) or
           die ("Error conectando al servidor $host con el
                 nombre de usuario $usuario");

  mysql_select_db ($BaseDeDato, $idCone) or
           die ("Error seleccionando la base de datos");
  return $idCone;
 }
 ?> 
</body>
</html>
