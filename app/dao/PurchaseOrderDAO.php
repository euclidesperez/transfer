<?php
require_once "Db.php";
require_once "../app/oop/PurchaseOrder.php";
class PurchaseOrderDAO extends Db {
	public function register(PurchaseOrderDAO $purchase) {
		$query = "INSERT INTO `transferuk`.`purchaseorder`
			(`dateOrder`,
			`amountOrder`,
			`statusOrder`,
			`priceOrder`,
			`Bidding_idBidding`,
			`Person_idPerson`)
			VALUES
			(".$this->quote($purchase->getDateOrder()).",
			".$this->quote($purchase->getAmountOrder()).",
			".$this->quote($purchase->getStatusOrder()).",
			".$this->quote($purchase->getPriceOrder()).",
			".$this->quote($purchase->getIdBidding()).",
			".$this->quote($purchase->getIdPerson()).")";
		$lastId = $this->insert ( $query );
		
		if ($lastId === false) {
			throw new Exception ( 'An error during the register -> ' . $this->error () );
		}
		
		return $lastId;
	}
	
	public function modify(PurchaseOrderDAO $purchase) {
		$query = "UPDATE `transferuk`.`purchaseorder`
			SET
			`idPurchaseOrder` = ".$this->quote($purchase->getId()).",
			`dateOrder` = ".$this->quote($purchase->getDateOrder()).",
			`amountOrder` = ".$this->quote($purchase->getAmountOrder()).",
			`statusOrder` = ".$this->quote($purchase->getStatusOrder()).",
			`priceOrder` = ".$this->quote($purchase->getPriceOrder()).",
			`Bidding_idBidding` = ".$this->quote($purchase->getIdBidding()).",
			`Person_idPerson` = ".$this->quote($purchase->getIdPerson())."
			WHERE `idPurchaseOrder` = ".$this->quote($purchase->getId());
		$result = $this->query ( $query );
		if ($result === false) {
			Exception ( 'An error during the update -> ' . $this->error () );
		}
	}
	
	public function delete($idPurchase) {
		$query = "DELETE FROM `transferuk`.`purchaseorder`
			WHERE `idPurchaseOrder` = ".$this->quote($purchase->getId());
		$result = $this->query ( $query );
		if ($result === false) {
			throw new Exception ( "An error during the delete -> " . $this->error () );
		}
	}
	
	public function listPurchase($idPerson) {
		$query = "SELECT `purchaseorder`.`idPurchaseOrder`,
    		`purchaseorder`.`dateOrder`,
	    	`purchaseorder`.`amountOrder`,
	    	`purchaseorder`.`statusOrder`,
	    	`purchaseorder`.`priceOrder`,
	    	`purchaseorder`.`Bidding_idBidding`,
	    	`purchaseorder`.`Person_idPerson`
				FROM `transferuk`.`purchaseorder`
				WHERE `purchaseorder`.`Person_idPerson` = ".$this->quote($idPerson);
		$rows = $this->select ( $query );
		$listPurchaseOrder = array ();
		foreach ( $rows as $row ) {
			$object = new PurchaseOrderDAO ();
			$object->setId ( $row ['idPurchaseOrder'] );
			$object->setIdBidding ( $row ['Bidding_idBidding'] );
			$object->setIdPerson ( $row ['Person_idPerson'] );
			$object->setPriceOrder ( $row ['priceOrder'] );
			$object->setDateOrder ( $row ['dateOrder'] );
			$object->setAmountOrder ( $row ['amountOrder'] );
			$object->setStatusOrder ( $row ['statusOrder'] );
			array_push ( $listPurchaseOrder, $object );
		}
		unset ( $row );
		return $listPurchaseOrder;
	}
	public function getPurchase($idPurchase) {
		$query = "SELECT `purchaseorder`.`idPurchaseOrder`,
		    `purchaseorder`.`dateOrder`,
		    `purchaseorder`.`amountOrder`,
		    `purchaseorder`.`statusOrder`,
		    `purchaseorder`.`priceOrder`,
		    `purchaseorder`.`Bidding_idBidding`,
		    `purchaseorder`.`Person_idPerson`
				FROM `transferuk`.`purchaseorder`
				WHERE `purchaseorder`.`idPurchaseOrder` = ".$this->quote($idPurchase);
		$rows = $this->select ( $query );
		$object = new PurchaseOrderDAO ();
		foreach ( $rows as $row ) {
			$object->setId ( $row ['idPurchaseOrder'] );
			$object->setIdBidding ( $row ['Bidding_idBidding'] );
			$object->setIdPerson ( $row ['Person_idPerson'] );
			$object->setPriceOrder ( $row ['priceOrder'] );
			$object->setDateOrder ( $row ['dateOrder'] );
			$object->setAmountOrder ( $row ['amountOrder'] );
			$object->setStatusOrder ( $row ['statusOrder'] );
		}
		unset ( $row );
		return $object;
	}
}

?>