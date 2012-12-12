<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('../dbc/dbconnect.php');
include('../dbc/secciones.php');

$dbconnect = new dbconnect('playersDB');
$dbc = $dbconnect->getConnection();
$seccionesDAO = new seccionesDAO($dbc);
$secciones = $seccionesDAO->getSecciones();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Secciones</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Secciones</h1>
<table>
<tr>
	<th>Nombre</th>
	<th>Area</th>
	<th></th>
</tr>
<?php
	foreach($secciones as $s){
		echo '<tr>
		<td>'.$s->nombre.'</td>
		<td>'.$s->area.'</td>
		<td><a href="edit.php?id='.$s->seccion_id.'">Editar</a></td>
		</tr>';
	}
?>
	
</table>
</body>
</html>
