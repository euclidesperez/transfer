<?php

class PurchaseOrder implements JsonSerializable{
	
	private $id;
	private $dateOrder;
	private $amountOrder;
	private $statusOrder;
	private $priceOrder;
	private $idBidding;
	private $idPerson;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getDateOrder(){
		return $this->dateOrder;
	}
	
	public function setDateOrder($dateOrder){
		$this->dateOrder = $dateOrder;
	}
	
	public function getAmountOrder(){
		return $this->amountOrder;
	}
	
	public function setAmountOrder($amountOrder){
		$this->amountOrder = $amountOrder;
	}
	
	public function getStatusOrder(){
		return $this->statusOrder;
	}
	
	public function setStatusOrder($statusOrder){
		$this->statusOrder = $statusOrder;
	}
	
	public function getPriceOrder(){
		return $this->priceOrder;
	}
	
	public function setPriceOrder($priceOrder){
		$this->priceOrder = $priceOrder;
	}
	
	public function getIdBidding(){
		return $this->idBidding;
	}
	
	public function setIdBidding($idBidding){
		$this->idBidding = $idBidding;
	}
	
	public function getIdPerson(){
		return $this->idPerson;
	}
	
	public function setIdPerson($idPerson){
		$this->idPerson = $idPerson;
	}
	
	public function jsonSerialize() {
		return array($this->id,$this->dateOrder,$this->amountOrder,
				$this->statusOrder,$this->priceOrder,$this->idBidding,
				$this->idPerson);
	}
}
?>