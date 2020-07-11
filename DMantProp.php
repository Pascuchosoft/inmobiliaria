<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DMantDue.php</title>
<link rel="stylesheet" href="miestilo.css">
</head>

<body>
<ul class='navbar'>
	<li><a href='index.php' align='center'><h3>volver al índice</h3></a>
</ul>

<h1>Mantenimiento de Propiedades</h1>
<hr />
<br />

<?php
include ("conexionInmobi.php");
$idCone = conectarBD();

$modo = $_POST['txt_modo'];


function siguienteId($tabla, $campo, $Cone){
	$sql_1 = "select max($campo) from $tabla";
	$res = mysqli_query($Cone, $sql_1);
	$row = mysqli_fetch_array($res);
	$num = $row[0] + 1;
	return $num;
}

function no_esta($d,$Cone){
	$sql_2 = "select dir
			  from propiedades
			  where dir = '$d'";
	$res_2 = mysqli_query($Cone, $sql_2);
	$num = mysqli_num_rows($res_2);
	if ($num == 0){
		$noesta = true;
	}else{
		 $noesta = false;
	}
	return $noesta;
}

function no_esta_due($ci,$Cone){
	$sql_z = "select CI
			  from duenio
			  where CI = '$ci'";
	$res_z = mysqli_query($Cone, $sql_z);
	$num_1 = mysqli_num_rows($res_z);
	if ($num_1 == 0){
		$noesta_1 = true;
	}else{
		 $noesta_1 = false;
	}
	return $noesta_1;
}

function es_cli($c,$Cone){
	$sql_2 = "select *
			  from usuarios
			  where CI = '$c'";
	$res_2 = mysqli_query($Cone, $sql_2);
	$num = mysqli_num_rows($res_2);
	if ($num == 0){
		$esta = false;
	}else{
		 $esta = true;
	}
	return $esta;
}

if ($modo == 1){

$tab = "gerenteid";
$camp = "idProp";

	$tipo= $_POST['lst_tipo'];
	$opera = $_POST['lst_opera'];
	$zona = $_POST['lst_zona'];
	$dir = $_POST['txt_dir'];
	$precio = $_POST['txt_precio'];	
	$dormi = $_POST['txt_dormi'];
	$idDue = $_POST['txt_idDue'];
//comodidades	
	$jardin = $_POST['txt_jardin'];
	$aire = $_POST['txt_aire'];
	$metros = $_POST['txt_metros'];	
	$garaje = $_POST['txt_garaje'];
	$alarma = $_POST['txt_alarma'];
	$parri = $_POST['txt_parri'];
	$lenia = $_POST['txt_lenia'];
	$patio = $_POST['txt_patio'];				
	
		$idProp = siguienteId($tab, $camp, $idCone);
		$SQL = "insert into propiedades (idProp, idDue, dir, precio, idZona, idTipo, idOpera, dormitorios) values ('$idProp', '$idDue', '$dir', '$precio', '$zona', '$tipo', '$opera', '$dormi')";
		$SQL_1 = "insert into gerenteid (idProp) values ('$idProp')";
		$SQL_2 = "insert into due_prop (idProp, idDue) values ('$idProp', '$idDue')";
		$SQL_3 = "select CI from duenio where idDue = '$idDue'";
		
	if(is_null($dir) == false && no_esta($dir,$idCone)){
		if (mysqli_query ($idCone,$SQL)){
					echo "<P><H2> La Alta se ha realizado con exito para: $dir</P>";
					echo "<a href='subeArchivo.php?idProp=$idProp&modo=1'>Para cargar imagen siga estelink</a>";
					mysqli_query($idCone,$SQL_1);
					mysqli_query($idCone,$SQL_2);
					
			$res_0 = mysqli_query($idCone, $SQL_3);
			$row_0 = mysqli_fetch_array($res_0);
			$ci = $row_0['CI'];
			$SQL_4 = "select idUsu from usuarios where CI = '$ci'";
			$res_4 = mysqli_query($idCone, $SQL_4); // búsqueda de idUsu del dueño si resulta ser cliente
			$row_4 = mysqli_fetch_array($res_4);
			$idUsu = $row_4['idUsu'];
			if(es_cli($ci,$idCone)){
				$sq = "insert into cli_prop (idProp, idCli) values ('$idProp', '$idUsu')";
				mysqli_query($idCone,$sq);
			}
			
		}else{
				echo "<P>Se ha producido un error para $dir</P>";
		}
	}else{
		echo "<script>alert('la propiedad que intenta ingresar ya existe');</script>";
	}
// insersión de Comodidades :
	if($jardin!=''){
		$SQL_J = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '4', '$jardin')";
		mysqli_query ($idCone,$SQL_J);
	}
	if($aire!=''){
		$SQL_A = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '5', '$aire')";
		mysqli_query ($idCone,$SQL_A);
	}
	if($metros!=''){
		$SQL_M = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '6', '$metros')";
		mysqli_query ($idCone,$SQL_M);
	}
	if($garaje!=''){
		$SQL_G = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '2', '$garaje')";
		mysqli_query ($idCone,$SQL_G);
	}
	if($alarma!=''){
		$SQL_AL = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '7', '$alarma')";
		mysqli_query ($idCone,$SQL_AL);
	}
	if($parri!=''){
		$SQL_P = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '8', '$parri')";
		mysqli_query ($idCone,$SQL_P);
	}
	if($lenia!=''){
		$SQL_L = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '9', '$lenia')";
		mysqli_query ($idCone,$SQL_L);
	}
	if($patio!=''){
		$SQL_PAT = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '3', '$patio')";
		mysqli_query ($idCone,$SQL_PAT);
	}
	$SQL_D = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '1', '$dormi')";
	mysqli_query ($idCone,$SQL_D);
}

