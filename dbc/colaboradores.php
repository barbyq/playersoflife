<?php
class colaboradoresDAO{
	private $dbc;
	public function  __construct($connection)
	{
		$this->dbc = $connection;
	}
	
	public function getColaboradores(){
		$q = "SELECT colaborador_id, colaboradores.nombre, medio, giro, twitter, tipo, colaboradores.seccion_id, secciones.nombre AS 'seccion', areas.nombre AS 'area' FROM colaboradores JOIN secciones ON secciones.seccion_id = colaboradores.seccion_id JOIN areas ON areas.area_id = secciones.area_id";
		$array = array();
		$r = $this->dbc-> query($q);
		while ($obj = $r->fetch_object()) {
			$array[] = $obj;
		}
		return $array;
	}
	
	
		
}

?>