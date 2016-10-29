<?php
class Country{
	private $id;
	private $countryCode;
	private $countryName;
	private $status;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getCountryCode(){
		return $this->countryCode;
	}
	
	public function setCountryCode($countryCode){
		$this->countryCode = $countryCode;
	}
	
	public function getCountryName(){
		return $this->countryName;
	}
	
	public function setCountryName($countryName){
		$this->countryName = $countryName;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
}
?>