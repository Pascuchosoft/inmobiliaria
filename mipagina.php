<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mipagina.php</title>
</head>

<body>
<?php
session_start();
session_register('ses_contador');
echo "<a href='mipagina.php'>"."contador vale : ".$_SESSION['ses_contador']."</a>";
$_SESSION['ses_contador']++;
?>
</body>
</html>