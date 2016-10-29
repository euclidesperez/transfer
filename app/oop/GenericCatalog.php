<?php
class GenericCatalog{
	private $idCatalog;
	private $description;
	
	public function getIdCatalog(){
		return $this->idCatalog;
	}
	
	public function setIdCatalog($idCatalog){
		$this->idCatalog = $idCatalog;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setDescription($description){
		$this->description = $description;
	}
}
?>