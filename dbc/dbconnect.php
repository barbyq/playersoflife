<?php
	class dbconnect{
		private $db_user = 'root'; 
		private $db_password = '';
		private $db_host = 'localhost'; 
		//private $db_name = 'playerso_registro';
		private $dbc;
		
		public function __construct($db_name){
			$this->dbc = new mysqli ($this->db_host, $this->db_user, $this->db_password, $db_name);
			date_default_timezone_set('America/Mexico_City');
			$this->dbc->autocommit(FALSE);
			/*$this->dbc->query("SET NAMES 'utf8'");
			$this->dbc->query("SET CHARACTER SET utf8");*/
			$this->dbc->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
			
			//print_r($dbc);
		}
		
		public function getConnection()
		{
			return $this->dbc;
		}
		
		public function closeConnection()
		{
			$this->dbc->close();
		}
	}
?>