// Alta de Dueño + Propiedad :

if ($modo == 2){
	
$tab = "gerenteid";
$campDue = "idDue";
$camp = "idProp";
		
//datos del Dueño
	$nombre = $_POST['txt_nomdue'];
	$apellido = $_POST['txt_apedue'];
	$tel = $_POST['txt_tel'];
	$email = $_POST['txt_email'];
	$ci = $_POST['txt_ci'];
	$dirdue = $_POST['txt_dirdue'];
	
//datos de la propiedad
	$tipo= $_POST['lst_tipo'];
	$opera = $_POST['lst_opera'];
	$zona = $_POST['lst_zona'];
	$dir = $_POST['txt_dir'];
	$precio = $_POST['txt_precio'];	
	$dormi = $_POST['txt_dormi'];
	
//datos de las comodidades
	$jardin = $_POST['txt_jardin'];
	$aire = $_POST['txt_aire'];
	$metros = $_POST['txt_metros'];	
	$garaje = $_POST['txt_garaje'];
	$alarma = $_POST['txt_alarma'];
	$parri = $_POST['txt_parri'];
	$lenia = $_POST['txt_lenia'];
	$patio = $_POST['txt_patio'];
	
	$idProp = siguienteId($tab, $camp, $idCone);
	$idDue = siguienteId($tab, $campDue, $idCone);
	$SQL = "insert into propiedades (idProp, dir, precio, idZona, idTipo, idOpera, dormitorios, idDue) values ('$idProp', '$dir', '$precio', '$zona', '$tipo', '$opera', '$dormi', '$idDue')";
	$SQL_1 = "insert into gerenteid (idProp, idDue) values ('$idProp', '$idDue')";
	$SQL_2 = "insert into due_prop (idProp, idDue) values ('$idProp', '$idDue')";
	$SQL_3 = "insert into duenio (idDue, dir, tel, email, nombre, apellido, CI) values ('$idDue', '$dirdue', '$tel', '$email', '$nombre', '$apellido', '$ci')";
	$SQL_4 = "select idUsu from usuarios where CI = '$ci'";
	
	if(is_null($dir) == false && no_esta($dir,$idCone) && no_esta_due($ci,$idCone)){
		if (mysqli_query ($idCone,$SQL)){
					echo "<P><H2> El Alta se ha realizado con exito para el inmueble ubicado en $dir</P>";
					echo "<P>El Alta se ha realizado con exito para el señor $nombre "." "."$apellido"." dueño del inmueble</p>";
					mysqli_query($idCone,$SQL_1);
					mysqli_query($idCone,$SQL_2);
					mysqli_query($idCone,$SQL_3);
					
			$res = mysqli_query($idCone, $SQL_4); // búsqueda de idUsu del dueño si resulta ser cliente
			$row = mysqli_fetch_array($res);
			$idUsu = $row['idUsu'];
			if(es_cli($idUsu, $idCone)){
				$sq = "insert into cli_prop (idProp, idCli) values ('$idProp', '$idUsu')";
				mysqli_query($idCone,$sq);
			}
			
		}else{
				echo "<P>Se ha producido un error para $dir</P>";
		}
	}else{
		echo "<script>alert('la propiedad que intenta ingresar ya existe o ya existe el dueño');</script>";
	}
	
// insersión de Comodidades : (validar en IAltaPropiedad.php que estos datos sean todos numéricos
	if($jardin!=''){
		$SQL_J = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '4', '$jardin')";
		mysqli_query ($idCone,$SQL_J);
	}
	if($aire!=''){
		$SQL_A = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '5', '$aire')";
		mysqli_query ($idCone,$SQL_A);
	}
	if($metros!=''){
		$SQL_M = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '6', '$metros')";
		mysqli_query ($idCone,$SQL_M);
	}
	if($garaje!=''){
		$SQL_G = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '2', '$garaje')";
		mysqli_query ($idCone,$SQL_G);
	}
	if($alarma!=''){
		$SQL_AL = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '7', '$alarma')";
		mysqli_query ($idCone,$SQL_AL);
	}
	if($parri!=''){
		$SQL_P = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '8', '$parri')";
		mysqli_query ($idCone,$SQL_P);
	}
	if($lenia!=''){
		$SQL_L = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '9', '$lenia')";
		mysqli_query ($idCone,$SQL_L);
	}
	if($patio!=''){
		$SQL_PAT = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '3', '$patio')";
		mysqli_query ($idCone,$SQL_PAT);
	}
	$SQL_D = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '1', '$dormi')";
	mysqli_query ($idCone,$SQL_D);
}

