<?php
class areasDAO{
	private $dbc;
	public function  __construct($connection)
	{
		$this->dbc = $connection;
	}
	
	public function getAreas(){
		$q = "SELECT area_id, nombre FROM areas";
		$array = array();
		$r = $this->dbc-> query($q);
		while ($obj = $r->fetch_object()) {
			$array[] = $obj;
		}
		return $array;
	}
	
	public function insertArea($var1){
		$q = "INSERT INTO areas (nombre) VALUES (?)";
		$stmt = $this->dbc->stmt_init();
 		if($stmt->prepare($q)) {
 			$stmt->bind_param('s', $var1);
 			$stmt->execute();
 		}
 		$id = $this->dbc->insert_id;
		$stmt->close();
		return $id;
	}
	
	public function updateArea($obj){
		$q = "UPDATE areas SET nombre = ? WHERE area_id = ?";
		$stmt = $this->dbc->stmt_init();
		if($stmt->prepare($q)) {
			$stmt->bind_param('ss', $obj->nombre, $obj->area_id);
			$stmt->execute();
		}
		$stmt->close();
		return $obj;
	}
	
	public function deleteArea($var1){
		$q = "DELETE FROM areas WHERE area_id = ?";
		$stmt = $this->dbc->stmt_init();
		if($stmt->prepare($q)) {
			$stmt->bind_param('s', $var1);
			$stmt->execute();
		}
		$stmt->close();
	}
	
	
	
	
		
}

?>