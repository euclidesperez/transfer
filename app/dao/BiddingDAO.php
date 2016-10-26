<?php
require_once "Db.php";
require_once "../app/oop/Bidding.php";


class BiddingDAO extends Db{
	
	public function register(Bidding $bidding){
		$query  = "INSERT INTO `transferuk`.`bidding`
				(`dateInit`, `dateEnd`, `totalAmountOffered`, `totalAmountAwared`,
				`statusBidding`) VALUES (". $this->quote($bidding->getDateInit()) .","
						. $this->quote($bidding->getDateEnd()) .", ".$this->quote($bidding->getTotalAmountOffered()).", "
								.$this->quote($bidding->getTotalAmountAwared()).",".$this->quote($bidding->getStatus()).")";
		$lastId = $this->insert($query);
		
		if($lastId === false){			
			throw new Exception('An error during the register -> '.$this->error()); 
		}
		return $lastId;
	}
	
	public function modify(Bidding $bidding){
		
		$query = "UPDATE `transferuk`.`bidding`
		SET `idBidding` = ".$this->quote($bidding->getId()).",
		`dateInit` = ".$this->quote($bidding->getDateInit()).",
		`dateEnd` = ".$this->quote($bidding->getDateEnd()).",
		`totalAmountOffered` = ".$this->quote($bidding->getTotalAmountOffered()).",
		`totalAmountAwared` = ".$this->quote($bidding->getTotalAmountAwared()).",
		`statusBidding` = ".$this->quote($bidding->getStatus())."
		WHERE `idBidding` = ".$this->quote($bidding->getId());
		$result = $this->query($query);
		if($result === false){
			throw new Exception("An error during the update -> ".$this->error());
		}
	}
	
	public function delete($idBidding){
		$query = "DELETE FROM `transferuk`.`bidding` WHERE `bidding`.`idBidding` =".$this->quote($idBidding);		
		$result = $this->query($query);		
		if($result === false){			
			throw new Exception("An error during the delete -> ".$this->error()); 
		}
	}
	
	public function getBidding($idBidding){
		$query = "SELECT `bidding`.`idBidding`,`bidding`.`dateInit`, `bidding`.`dateEnd`,
				`bidding`.`totalAmountOffered`,`bidding`.`totalAmountAwared`,
				`bidding`.`statusBidding` FROM `transferuk`.`bidding`
				where `bidding`.`idBidding`  =".$this->quote($idBidding) ;
		
		$rows = $this->select($query);
		$object = new Bidding();
		foreach ( $rows as $row ) {
			$object->setId ( $row ['idBidding'] );
			$object->setDateEnd ( $row ['dateEnd'] );
			$object->setDateInit ( $row ['dateInit'] );
			$object->setStatus ( $row ['statusBidding'] );
			$object->setTotalAmountAwared ( $row ['totalAmountAwared'] );
			$object->setTotalAmountOffered ( $row ['totalAmountOffered'] );
		}
		unset ( $row );				
		return $object;
	}
	
	public function listBidding(){
		$query = "SELECT `bidding`.`idBidding`,`bidding`.`dateInit`, `bidding`.`dateEnd`,
				`bidding`.`totalAmountOffered`,`bidding`.`totalAmountAwared`,
				`bidding`.`statusBidding` FROM `transferuk`.`bidding`
				where `bidding`.`statusBidding`  = 1" ;
		$rows = $this->select($query);
		$listBiddings = array();
		foreach($rows as $row) {
			$object = new Bidding();
			$object->setId($row['idBidding']);
			$object->setDateEnd($row['dateEnd']);
			$object->setDateInit($row['dateInit']);
			$object->setStatus($row['statusBidding']);
			$object->setTotalAmountAwared($row['totalAmountAwared']);
			$object->setTotalAmountOffered($row['totalAmountOffered']);
			array_push($listBiddings,$object);
		}	
		unset($row);
		return $listBiddings;
	}
	
	public function getActiveBidding(){
		$query = "SELECT `bidding`.`idBidding`,`bidding`.`dateInit`, `bidding`.`dateEnd`, 
				`bidding`.`totalAmountOffered`,`bidding`.`totalAmountAwared`, 
				`bidding`.`statusBidding` FROM `transferuk`.`bidding` 
				where `bidding`.`statusBidding`  = 1" ;
		$rows = $this->select($query);
		$object = new Bidding();
		foreach ( $rows as $row ) {
			$object->setId ( $row ['idBidding'] );
			$object->setDateEnd ( $row ['dateEnd'] );
			$object->setDateInit ( $row ['dateInit'] );
			$object->setStatus ( $row ['statusBidding'] );
			$object->setTotalAmountAwared ( $row ['totalAmountAwared'] );
			$object->setTotalAmountOffered ( $row ['totalAmountOffered'] );
		}
		
		return $object;
	}
}
		
