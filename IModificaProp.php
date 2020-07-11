<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>I Modificación</title>
<link rel="stylesheet" href="miestilo.css">
<script>
function valida_envia(){
	if (frm_mod.txt_id.value.length==0 || frm_mod.txt_dir.value.length==0 || isNaN(frm_mod.txt_dormi.value) || isNaN(frm_mod.txt_garaje.value) || isNaN(frm_mod.txt_patio.value) || isNaN(frm_mod.txt_jardin.value) || isNaN(frm_mod.txt_aire.value) || isNaN(frm_mod.txt_metros.value) || isNaN(frm_mod.txt_alarma.value) || isNaN(frm_mod.txt_parri.value) || isNaN(frm_mod.txt_lenia.value) || isNaN(frm_mod.txt_precio.value)){
       alert("Verifique los datos ingresados"); 
       frm_alta.txt_dir.focus();
       return 0; 
	}else{
		alert("Muchas gracias por enviar el formulario"); 
    	frm_alta.submit();
	}				
}

function open_popup(file,window){
	popup_dueño=open(file,window,'resizable=no,width=900,height=500');
}

</script>
</head>
<img width="800" height="100" src="imagenes_prop/realty-logo.jpg" />

<body>
<ul class='navbar'>
	<li><a href='index.php'><h4 align='center'>volver al índice</h4></a>
	<li><a href='paginado.php' align='center'><h4>volver al Listado</h4></a>
</ul>

<h1>Alta de Propiedad</h1>
<hr />
<br />
<?php
require ("conexionInmobi.php");
session_start();
$perfil = $_SESSION['ses_perfil'];
$idCone = conectarBD();
$idProp = $_GET["idProp"];
$SQL = "select p.dir, d.nombre, d.apellido, d.idDue, p.precio, z.barrio, t.tipo, o.operacion, p.dormitorios
		from propiedades p, duenio d, zona z, tipo t, operacion o
		where p.idDue = d.idDue and p.idZona = z.idZona and p.idTipo = t.idTipo and p.idOpera = o.idOpera and idProp = '$idProp'";
		
$res = mysqli_query($idCone,$SQL);

function hay($idcomo, $idPr, $Cone){
	$sql_2 = "select idComo
			  from prop_comodi
			  where idProp = '$idPr' and idComo = '$idcomo'";
	$res_2 = mysqli_query($Cone, $sql_2);
	$num = mysqli_num_rows($res_2);
	if ($num == 0){
		$esta = false;
	}else{
		 $esta = true;
	}
	return $esta;
}

// seteo de comodidades

if(hay(2,$idProp,$idCone)){
	$SQL_G = "select cant from prop_comodi where idComo = '2' and idProp = '$idProp'";
	$res_g = mysqli_query($idCone,$SQL_G);
	$row_g = mysqli_fetch_array($res_g);
	$garaje = $row_g['cant'];
}else{
	$garaje = "";
}

if(hay(3,$idProp,$idCone)){
	$SQL_P = "select cant from prop_comodi where idComo = '3' and idProp = '$idProp'";
	$res_p = mysqli_query($idCone,$SQL_P);
	$row_p = mysqli_fetch_array($res_p);
	$patio = $row_p['cant'];
}else{
	$patio = "";
}

if(hay(4,$idProp,$idCone)){
	$SQL_J = "select cant from prop_comodi where idComo = '4' and idProp = '$idProp'";
	$res_j = mysqli_query($idCone,$SQL_J);
	$row_j = mysqli_fetch_array($res_j);
	$jardin = $row_j['cant'];
}else{
	$jardin = "";
}

if(hay(5,$idProp,$idCone)){
	$SQL_A = "select cant from prop_comodi where idComo = '5' and idProp = '$idProp'";
	$res_a = mysqli_query($idCone,$SQL_A);
	$row_a = mysqli_fetch_array($res_a);
	$aire = $row_a['cant'];
}else{
	$aire = "";
}

if(hay(6,$idProp,$idCone)){
	$SQL_M = "select cant from prop_comodi where idComo = '6' and idProp = '$idProp'";
	$res_m = mysqli_query($idCone,$SQL_M);
	$row_m = mysqli_fetch_array($res_m);
	$metros = $row_m['cant'];
}else{
	$metros = "";
}

if(hay(7,$idProp,$idCone)){
	$SQL_AL = "select cant from prop_comodi where idComo = '7' and idProp = '$idProp'";
	$res_al = mysqli_query($idCone,$SQL_AL);
	$row_al = mysqli_fetch_array($res_al);
	$alarma = $row_al['cant'];
}else{
	$alarma = "";
}

if(hay(8,$idProp,$idCone)){
	$SQL_PA = "select cant from prop_comodi where idComo = '8' and idProp = '$idProp'";
	$res_pa = mysqli_query($idCone,$SQL_PA);
	$row_pa = mysqli_fetch_array($res_pa);
	$parrillero = $row_pa['cant'];
}else{
	$parrillero = "";
}

if(hay(9,$idProp,$idCone)){
	$SQL_E = "select cant from prop_comodi where idComo = '9' and idProp = '$idProp'";
	$res_e = mysqli_query($idCone,$SQL_E);
	$row_e = mysqli_fetch_array($res_e);
	$estufa = $row_e['cant'];
}else{
	$estufa = "";
}

