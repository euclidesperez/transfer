<?php
class AccountInformation{
	
	private $id;
	private $bankName;
	private $codeAba;
	private $numberAccount;
	private $accountHolder;
	private $idPerson;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getBankName(){
		return $this->bankName;
	}
	
	public function setBankName($bankName){
		$this->bankName = $bankName;
	}
	
	public function getCodeAba(){
		return $this->codeAba;
	}
	
	public function setCodeAba($codeAba){
		$this->codeAba = $codeAba;
	}
	
	public function getNumberAccount(){
		return $this->numberAccount;
	}
	
	public function setNumberAccount($numberAccount){
		$this->numberAccount = $numberAccount;
	}
	
	public function getAccountHolder(){
		return $this->accountHolder;
	}
	
	public function setAccountHolder($accountHolder){
		$this->accountHolder = $accountHolder;
	}
	
	public function getIdPerson(){
		return $this->idPerson;
	}
	
	public function setIdPerson($idPerson){
		$this->idPerson = $idPerson;
	}
}

?>