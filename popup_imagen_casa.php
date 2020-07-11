<?php	
require ("conexionInmobi.php");
$idCone = conectarBD();
$idProp = $_GET["idProp"];
echo $idProp;
?>
<HTML>
<BODY>
	<img src="imagenes_prop/<?PHP echo $idProp ?>.jpg">
</BODY>
</HTML>
