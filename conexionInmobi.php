<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Conexion Inmobiliaria</title>
</head>

<body>
<?php

//  Fichero: conexionInmobi.php

function conectarBD(){
        $server = "localhost";
        $usuario = "root";
        $pass = "";
        $BD = "inmobili";
        //variable que guarda la conexión de la base de datos
        $conexion = mysqli_connect($server, $usuario, $pass, $BD);
        //Comprobamos si la conexión ha tenido exito
        if(!$conexion){echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
        }
        //devolvemos el objeto de conexión para usarlo en las consultas
        return $conexion;
}

/*Desconectar la conexion a la base de datos*/
function desconectarBD($conexion){
        //Cierra la conexión y guarda el estado de la operación en una variable
        $close = mysqli_close($conexion);
        //Comprobamos si se ha cerrado la conexión correctamente
        if($close){
           echo 'La desconexion de la base de datos se ha hecho satisfactoriamente<br>';
        }else{
           echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
        }
        //devuelve el estado del cierre de conexión
        return $close;
}
 ?>
</body>
</html>
