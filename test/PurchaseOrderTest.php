<?php 
require_once "app/dao/PurchaseOrderDAO.php";
require_once "app/dao/BiddingDAO.php";

class PurchaseOrderTest extends PHPUnit_Framework_TestCase{
	
	public function testInsertPurchaseOrderDAO(){
		$dao = new PurchaseOrderDAO();
		$purchase = new PurchaseOrder();
		$purchase->setAmountOrder(1000);
		$purchase->setDateOrder(date("Y-m-d"));
		$biddingDAO = new BiddingDAO();
		
		$activeBidding = $biddingDAO->getActiveBidding();
		//var_dump($activeBidding);
		
		$purchase->setIdBidding($activeBidding->getId());
		$purchase->setIdPerson(1);
		$purchase->setPriceOrder(890);
				
		$lastId = $dao->register($purchase);
		$this->assertNotNull($lastId);
		$update = $dao->getPurchase($lastId);
		$this->assertEquals($purchase->getPriceOrder(), $update->getPriceOrder());
	}
	
	public function testListPurchaseOrderDAO(){
		$dao = new PurchaseOrderDAO();
		
		$lista = $dao->listPurchase(1);
		//var_dump($lista);
		$this->assertNotNull($lista);
		$this->assertNotEmpty($lista);
		
	}
}

?>