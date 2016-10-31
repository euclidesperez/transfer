<?php
require_once "Db.php";
require_once "app/oop/Person.php";
require_once "app/oop/GenericCatalog.php";
require_once "app/oop/Country.php";

class PersonDAO extends Db {
	public function register(Person $person) {
		$query = "INSERT INTO `transferuk`.`person`
			(`name`,`lastName`,	`emailPerson`,
			`username`,	`phone`, `mobile`, `birthDate`,
			`address1`, `address2`, `address3`, `postalCode`, `idCountry`, `idNationality`, `idSex`)
			VALUES
			(" . $this->quote ( $person->getName () ) . ", " . $this->quote ( $person->getLastName () ) . ",
			" . $this->quote ( $person->getEmailPerson () ) . ", 
			" . $this->quote ( $person->getUsername () ) . ",
			" . $this->quote ( $person->getPhone () ) . ", " . $this->quote ( $person->getMobile () ) . ", 
			" . $this->quote ( $person->getBirthDate () ) . ",
			" . $this->quote ( $person->getAddress1 () ) . "," . $this->quote ( $person->getAddress2 () ) . ",
			" . $this->quote ( $person->getAddress3 () ) . ", " . $this->quote ( $person->getPostalCode () ) . ", 
			" . $this->quote ( $person->getIdCountry () ) . "," . $this->quote ( $person->getIdNationality () ) . ", 
			" . $this->quote ( $person->getIdSex () ) .  ")";
		
		$lastId = $this->insert ( $query );
		
		if ($lastId <= 0) {
			throw new Exception ( 'An error during the register -> ' . $this->error () );
		}
		return $lastId;
	}
	public function modify(Person $person) {
		$query = "UPDATE `transferuk`.`person`
				SET
				`name` = " . $this->quote ( $person->getName () ) . ",
				`lastName` = " . $this->quote ( $person->getLastName () ) . ",
				`emailPerson` = " . $this->quote ( $person->getEmailPerson () ) . ",
				`dateRegister` = " . $this->quote ( $person->getDateRegister () ) . ",
				`dateAllowOperation` = " . $this->quote ( $person->getDateAllowOperation () ) . ",
				`username` = " . $this->quote ( $person->getUsername () ) . ",
				`phone` = " . $this->quote ( $person->getPhone () ) . ",
				`mobile` = " . $this->quote ( $person->getMobile () ) . ",
				`idStatusPersons` = " . $this->quote ( $person->getIdStatusPerson () ) . ",
				`acceptTerms` = " . $this->quote ( $person->getAcceptTerms () ) . ",
				`birthDate` = " . $this->quote ( $person->getBirthDate () ) . ",
				`address1` = " . $this->quote ( $person->getAddress1 () ) . ",
				`address2` = " . $this->quote ( $person->getAddress2 () ) . ",
				`address3` = " . $this->quote ( $person->getAddress3 () ) . ",
				`postalCode` = " . $this->quote ( $person->getPostalCode () ) . ",
				`idCountry` = " . $this->quote ( $person->getIdCountry () ) . ",
				`idNationality` = " . $this->quote ( $person->getIdNationality () ) . ",
				`idSex` = " . $this->quote ( $person->getIdSex () ) . "  ;
				WHERE `idPerson` = " . $this->quote ( $idPerson );
		$result = $this->query ( $query );
		if ($result === false) {
			throw new Exception ( "An error during the update -> " . $this->error () );
		}
	}
	public function delete($idPerson) {
		$query = "DELETE FROM `transferuk`.`person`
			WHERE `idPerson` = " . $this->quote ( $idPerson );
		$result = $this->query ( $query );
		if ($result === false) {
			throw new Exception ( "An error during the delete -> " . $this->error () );
		}
	}
	public function getPerson($idPerson) {
		$query = "SELECT `person`.`idPerson`,
		    `person`.`name`,
		    `person`.`lastName`,
		    `person`.`emailPerson`,
		    `person`.`dateRegister`,
		    `person`.`dateAllowOperation`,
		    `person`.`username`,
		    `person`.`phone`,
		    `person`.`mobile`,
		    `person`.`idStatusPersons`,
		    `person`.`acceptTerms`,
		    `person`.`birthDate`,
		    `person`.`address1`,
		    `person`.`address2`,
		    `person`.`address3`,
		    `person`.`postalCode`,
		    `person`.`idCountry`,
		    `person`.`idNationality`,
		    `person`.`idSex`
		FROM `transferuk`.`person`
		WHERE `idPerson` = " . $this->quote ( $idPerson );
		
		$rows = $this->query ( $query );
		$object = new Person ();
		foreach ( $rows as $row ) {
			$object->setId ( $row ['idPerson'] );
			$object->setName ( $row ['name'] );
			$object->setLastName ( $row ['lastName'] );
			$object->setEmailPerson ( $row ['emailPerson'] );
			$object->setDateRegister ( $row ['dateRegister'] );
			$object->setDateAllowOperation ( $row ['dateAllowOperation'] );
			$object->setUsername ( $row ['username'] );
			$object->setPhone ( $row ['phone'] );
			$object->setMobile ( $row ['mobile'] );
			$object->setIdStatusPerson ( $row ['idStatusPersons'] );
			$object->setAcceptTerms ( $row ['acceptTerms'] );
			$object->setBirthDate ( $row ['birthDate'] );
			$object->setAddress1 ( $row ['address1'] );
			$object->setAddress2 ( $row ['address2'] );
			$object->setAddress3 ( $row ['address3'] );
			$object->setPostalCode ( $row ['postalCode'] );
			$object->setIdCountry ( $row ['idCountry'] );
			$object->setIdNationality ( $row ['idNationality'] );
			$object->setIdSex ( $row ['idSex'] );
		}
		unset ( $row );
		
		return $object;
	}
	public function getPersons() {
		$query = "SELECT `person`.`idPerson`,
		    `person`.`name`,
		    `person`.`lastName`,
		    `person`.`emailPerson`,
		    `person`.`dateRegister`,
		    `person`.`dateAllowOperation`,
		    `person`.`username`,
		    `person`.`phone`,
		    `person`.`mobile`,
		    `person`.`idStatusPersons`,
		    `person`.`acceptTerms`,
		    `person`.`birthDate`,
		    `person`.`address1`,
		    `person`.`address2`,
		    `person`.`address3`,
		    `person`.`postalCode`,
		    `person`.`idCountry`,
		    `person`.`idNationality`,
		    `person`.`idSex`
		FROM `transferuk`.`person`";
		
		$rows = $this->query ( $query );
		$list = array ();
		foreach ( $rows as $row ) {
			$object = new Person ();
			$object->setId ( $row ['idPerson'] );
			$object->setName ( $row ['name'] );
			$object->setLastName ( $row ['lastName'] );
			$object->setEmailPerson ( $row ['emailPerson'] );
			$object->setDateRegister ( $row ['dateRegister'] );
			$object->setDateAllowOperation ( $row ['dateAllowOperation'] );
			$object->setUsername ( $row ['username'] );
			$object->setPhone ( $row ['phone'] );
			$object->setMobile ( $row ['mobile'] );
			$object->setIdStatusPerson ( $row ['idStatusPersons'] );
			$object->setAcceptTerms ( $row ['acceptTerms'] );
			$object->setBirthDate ( $row ['birthDate'] );
			$object->setAddress1 ( $row ['address1'] );
			$object->setAddress2 ( $row ['address2'] );
			$object->setAddress3 ( $row ['address3'] );
			$object->setPostalCode ( $row ['postalCode'] );
			$object->setIdCountry ( $row ['idCountry'] );
			$object->setIdNationality ( $row ['idNationality'] );
			$object->setIdSex ( $row ['idSex'] );
			array_push ( $list, $object );
		}
		unset ( $row );
		
		return $list;
	}
	public function getSexCatalog() {
		$query = "SELECT `sex`.`id`,`sex`.`description` FROM `transferuk`.`sex`";
		return $this->getCatalog ( $query );
	}
	public function getStatusPersonCatalog() {
		$query = "SELECT `statusperson`.`id`, `statusperson`.`description` FROM `transferuk`.`statusperson`";
		return $this->getCatalog ( $query );
	}
	public function getCountryCatalog() {
		$query = "SELECT `country`.`id`,
    		`country`.`countryCode`,
		    `country`.`countryName`,
		    `country`.`status`
			FROM `transferuk`.`country`";
		$rows = $this->query ( $query );
		$list = array ();
		foreach ( $rows as $row ) {
			$catalog = new Country();
			$catalog->setId ( $row ['id'] );
			$catalog->setCountryName ( $row ['countryName'] );
			$catalog->setCountryCode ( $row ['countryCode'] );
			$catalog->setStatus ( $row ['status'] );
			array_push ( $list, $catalog );
		}
		unset ( $row );
		
		return $list;
	}
}
?>