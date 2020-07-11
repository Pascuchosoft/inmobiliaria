<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clase Propiedad</title>
</head>

<body>
<?php

class Propiedad{
	private $idProp;
	private $dire;
	private $idTipo;
	private $idZona;
	private $idOpera;
	private $precio;
	private $dormitorios;
	private $idDue;
	
	public function __construct($idProp, $dir, $idTipo, $idZona, $idOpera, $precio, $dormi, $idDue){
		$this -> idProp = $idProp;
		$this -> dire = $dir;
		$this -> idTipo = $idTipo;
		$this -> idZona = $idZona;
		$this -> idOpera = $idOpera;
		$this -> precio = $precio;
		$this -> dormitorios = $dormi;
		$this -> idDue = $idDue;
	}
	
	//gets
	function getidProp(){
		return $this -> idProp;
	}
	function getidDue(){
		return $this -> idDue;
	}
	function getdir(){
		return $this -> dire;
	}
	function getprecio(){
		return $this -> precio;
	}
	function getidZona(){
		return $this -> idZona;
	}
	function getidTipo(){
		return $this -> idTipo;
	}
	function getidOpera(){
		return $this -> idOpera;
	}
	function getdormitorios(){
		return $this -> dormitorios;
	}
	
	//sets
	function setidProp($idProp){
		$this -> idProp = $idProp;
	}
	function setidDue($idDue){
		$this -> idDue = $idDue;
	}
	function setdir($dir){
		$this -> dire = $dir;
	}
	function setprecio($pecio){
		$this -> precio = $pecio;
	}
	function setidZona($idZona){
		$this -> idZona = $idZona;
	}
	function setidTipo($idTipo){
		$this -> idTipo = $idTipo;
	}
	function setidOpera($idOpera){
		$this -> idOpera = $idOpera;
	}
	function setdormitorios($dormi){
		$this -> dormitorios = $dormi;
	}
}

?>

</body>
</html>