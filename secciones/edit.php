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

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$seccion = $seccionesDAO->getSeccion($id);
}else if(isset($_GET['set'])){
	$obj = new stdClass;
	foreach ($_POST as $key => $value){
		$obj->$key = $value;
	}
	
	$seccionesDAO->updateSeccion($obj);
	$seccion = $obj;
	echo 'Update Successful!';
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
<h1>Editar Sección</h1>
<form method="post" action="edit.php?set">
<fieldset>
	<label for="nombre">Nombre:</label>
	<input type="text" name="nombre" placeholder="Nombre" required value="<?php echo $seccion->nombre; ?>" />
</fieldset> 

<fieldset>
	<label for="area_id">Area id:</label>
	<select name="area_id">
	<?php
		foreach($areas as $a){
			echo '<option value="'. $a->area_id .'"';
			if ($a->area_id == $seccion->area_id){
				echo ' selected="selected" ';
			}
			echo ' >'. $a->nombre .'</option>';
		}
	?>
	</select>
</fieldset> 
<input type="hidden" name="seccion_id" value="<?php echo $seccion->seccion_id; ?>"/>
<input type="submit" value="Editar"/>
</form>
</body>
</html>
