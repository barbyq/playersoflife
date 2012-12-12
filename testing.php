<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('dbc/dbconnect.php');
include('dbc/areas.php');
include('dbc/colaboradores.php');
include('dbc/secciones.php');

$dbconnect = new dbconnect('playersDB');
$dbc = $dbconnect->getConnection();

$areasDAO = new areasDAO($dbc);
$colaboradoresDAO = new colaboradoresDAO($dbc);
$seccionesDAO = new seccionesDAO($dbc);

$areas = $areasDAO->getAreas();
$colaboradores = $colaboradoresDAO->getColaboradores();
$secciones = $seccionesDAO->getSecciones();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Testing</title>
<meta charset="utf-8">
</head>
<body>
<h1>Areas</h1>
<?php 
	print_r($areas);
 ?>
<p>
<?php
	if (isset($_GET['area'])){
		$var = $_GET['area'];
		$areasDAO->deleteArea($var);
	}
?> </p>
 <br/>
<h1>Colaboradores</h1>
<?php 
	print_r($colaboradores);
 ?>
 
 <br/>
<h1>Secciones</h1>
<?php 
	print_r($secciones);
 ?>
 <p>
<?php
	if (isset($_GET['seccion'])){
		$var = $_GET['seccion'];
		$seccionesDAO->deleteSeccion($var);
	}
?> </p>
</body>
</html>
