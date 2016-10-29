<?php
class Db{
	private $connection;
	private function connect(){
		
		if(!isset($this->connection)){
			$config = parse_ini_file('dbconfig.ini');
			$this->connection = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);			
		}
		
		if($this->connection->connect_errno){
			echo "Error: Fallo al conectarse a MySQL debido a: \n";
			echo "Errno: " . $this->connection->connect_errno . "\n";
			echo "Error: " . $this->connection->connect_error . "\n";
			return false;
		}
		return $this->connection;
	}

	
	protected function query($query){
		$conn = $this->connect();
		$result = $conn->query($query);
		return $result;
	}
	
	public function insert($query){
		$conn = $this->connect();
		$conn->query($query);
		return $conn->insert_id;
	}
	
	public function select($query){
		$rows = array();
		$result = $this->query($query);

		while($row = $result->fetch_assoc()){
			array_push($rows,$row);
		}
		return $rows;
	}
	
	public function error(){
		return $this->connection->error;
	}
	
	public function quote($value){
		$conn = $this->connect();
		return "'" . $conn -> real_escape_string($value) . "'";
	}
	
	protected function getCatalog($query){
		$rows = $this->query ( $query );
		$list = array ();
		foreach ( $rows as $row ) {
			$catalog = new GenericCatalog ();
			$catalog->setIdCatalog ( $row['id'] );
			$catalog->setDescription ( $row['description'] );
			array_push ( $list, $catalog );
		}
		unset ( $row );
		
		return $list;
		
	}
	
}