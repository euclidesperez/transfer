<?php
require_once "Db.php";
require_once "app/oop/PurchaseOrder.php";
class PurchaseOrderDAO extends Db {
	public function register(PurchaseOrder $purchase) {
		$query = "INSERT INTO `transferuk`.`purchaseorder`
			(`dateOrder`,
			`amountOrder`,
			`priceOrder`,
			`idBidding`,
			`idPerson`)
			VALUES
			(".$this->quote($purchase->getDateOrder()).",
			".$this->quote($purchase->getAmountOrder()).",
			".$this->quote($purchase->getPriceOrder()).",
			".$this->quote($purchase->getIdBidding()).",
			".$this->quote($purchase->getIdPerson()).")";
		$lastId = $this->insert( $query );
		
		if ($lastId <= 0) {
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
			`idBidding` = ".$this->quote($purchase->getIdBidding()).",
			`idPerson` = ".$this->quote($purchase->getIdPerson())."
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
	    	`purchaseorder`.`idBidding`,
	    	`purchaseorder`.`idPerson`
				FROM `transferuk`.`purchaseorder`
				WHERE `purchaseorder`.`idPerson` = ".$this->quote($idPerson);
		$rows = $this->select ( $query );
		$listPurchaseOrder = array ();
		foreach ( $rows as $row ) {
			$object = new PurchaseOrder();
			$object->setId ( $row['idPurchaseOrder'] );
			$object->setIdBidding ( $row['idBidding'] );
			$object->setIdPerson ( $row['idPerson'] );
			$object->setPriceOrder ( $row['priceOrder'] );
			$object->setDateOrder ( $row['dateOrder'] );
			$object->setAmountOrder ( $row['amountOrder'] );
			$object->setStatusOrder ( $row['statusOrder'] );
			array_push ( $listPurchaseOrder, $object );
		}
		unset ( $row );
		return $listPurchaseOrder;
	}
	public function getPurchaseDuplicated(PurchaseOrder $order){
		$query = "SELECT `purchaseorder`.`idPurchaseOrder`,
		    `purchaseorder`.`dateOrder`,
		    `purchaseorder`.`amountOrder`,
		    `purchaseorder`.`statusOrder`,
		    `purchaseorder`.`priceOrder`,
		    `purchaseorder`.`idBidding`,
		    `purchaseorder`.`idPerson`
				FROM `transferuk`.`purchaseorder`
				WHERE `purchaseorder`.`dateOrder` = ".$this->quote($order->getDateOrder())." 
				and `purchaseorder`.`priceOrder` = ".$this->quote($order->getPriceOrder())." 
				and `purchaseorder`.`amountOrder` = ".$this->quote($order->getAmountOrder())." 
				and `purchaseorder`.`idPerson` = ".$this->quote($order->getIdPerson())." 
				and `purchaseorder`.`idBidding` = ".$this->quote($order->getIdBidding());
		$rows = $this->select ( $query );
		
		foreach ( $rows as $row ) {
			$object = new PurchaseOrder();
			$object->setId ( $row ['idPurchaseOrder'] );
			$object->setIdBidding ( $row ['idBidding'] );
			$object->setIdPerson ( $row ['idPerson'] );
			$object->setPriceOrder ( $row ['priceOrder'] );
			$object->setDateOrder ( $row ['dateOrder'] );
			$object->setAmountOrder ( $row ['amountOrder'] );
			$object->setStatusOrder ( $row ['statusOrder'] );
		}
		unset ( $row );
		if(isset($object)){
			return $object;
		}else{
			return null;
		}
	}
	
	public function getPurchase($idPurchase) {
		$query = "SELECT `purchaseorder`.`idPurchaseOrder`,
		    `purchaseorder`.`dateOrder`,
		    `purchaseorder`.`amountOrder`,
		    `purchaseorder`.`statusOrder`,
		    `purchaseorder`.`priceOrder`,
		    `purchaseorder`.`idBidding`,
		    `purchaseorder`.`idPerson`
				FROM `transferuk`.`purchaseorder`
				WHERE `purchaseorder`.`idPurchaseOrder` = ".$this->quote($idPurchase);
		$rows = $this->select ( $query );
		$object = new PurchaseOrder();
		foreach ( $rows as $row ) {
			$object->setId ( $row ['idPurchaseOrder'] );
			$object->setIdBidding ( $row ['idBidding'] );
			$object->setIdPerson ( $row ['idPerson'] );
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