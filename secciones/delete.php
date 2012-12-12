<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('../dbc/dbconnect.php');
include('../dbc/secciones.php');

$dbconnect = new dbconnect('playersDB');
$dbc = $dbconnect->getConnection();
$seccionesDAO = new seccionesDAO($dbc);

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$seccion = $seccionesDAO->deleteSeccion($id);
}
header("Location:index.php");
?>
