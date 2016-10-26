<?php

class StatusPerson{
	
	private $id;
	private $statusDescriptionPerson;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getStatusDescriptionPerson(){
		return $this->statusDescriptionPerson;
	}
	
	public function setStatusDescriptionPerson($statusDescriptionPerson){
		$this->statusDescriptionPerson = $statusDescriptionPerson;
	}
}

class Person{
	
	private $id;
	private $namePerson;
	private $emailPerson;
	private $dateRegister;
	private $dateAllowOperation;
	private $usernamePerson;
	private $phoneNumberPerson;
	private $idStatusPerson;
	private $acceptTerms;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getNamePerson(){
		return $this->namePerson;
	}
	
	public function setNamePerson($namePerson){
		$this->namePerson = $namePerson;
	}
	
	public function getEmailPerson(){
		return $this->emailPerson;
	}
	
	public function setEmailPerson($emailPerson){
		$this->emailPerson = $emailPerson;
	}
	
	public function getDateRegister(){
		return $this->dateRegister;
	}
	
	public function setDateRegister($dateRegister){
		$this->dateRegister = $dateRegister;
	}
	
	public function getDateAllowOperation(){
		return $this->dateAllowOperation;
	}
	
	public function setDateAllowOperation($dateAllowOperation){
		$this->dateAllowOperation = $dateAllowOperation;
	}
	
	public function getUsernamePerson(){
		return $this->usernamePerson;
	}
	
	public function setUsernamePerson($usernamePerson){
		$this->usernamePerson = $usernamePerson;
	}
	
	public function getPhoneNumberPerson(){
		return $this->phoneNumberPerson;
	}
	
	public function setPhoneNumberPerson($phoneNumberPerson){
		$this->phoneNumberPerson = $phoneNumberPerson;
	}
	
	public function getIdStatusPerson(){
		return $this->idStatusPerson;
	}
	
	public function setIdStatusPerson($idStatusPerson){
		$this->idStatusPerson = $idStatusPerson;
	}
	
	public function getAcceptTerms(){
		return $this->acceptTerms;
	}
	
	public function setAcceptTerms($acceptTerms){
		$this->acceptTerms = $acceptTerms;
	}
}
?>