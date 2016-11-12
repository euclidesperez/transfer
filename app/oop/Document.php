<?php
class Document implements JsonSerializable{
	private $id;
	private $type;
	private $idPerson;
	private $document;
	private $name;
	
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
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
	}
public function jsonSerialize() {
		return array($this->id,$this->name,$this->type,$this->idPerson,$this->document);
	}

}
?>