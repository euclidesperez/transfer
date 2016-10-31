<?php
class AccountInformation implements JsonSerializable{
	
	private $id;
	private $bankName;
	private $codeAba;
	private $numberAccount;
	private $accountHolder;
	private $idPerson;
	private $address;
	private $status;
	private $idAccountType;
	
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
	
	public function getAddress(){
		return $this->address;
	}
	
	public function setAddress($address){
		$this->address = $address;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function getIdAccountType(){
		return $this->idAccountType;
	}
	
	public function setIdAccountType($idAccountType){
		$this->idAccountType = $idAccountType;
	}
	
	public function jsonSerialize() {
		return array($this->id,$this->bankName,$this->codeAba,
				$this->numberAccount,$this->accountHolder,
				$this->idPerson,$this->address,$this->status,
				$this->idAccountType);
	}
}

?>