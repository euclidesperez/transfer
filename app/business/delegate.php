<?php
require_once 'app/business/provisioning.php';
require_once 'app/business/register.php';
require_once 'app/business/search.php';

class Delegate{
	
	public function register($postArray,$option){
		$register = new Register();
		switch(strtolower($option)){			
			case "user":
				return $register->registerUser($postArray);
			case "account":
				return $register->registerAccount($postArray);
			case "bid":
				return $register->registerBid($postArray);
			case "order" :
				return $register->registerOperation( $postArray );
		}
		
	}
	
	public function getCatalog($option){
		$provisioning = new Provisioning();
		switch(strtolower($option)){
			case "sex":
				return $provisioning->getSexCatalog();				
			case "country":
				return $provisioning->getCountryCatalog();
			case "accounttype":
				return $provisioning->getAccountTypeCatalog();
			case "statusperson":
				return $provisioning->getStatusPersonCatalog();
			case "nationality":
				return $provisioning->getCountryCatalog();
			case "ocupation":
				return $provisioning->getOcupationCatalog();
			case "fundorigin":
				return $provisioning->getFundOriginCatalog();
			case "operationtype":
				return $provisioning->getOperationTypeCatalog();
		}
	}
	
	public function search(){}

}