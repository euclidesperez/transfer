<?php
class Bidding{
	
	private $id;
	private $dateInit;
	private $dateEnd;
	private $totalAmountOffered;
	private $totalAmountAwared;
	private $status;

	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getDateInit(){
		return $this->dateInit;
	}
	
	public function setDateInit($dateInit){
		$this->dateInit = $dateInit;
	}
	
	public function getDateEnd(){
		return $this->dateEnd;
	}
	
	public function setDateEnd($dateEnd){
		$this->dateEnd = $dateEnd;
	}
	
	public function getTotalAmountOffered(){
		return $this->totalAmountOffered;
	}
	
	public function setTotalAmountOffered($totalAmountOffered){
		$this->totalAmountOffered = $totalAmountOffered;
	}
	
	public function getTotalAmountAwared(){
		return $this->totalAmountAwared;
	}
	
	public function setTotalAmountAwared($totalAmountAwared){
		$this->totalAmountAwared = $totalAmountAwared;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
}
?>