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
	private $name;
	private $lastName;
	private $emailPerson;
	private $dateRegister;
	private $dateAllowOperation;
	private $username;
	private $phone;
	private $mobile;
	private $idStatusPerson;
	private $acceptTerms;
	private $birthDate;
	private $address1;
	private $address2;
	private $address3;	
	private $postalCode;
	private $idCountry;
	private $idNationality;
	private $idSex;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function getLastName(){
		return $this->lastName;
	}
	
	public function setLastName($lastName){
		$this->lastName = $lastName;
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
	
	public function getUsername(){
		return $this->username;
	}
	
	public function setUsername($username){
		$this->username = $username;
	}
	
	public function getPhone(){
		return $this->phone;
	}
	
	public function setPhone($phone){
		$this->phone = $phone;
	}
	
	public function getMobile(){
		return $this->mobile;
	}
	
	public function setMobile($mobile){
		$this->mobile = $mobile;
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
	
	public function getBirthDate(){
		return $this->birthDate;
	}
	
	public function setBirthDate($birthDate){
		$this->birthDate = $birthDate;
	}
	
	public function getAddress1(){
		return $this->address1;
	}
	
	public function setAddress1($address1){
		$this->address1 = $address1;
	}
	
	public function getAddress2(){
		return $this->address2;
	}
	
	public function setAddress2($address2){
		$this->address2 = $address2;
	}
	
	public function getAddress3(){
		return $this->address3;
	}
	
	public function setAddress3($address3){
		$this->address3 = $address3;
	}
	
	public function getPostalCode(){
		return $this->postalCode;
	}
	
	public function setPostalCode($postalCode){
		$this->postalCode = $postalCode;
	}
	
	public function getIdCountry(){
		return $this->idCountry;
	}
	
	public function setIdCountry($idCountry){
		$this->idCountry = $idCountry;
	}
	
	public function getIdNationality(){
		return $this->idNationality;
	}
	
	public function setIdNationality($idNationality){
		$this->idNationality = $idNationality;
	}
	
	public function getIdSex(){
		return $this->idSex;
	}
	
	public function setIdSex($idSex){
		$this->idSex = $idSex;
	}
}
?>