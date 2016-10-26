<?php
class Document{
	private $id;
	private $type;
	private $idPerson;
	private $document;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getType(){
		return $this->type;
	}
	
	public function setType($type){
		$this->type = $type;
	}
	
	public function getIdPerson(){
		return $this->idPerson;
	}
	
	public function setIdPerson($idPerson){
		$this->idPerson = $idPerson;
	}
	
	public function getDocument(){
		return $this->document;
	}
	
	public function setDocument($document){
		$this->document = $document;
	}

}
?>