if($modo == 3){
	$idProp = $_POST['txt_idProp'];
	$SQL_B = "delete from propiedades where idProp = '$idProp'";
	$SQL_B2 = "delete from prop_comodi where idProp = '$idProp'";
	$SQL_B3 = "delete from cli_prop where idProp = '$idProp'";
		if(mysqli_query ($idCone,$SQL_B) && mysqli_query ($idCone,$SQL_B2)){
			echo "<P><H2> El inmueble se ha eliminado con exito</P>";
			mysqli_query($idCone,$SQL_B3);
		}else{
				echo "<P>Se ha producido un error al eliminar el inmueble</P>";
		}
}

if($modo == 4){
	$idProp = $_POST['txt_idProp'];
	$idDue = $_POST['txt_idDue'];
	$dir = $_POST['txt_dir'];
	$dormi = $_POST['txt_dormi'];
	$tipo= $_POST['lst_tipo'];
	$opera = $_POST['lst_opera'];
	$zona = $_POST['lst_zona'];
	$precio = $_POST['txt_precio'];

//comodidades	
	$jardin = $_POST['txt_jardin'];
	$aire = $_POST['txt_aire'];
	$metros = $_POST['txt_metros'];	
	$garaje = $_POST['txt_garaje'];
	$alarma = $_POST['txt_alarma'];
	$parri = $_POST['txt_parri'];
	$lenia = $_POST['txt_lenia'];
	$patio = $_POST['txt_patio'];				
	
if($tipo!=0 && $opera != 0 && $zona != 0){
	$SQL_M = "update propiedades set idDue = '$idDue', dir = '$dir', precio = '$precio', idZona = '$zona', idTipo = '$tipo', idOpera = '$opera', dormitorios = '$dormi' where idProp = '$idProp'";
			if(mysqli_query ($idCone,$SQL_M)){
                   if(es_cli($idUsu, $idCone)){
				       $sq = "insert into cli_prop (idProp, idCli) values ('$idProp', '$idUsu')";
                       mysqli_query($idCone,$sq);
                   }
				echo "<P><H2> La Modificación se ha realizado con exito </P>";
			}else{
					echo $SQL_M;
					echo "<P>Se ha producido un error en la modificación  del inmueble</P>";
			}
}else{
	$SQL_M1 = "update propiedades set idDue = '$idDue', dir = '$dir', precio = '$precio', dormitorios = '$dormi' where idProp = '$idProp'";
				if(mysqli_query ($idCone,$SQL_M1)){
				echo "<P><H2> La Modificación se ha realizado con exito </P>";
				}else{
					echo $SQL_M1;
					echo "<P>Se ha producido un error en la modificación  del inmueble</P>";
				}
}
// modificación de Comodidades : (validar en IAltaPropiedad.php que estos datos sean todos numéricos
	if($jardin!=''){
		$SQL_J = "update prop_comodi set cant = $jardin where idProp = '$idProp' and idComo = '4'";
		$SQL_J1 = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '4', '$jardin')";
		mysqli_query ($idCone,$SQL_J);
		mysqli_query ($idCone,$SQL_J1);
	}
	if($aire!=''){
		$SQL_A = "update prop_comodi set cant = $aire where idProp = '$idProp' and idComo = '5'";
		$SQL_A1 = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '5', '$aire')";
		mysqli_query ($idCone,$SQL_A);
		mysqli_query ($idCone,$SQL_A1);
	}
	if($metros!=''){
		$SQL_M = "update prop_comodi set cant = $metros where idProp = '$idProp' and idComo = '6'";
		$SQL_M1 = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '6', '$metros')";
		mysqli_query ($idCone,$SQL_M);
		mysqli_query ($idCone,$SQL_M1);
	}
	if($garaje!=''){
		$SQL_G = "update prop_comodi set  cant = '$garaje' where idProp = '$idProp' and idComo = '2'";
		$SQL_G1 = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '2', '$garaje')";
		mysqli_query($idCone,$SQL_G1);
		mysqli_query($idCone,$SQL_G);
		
	}
	if($alarma!=''){
		$SQL_AL = "update prop_comodi set  cant = '$alarma' where idProp = '$idProp' and idComo = '7'";
		$SQL_AL1 = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '7', '$alarma')";
		mysqli_query ($idCone,$SQL_AL);
		mysqli_query ($idCone,$SQL_AL1);
	}
	if($parri!=''){
		$SQL_P = "update prop_comodi set  cant = '$parri' where idProp = '$idProp' and idComo = '8'";
		$SQL_P1 = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '8', '$parri')";
		mysqli_query ($idCone,$SQL_P);
		mysqli_query ($idCone,$SQL_P1);
	}
	if($lenia!=''){
		$SQL_L = "update prop_comodi set  cant = '$lenia' where idProp = '$idProp' and idComo = '9'";
		$SQL_L1 = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '9', '$lenia')";
		mysqli_query ($idCone,$SQL_L);
		mysqli_query ($idCone,$SQL_L1);
	}
	if($patio!=''){
		$SQL_PAT = "update prop_comodi set  cant = '$patio' where idProp = '$idProp' and idComo = '3'";
		$SQL_PAT1 = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '3', '$patio')";
		mysqli_query ($idCone,$SQL_PAT);
		mysqli_query ($idCone,$SQL_PAT1);
	}
	$SQL_D = "update prop_comodi set  cant = '$dormi' where idProp = '$idProp' and idComo = '1'";
	$SQL_D1 = "insert into prop_comodi (idProp, idComo, cant) values ('$idProp', '1', '$dormi')";
	mysqli_query ($idCone,$SQL_D);
	mysqli_query ($idCone,$SQL_D1);
}
?>
</body>
</html>
