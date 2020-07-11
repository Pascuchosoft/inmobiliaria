<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form name="frm_modifica" action="DMantUsu01.php" method="post">
<table border="3" align="center" width="30%">
<tr><td align="center"><h3>Usuarios :</h3></td><td align="center"><h3>Perfil :</h3></td></tr>
<?php
$conn=mysql_connect("localhost","root","");
$SQL="Select u.Nombre , p.nomperfil, u.idUsu
      From usuarios u, Perfil p
	  Where p.IdPerfil=u.IdPerfil";
mysql_select_db("video",$conn);
$rs=mysql_query($SQL,$conn);
while ($row=mysql_fetch_array($rs)){
	$usu = $row['idUsu'];
	echo "<tr><td>".$row['Nombre']."</td><td>".$row['nomperfil']."</td><td><input type='text' name='txt_idusu' id='txt_idusu' size=1 value='$usu'></td><td><input type='submit' name='btn_enviar' value='Modificar' onclick='txt_modo.value=2' /></td></tr>";
	}
	?>
    </table>
<input type="text" name="txt_modo" id="txt_modo" style="visibility:hidden" />
</form>
</body>
</html>