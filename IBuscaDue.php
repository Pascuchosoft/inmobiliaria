<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Interface Busca Deuño</title>
<link rel="stylesheet" href="miestilo.css">
<script>
function valida_envia(){
	if (frm_alta.txt_apedue.value.length==0){ 
       alert("Verifique los datos ingresados"); 
       frm_alta.txt_apedue.focus();
       return 0; 
	}else{
    	frm_alta.submit();
	}				
}

</script>

</head>

<body>
<h1>Buscar Deuños</h1>
<hr />
<br />

<?php
session_start();
//session_register('ses_perfil');
$buff=$_SESSION['ses_perfil'];
if ($buff==1 || $buff==2 || $buff==3 || $buff==4){
?>	
<br /><br />
	<form name='frm_alta' id='frm_alta' method='post' action='DBuscarDue.php'>
	<table border='1' align='left' width='30%'>
	<tr><td>Nombre : </td><td><input type='text' name='txt_nomdue' id='txt_nomdue'></td></tr>
	<tr><td>Apellido : </td><td><input type='text' name='txt_apedue' id='txt_apedue'></td></tr>
	<tr><td>C.I. (*): </td><td><input type='text' name='txt_ci' id='txt_ci'></td></tr>
	</table>
	<br /><br /><br /><br /><br />
	<input type='button' name='btn_Enviar' value='Enviar' onclick='valida_envia();'>
	</form>
<?php
}
		echo "<ul class='navbar'>";
		echo "<li><a href='index.php'><h4 align='center'>volver al índice</h4></a>";
		echo "<li><a href='PaginaDue.php'><h4 align='center'>volver al listado</h4></a>";

?>

</body>
</html>
