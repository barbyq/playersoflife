<?php
class seccionesDAO{
	private $dbc;
	public function  __construct($connection)
	{
		$this->dbc = $connection;
	}
	
	public function getSecciones(){
		$q = "SELECT seccion_id, secciones.nombre, secciones.area_id, areas.nombre as 'area' FROM secciones JOIN areas ON areas.area_id = secciones.area_id";
		$array = array();
		$r = $this->dbc-> query($q);
		while ($obj = $r->fetch_object()) {
			$array[] = $obj;
		}
		return $array;
	}
	
	public function getSeccion($id){
		$q = "SELECT seccion_id, secciones.nombre, secciones.area_id, areas.nombre as 'area' FROM secciones JOIN areas ON areas.area_id = secciones.area_id WHERE seccion_id = ?";
		$stmt = $this->dbc->stmt_init();
		$obj = new stdClass;
		if($stmt->prepare($q)) {
 			$stmt->bind_param('i', $id);
 			$stmt->execute();
 			$stmt->bind_result($seccion_id, $nombre, $area_id, $area);
 			while($stmt->fetch()){
 				$obj->seccion_id = $seccion_id;
 				$obj->nombre = $nombre;
 				$obj->area_id = $area_id;
 				$obj->area = $area;
 			}
 			$stmt->close();
 		}
 		return $obj;
	}
	
	public function insertSeccion($obj){
		$q = "INSERT INTO secciones (nombre, area_id) VALUES (?, ?)";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('si', $obj->nombre, $obj->area_id);
 			$stmt->execute();
 		}
 		$id = $this->dbc->insert_id;
		$stmt->close();
		return $id;
	}
	
	public function updateSeccion($obj){
		$q = "UPDATE secciones SET nombre = ?, area_id = ? WHERE seccion_id = ?";
		$stmt = $this->dbc->stmt_init();
		if($stmt->prepare($q)) {
			$stmt->bind_param('sii', $obj->nombre, $obj->area_id, $obj->seccion_id);
			$stmt->execute();
		}
		$stmt->close();
		return $obj;
	}
	
	public function deleteSeccion($var1){
		$q = "DELETE FROM secciones WHERE seccion_id = ?";
		$stmt = $this->dbc->stmt_init();
		if($stmt->prepare($q)) {
			$stmt->bind_param('s', $var1);
			$stmt->execute();
		}
		$stmt->close();
	}
	
	
		
}

?>