<?php
require_once "../app/dao/BiddingDAO.php";


class BiddingTest extends PHPUnit_Framework_TestCase{
	
	public function  testEmpty(){
		$stack = [];
		$this->assertEmpty($stack);
		
		return $stack;
	}
	/**
	 * 
	 * 
	 */
	public function testSelectBiddingDAOEmptyList(){
		$dao = new BiddingDAO();		
		$this->assertNotNull($dao->getBidding(-1),'sin fallas');
		
	}
	
	public function testInsertBiddingDAO(){
		$dao =  new BiddingDAO();
		$bidding = new Bidding();
				
		$bidding->setDateEnd(date("Y-m-d"));
		$bidding->setDateInit(date("Y-m-d"));
		$bidding->setStatus(1);
		$bidding->setTotalAmountAwared(0);
		$bidding->setTotalAmountOffered(10000);
		
		$id = $dao->register($bidding);
		$this->assertNotNull($id);
	}
	
	public function testListBiddingDAO(){
		$dao = new BiddingDAO();
		$lista = $dao->listBidding();
		echo "count -----> ".count($lista);
		$this->assertNotNull($lista,'Error en el listado');
		$this->assertGreaterThan(0, count($lista));
	}
	
	public function testGetBiddingDAO(){		
		$dao = new BiddingDAO();
		$id = 1;
		$bidding = $dao->getBidding($id);
		$this->assertNotNull($bidding);
		$this->assertSame($dao->quote($id), $dao->quote($bidding->getId()),'fallo');
	}
	
	public function testModifyBiddingDAO(){
		
		$dao = new BiddingDAO();
		$bidding = $dao->getBidding(1);
		echo "----- \n";
		echo var_dump($bidding);
		echo "----- \n"; 
		$newAmountAwared = 5000;
		$bidding->setTotalAmountAwared($newAmountAwared);
		echo $bidding->getTotalAmountAwared();
		$dao->modify($bidding);
		echo "\n";
		$biddingUpdated = $dao->getBidding($bidding->getId());
		echo serialize($biddingUpdated->getTotalAmountAwared());
		$this->assertNotSame($bidding, $biddingUpdated);
		$this->assertNotSame($newAmountAwared, $biddingUpdated->getTotalAmountAwared());
	}
	
	public function testDeleteBiddingDAO(){
		$dao =  new BiddingDAO();
		$bidding = new Bidding();
				
		$bidding->setDateEnd(date("Y-m-d"));
		$bidding->setDateInit(date("Y-m-d"));
		$bidding->setStatus(1);
		$bidding->setTotalAmountAwared(0);
		$bidding->setTotalAmountOffered(10000);
		
		$id = $dao->register($bidding);
		$this->assertNotNull($id);
		$dao->delete($id);
		
		$deletedBidding = $dao->getBidding($id);
		$this->assertNull($deletedBidding->getId());
	}
	
	
	
	public function testGetActiveBidding(){
		$dao = new BiddingDAO();
		$bidding = $dao->getActiveBidding();
		$this->assertNotNull($bidding);
		$this->assertEquals(1, $bidding->getStatus());
	}
}

?>