<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include('../dbc/dbconnect.php');
include('../dbc/areas.php');
include('../dbc/secciones.php');

$dbconnect = new dbconnect('playersDB');
$dbc = $dbconnect->getConnection();
$areasDAO = new areasDAO($dbc);
$areas = $areasDAO->getAreas();

$seccionesDAO = new seccionesDAO($dbc);



if (isset($_GET['set'])){
	$obj = new stdClass;
	foreach ($_POST as $key => $value){
		$obj->$key = $value;
	}
	
	$secciones = $seccionesDAO->insertSeccion($obj);
	echo 'Insertion Successful!';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Secciones</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<h1>Insertar Sección</h1>
<form method="post" action="insert.php?set">
<fieldset>
	<label for="nombre">Nombre:</label>
	<input type="text" name="nombre" placeholder="Nombre" required />
</fieldset> 

<fieldset>
	<label for="area_id">Area id:</label>
	<select name="area_id">
	<?php
		foreach($areas as $a){
			echo '<option value="'. $a->area_id .'">'. $a->nombre .'</option>';
		}
	?>
	</select>
</fieldset> 
<input type="submit" value="Insertar"/>
</form>
</body>
</html>
