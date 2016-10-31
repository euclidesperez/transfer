<?php
require_once 'app/dao/PersonDAO.php';
require_once 'app/dao/AccountInformationDAO.php';

class Delegate{
	
	public function userRegister($postArray){
		//check not null fields		
		$this->checkValueNotNullOrEmpty($postArray);
		
		//check not user not exist
		
		//register
		$person = $this->createPerson($postArray);
		
		$personDAO = new PersonDAO();
		$lastId = $personDAO->register($person);
		return $lastId;
	}
	
	private function createPerson($postArray){
		$person = new Person();
		foreach ($postArray as $key=>$value){
			if (strcasecmp ( $key, 'address1' ) === 0) {
				$person->setAddress1 ( $value );
			}
			
			if (strcasecmp ( $key, 'address2' ) === 0) {
				$person->setAddress2 ( $value );
			}
			if (strcasecmp ( $key, 'address3' ) === 0) {
				$person->setAddress3 ( $value );
			}
			if (strcasecmp ( $key, 'birthDate' ) === 0) {
				$person->setBirthDate( $value );
			}
			if (strcasecmp ( $key, 'name' ) === 0) {
				$person->setName( $value );
			}
			if (strcasecmp ( $key, 'lastname' ) === 0) {
				$person->setLastName( $value );
			}
			if (strcasecmp ( $key, 'postalcode' ) === 0) {
				$person->setPostalCode( $value );
			}
			if (strcasecmp ( $key, 'country' ) === 0) {
				$person->setIdCountry( $value );
			}
			if (strcasecmp ( $key, 'nationality' ) === 0) {
				$person->setIdNationality( $value );
			}
			if (strcasecmp ( $key, 'phonenumber' ) === 0) {
				$person->setPhone( $value );
			}
			if (strcasecmp ( $key, 'mobilenumber' ) === 0) {
				$person->setMobile( $value );
			}
			if (strcasecmp ( $key, 'sex' ) === 0) {
				$person->setIdSex( $value );
			}
						
		}
		return $person;		
	}
	
	private function checkValueNotNullOrEmpty($postArray){
		foreach ($postArray as $key=>$value){
			if(empty($value) || is_null($value) ){
				throw new Exception('Null or Empty Value');
			}
		}
	}
	
	public function getCatalog($option){
		switch(strtolower($option)){
			case "sex":
				return $this->getSexCatalog();				
			case "country":
				return $this->getCountryCatalog();
			case "accounttype":
				return $this->getAccountTypeCatalog();
			case "statusperson":
				return $this->getStatusPersonCatalog();				
		}
	}
	private function getCountryCatalog(){
		$dao = new PersonDAO();
		return $dao->getCountryCatalog();
	}
	
	private function getSexCatalog(){
		$dao = new PersonDAO();
		return $dao->getSexCatalog();
	}
	
	private function getAccountTypeCatalog(){
		$dao = new AccountInformationDAO();
		return $dao->getStatusPersonCatalog();
	}
	
	private function getStatusPersonCatalog(){
		$dao = new PersonDAO();
		return $dao->getStatusPersonCatalog();
	}

}