if ($perfil < 3){
	$row = mysqli_fetch_array($res);
	$idDue = $row['idDue'];
	$dir = $row['dir'];
	$nombre = $row['nombre'];
	$apellido = $row['apellido'];
	$precio = $row['precio'];
	$barrio = $row['barrio'];
	$tipo = $row['tipo'];
	$opera = $row['operacion'];
	$dormi = $row['dormitorios'];
	
	echo "<form name='frm_mod' id='frm_mod' action='DMantProp.php' method='post'>";
	echo "<table border='1' align='left' width='30%'>";
	echo "<tr>";
	echo "<td>id : </td>";
	echo "<td><input type='text' name='txt_id' id='txt_id' value='$idProp'></td></tr>";
	echo "<tr>";
	echo "<td>Dir : </td>";
	echo "<td><input type='text' name='txt_dir' id='txt_dir' value='$dir'></td></tr>";
	echo "<tr>";
	echo "<td>Nombre : </td>";
	echo "<td><input type='text' name='txt_nombre' id='txt_nombre' value='$nombre'></td></tr>";
	echo "<tr>";
	echo "<td>Apellido : </td>";
	echo "<td><input type='text' name='txt_ape' id='txt_ape' value='$apellido'></td></tr>";
	echo "<tr>";
	echo "<td>Precio : </td>";
	echo "<td><input type='text' name='txt_precio' id='txt_precio' value='$precio'></td></tr>";
	echo "<td>Barrio : </td>";
	echo "<td><input type='text' name='txt_barrio' id='txt_bario' value='$barrio'></td></tr>";
	echo "<td>Tipo : </td>";
	echo "<td><input type='text' name='txt_tipo' id='txt_tipo' value='$tipo'></td></tr>";
	echo "<td>Opera : </td>";
	echo "<td><input type='text' name='txt_opera' id='txt_opera' value='$opera'></td></tr>";
	echo "<td>dormitorios : </td>";
	echo "<td><input type='text' name='txt_dormi' id='txt_dormi' value='$dormi'></td></tr>";
	echo "</table>";
?>
<table border='1' bordercolor="#F9EDAC" align='left' width='30%'>
	<tr><td>Tipo Inmueble : </td><td><select name="lst_tipo" id="lst_tipo">
<option value="0">---</option>
<option value="1" >Casa</option>
<option value="2">Apartamento</option>
<option value="3">Local</option>
<option value="4">Terreno</option>
</select></td></tr>
	<tr><td>Operación : </td><td><select name="lst_opera" id="lst_opera">
<option value="0">---</option>
<option value="1">Venta</option>
<option value="2">Alquiler</option>
<option value="3">Permuta</option>
<option value="4">Vendida</option>
<option value="5">Alquilada</option>
</select></td></tr>
	<tr><td>Zona : </td><td><select name="lst_zona" id="lst_zona">
<option value="0">---</option>
<option value="1">Carrasco</option>
<option value="2">Punta Gorda</option>
<option value="3">Malvin</option>
<option value="4">Malvin Norte</option>
<option value="5">Buceo</option>
<option value="6">Pocitos</option>
<option value="7">Pque Rodó</option>
<option value="8">Palermo</option>
<option value="9">Centro</option>
</select></td></tr>
	</table>
<input type='button' value='cambiar dueño' onClick="open_popup('popup_duenio.php','win2')">
	<table border='1' bordercolor="#F9EDAC"  align='left' width='35%'>
	<tr><td>Garaje : </td><td><input type='text' name='txt_garaje' id='txt_garaje' value="<?php echo $garaje ?>"></td></tr>
	<tr><td>Patio : </td><td><input type='text' name='txt_patio' id='txt_patio' value="<?php echo $patio ?>"></td></tr>
	<tr><td>Jardín : </td><td><input type='text' name='txt_jardin' id='txt_jardin' value="<?php echo $jardin ?>"></td></tr>
	<tr><td>Aire Acond : </td><td><input type='text' name='txt_aire' id='txt_aire' value="<?php echo $aire ?>"></td></tr>
	<tr><td>Metros : </td><td><input type='text' name='txt_metros' id='txt_metros' value="<?php echo $metros ?>"></td></tr>
	<tr><td>Alarma : </td><td><input type='text' name='txt_alarma' id='txt_alarma' value="<?php echo $alarma ?>"></td></tr>
	<tr><td>Parrillero : </td><td><input type='text' name='txt_parri' id='txt_parri' value="<?php echo $parrillero ?>"></td></tr>
	<tr><td>Estufa Leña : </td><td><input type='text' name='txt_lenia' id='txt_lenia' value="<?php echo $estufa ?>"></td></tr>
	</table>
<?php
	echo "</br></br></br></br></br></br></br></br></br></br></br></br></br>";
	echo "<input type='text' name='txt_modo' id='txt_modo' value='4' style='visibility:hidden'><br>";
	echo "<input type='submit' name='btn_Enviar' value='Enviar'>";
	echo "<input type='text' name='txt_idDue' id='txt_idDue' size='1' value='$idDue' style='visibility:hidden'><br>";
	echo "<input type='text' name='txt_idProp' id='txt_idProp' size='1' value='$idProp' style='visibility:hidden'><br>";
	echo "</form>";
}

?>

</body>
</html>
