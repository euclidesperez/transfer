<?php
require_once "../app/dao/PersonDAO.php";
class PersonTest extends PHPUnit_Framework_TestCase{
	
	public function testInsertPersonDAO(){
		
		$dao = new PersonDAO();
		$person = new Person();
		$person->setName('$name');
		$person->setLastName('$lastName');
		$person->setUsername('$username');
		$person->setAddress1('$address1');
		$person->setEmailPerson('$emailPerson');
		$person->setAcceptTerms(1);
		$person->setPostalCode('10000');
		$person->setIdStatusPerson(1);		
		$person->setIdCountry(1);
		$person->setIdSex(1);
		$person->setIdNationality(1);
		$person->setDateRegister(date("Y-m-d"));
		$person->setDateAllowOperation(date("Y-m-d"));
		$person->setBirthDate(date("Y-m-d"));
		var_dump($person);
		$lastId = $dao->register($person);
		var_dump($lastId);
		$this->assertNotNull($lastId);
		$consult = $dao->getPerson($lastId);
		$this->assertNotNull($consult);
	}
}
?>