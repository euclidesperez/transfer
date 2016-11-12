<?php
require_once "Db.php";
require_once "app/oop/Document.php";


class DocumentDAO extends Db{
	
	public function register(Document $document){
		$query = "INSERT INTO `transferuk`.`document`
			(`name`,
				`type`,
				`document`,
				`idPerson`)
			VALUES
				(". $this->quote($document->getName()).",
				". $this->quote($document->getType()).",
				". $this->quote($document->getDocument()).",
				". $this->quote($document->getIdPerson()).")";
		$lastId = $this->insert($query);
		if ($lastId <= 0){
			throw new Exception('An error during the register -> '.$this->error()); 
		}
	}
	
	public function modify(Document $document){
		$query = "UPDATE `transferuk`.`document`
			SET
			`name` = ".$this->quote($document->getName()).",
			`type` = ".$this->quote($document->getType()).",
			`document` = ".$this->quote($document->getDocument()).",
			`idPerson` = .$this->quote($document->getIdPerson())
			WHERE `idDocument` = ".$this->quote($document->getId());
		$result = $this->query($query);
		if($result === false){
			throw new Exception("An error during the update -> ".$this->error());
		}
	}
	
	public function delete(){
		$quey = "DELETE FROM `transferuk`.`document`
			WHERE `document`.`idDocument` = ".$this->quote($idDocument);
		$result = $this->query($query);
		if($result === false){
			throw new Exception("An error during the delete -> ".$this->error());
		}
	}
	
	public function getDocument($idDocument){
		$quey = "SELECT `document`.`idDocument`,
		    `document`.`name`,
		    `document`.`type`,
		    `document`.`document`,
		    `document`.`idPerson`
		FROM `transferuk`.`document`
		WHERE `document`.`idDocument` = ".$this->quote($idDocument);
		
		$rows = $this->select($query);
		foreach ($rows as $row){
			$object = new Document();
			$object->setId($row['id']);
			$object->setIdPerson($row['idPerson']);
			$object->setName($row['name']);
			$object->setType($row['type']);
			$object->setDocument($row['document']);
		}
		unset($row);
		if(isset($object)){
			return $object;
		}else{
			return null;
		}
	}
	
	public function listDocument(){
		$quey = "SELECT `document`.`idDocument`,
		    `document`.`name`,
		    `document`.`type`,
		    `document`.`document`,
		    `document`.`idPerson`
		FROM `transferuk`.`document`";
		$rows = $this->select($query);
		$listObject = new Document();
		foreach ($rows as $row){
			$object = new Document();
			$object->setId($row['id']);
			$object->setIdPerson($row['idPerson']);
			$object->setName($row['name']);
			$object->setType($row['type']);
			$object->setDocument($row['document']);
			array_push($listObject, $object);
		}
		unset($row);
		return $listObject;
	}
	
	public function listDocumentByUser($idPerson){
		$quey = "SELECT `document`.`idDocument`,
		    `document`.`name`,
		    `document`.`type`,
		    `document`.`document`,
		    `document`.`idPerson`
		FROM `transferuk`.`document`
		WHERE `document`.`idPerson` = ".$this->quote($idPerson);
		
		$rows = $this->select($query);
		$listObject = new Document();
		foreach ($rows as $row){
			$object = new Document();
			$object->setId($row['id']);
			$object->setIdPerson($row['idPerson']);
			$object->setName($row['name']);
			$object->setType($row['type']);
			$object->setDocument($row['document']);
			array_push($listObject, $object);
		}
		unset($row);
		return $listObject;
	}
}
?>