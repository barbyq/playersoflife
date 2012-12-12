<?php 
error_reporting(E_ALL);
ini_set('display', '1');

include('../dbc/dbconnect.php');
include('../dbc/areas.php');
include('../dbc/secciones.php');

$dbconnect = new dbconnect('playersDB');
$dbc = $dbconnect->getConnection();
$areasDAO = new areasDAO($dbc);
$areas = $areasDAO->getAreas();

 ?>

 <html>
 <head>
 	<title>Areas</title>
 </head>
 <body>

<?php foreach ($areas as $area) {
	
	echo "El area es: ".$area->area_id." y su nombre es: ".$area->nombre;

} ?>
 
 </body>
 </html>