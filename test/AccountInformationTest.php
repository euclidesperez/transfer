<?php
require_once "app/dao/AccountInformationDAO.php";

class AccountInformationTest extends PHPUnit_Framework_TestCase{
	
	public function testInsertAccountInformation(){
		
		$dao = new AccountInformationDAO();
		
		$account = new AccountInformation();
		$account->setAccountHolder('holder');
		$account->setAddress('london');
		$account->setBankName('test');
		$account->setCodeAba('00000000000000000');
		$account->setIdAccountType(1);
		$account->setIdPerson(3);
		$account->setNumberAccount('11111111111111');		
		$lastId = $dao->register($account);
		$this->assertNotNull($lastId);
		$update = $dao->getAccountInformation($lastId);
		//var_dump($update);
		$this->assertEquals($account->getBankName(), $update->getBankName());
		
	}
}

?>