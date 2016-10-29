<?php
require_once "Db.php";
require_once "../app/oop/AccountInformation.php";

class AccountInformationDAO extends Db{
	
	public function register(AccountInformation $account){
		$query = "INSERT INTO `transferuk`.`accountinformation`
			(`bankName`,
			`codeABASort`,
			`numberAccount`,
			`accountHolder`,
			`address`,
			`Person_idPerson`,
			`idAccountType`)
			VALUES
			(".$this->quote($account->getBankName()).",
			".$this->quote($account->getCodeAba()).",
			".$this->quote($account->getNumberAccount()).",
			".$this->quote($account->getAccountHolder()).",
			".$this->quote($account->getAddress()).",
			".$this->quote($account->getIdPerson()).",
			".$this->quote($account->getIdAccountType()).")";
		$lastId = $this->insert($query);
		if($lastId === false){
			throw new Exception('An error during the register -> '.$this->error());
		}
		return $lastId;
	}
	
	public function modify(AccountInformation $account){
		$query = "UPDATE `transferuk`.`accountinformation`
			SET
			`bankName` = ".$this->quote($account->getBankName()).",
			`codeABASort` = ".$this->quote($account->getCodeAba()).",
			`numberAccount` = ".$this->quote($account->getNumberAccount()).",
			`accountHolder` = ".$this->quote($account->getAccountHolder()).",
			`address` = ".$this->quote($account->getAddress()).",
			`idPerson` = ".$this->quote($account->getIdPerson()).",
			`idAccountType` = ".$this->quote($account->getIdAccountType()).",
			`status` = ".$this->quote($account->getStatus())."
			WHERE `idAccountInformation` = ".$this->quote($account->getId());
		$result = $this->query($query);
		if($result === false){
			throw new Exception("An error during the update -> ".$this->error());
		}
	}
	
	public function delete($idAccount){
		$query = "DELETE FROM `transferuk`.`accountinformation`
			WHERE `idAccountInformation` = ".$this->quote($idAccount);
		$result = $this->query($query);
		if($result === false){
			throw new Exception("An error during the delete -> ".$this->error());
		}
	}
	
	public function getAccountInformation($idAccount){
		$query = "SELECT `accountinformation`.`idAccountInformation`,
		    `accountinformation`.`bankName`,
		    `accountinformation`.`codeABASort`,
		    `accountinformation`.`numberAccount`,
		    `accountinformation`.`accountHolder`,
		    `accountinformation`.`address`,
		    `accountinformation`.`idPerson`,
		    `accountinformation`.`idAccountType`,
		    `accountinformation`.`status`
		FROM `transferuk`.`accountinformation`
		WHERE `accountinformation`.`idAccountInformation` = ".$this->quote($idAccount)." and
				`status` = 'A'";
		$rows = $this->select($query);
		$object = new AccountInformation();
		foreach ($rows as $row){
			$object->setId($row['idAccountInfomation']);
			$object->setAccountHolder($row['accountHolder']);
			$object->setAddress($row['address']);
			$object->setBankName($row['bankName']);
			$object->setCodeAba($row['codeABASort']);
			$object->setIdPerson($row['idPerson']);
			$object->setNumberAccount($row['numberAccount']);
			$object->setIdAccountType($row['idAccountType']);
		}		
		unset($row);
		return $object;
	}
	
	
	public function listAccountInformation($idUsuarios){
		$query = "SELECT `accountinformation`.`idAccountInformation`,
		    `accountinformation`.`bankName`,
		    `accountinformation`.`codeABASort`,
		    `accountinformation`.`numberAccount`,
		    `accountinformation`.`accountHolder`,
		    `accountinformation`.`address`,
		    `accountinformation`.`idPerson`,
		    `accountinformation`.`idAccountType`,
		    `accountinformation`.`status`
		FROM `transferuk`.`accountinformation`
		WHERE `accountinformation`.`Person_idPerson` = ".$this->quote($idUsuarios)." and
				`status` = 'A'";
		$rows = $this->query($query);
		
		$list = array();
		foreach ($rows as $row){
			$object = new AccountInformation();
			$object->setId($row['idAccountInfomation']);
			$object->setAccountHolder($row['accountHolder']);
			$object->setAddress($row['address']);
			$object->setBankName($row['bankName']);
			$object->setCodeAba($row['codeABASort']);
			$object->setIdPerson($row['idPerson']);
			$object->setNumberAccount($row['numberAccount']);
			$object->setIdAccountType($row['idAccountType']);
			array_push($list, $object);
		}
		unset($row);
		return $list;		
	}
}
?>