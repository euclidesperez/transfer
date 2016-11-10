<?php
require_once 'app/dao/PersonDAO.php';
require_once 'app/dao/AccountInformationDAO.php';

class Provisioning{
	
	public function getCountryCatalog(){
		$dao = new PersonDAO();
		return $dao->getCountryCatalog();
	}
	
	public function getSexCatalog(){
		$dao = new PersonDAO();
		return $dao->getSexCatalog();
	}
	
	public function getAccountTypeCatalog(){
		$dao = new AccountInformationDAO();
		return $dao->getStatusPersonCatalog();
	}
	
	public function getStatusPersonCatalog(){
		$dao = new PersonDAO();
		return $dao->getStatusPersonCatalog();
	}
	
	public function getOcupationCatalog(){
		$dao = new PersonDAO();
		return $dao->getOcupationCatalog();
	}
	
	public function getFundOriginCatalog(){
		$dao = new PersonDAO();
		return $dao->getFundOrigin();
	}
	
	public function getOperationTypeCatalog(){
		$dao = new PersonDAO();
		return $dao->getOperationType();
	}
}