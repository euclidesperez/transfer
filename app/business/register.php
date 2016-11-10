<?php
require_once 'app/dao/PersonDAO.php';
require_once 'app/dao/AccountInformationDAO.php';
require_once 'app/dao/BiddingDAO.php';
require_once 'app/dao/PurchaseOrderDAO.php';

class Register{
	
	public function registerUser($postArray){
		//check not null fields
		$this->checkValueNotNullOrEmpty($postArray);		
		//create object
		$person = $this->createPerson($postArray);
		//validate person
		$this->validatePerson($person);
		//register person
		$personDAO = new PersonDAO();
		return $personDAO->register($person);
	}
	
	public function registerAccount($postArray){
		$this->checkValueNotNullOrEmpty($postArray);
		//create
		$account = $this->createAccount($postArray);
		//check account not exist
		$this->validateAccount($account);
		//register
		$accountDAO = new AccountInformationDAO();
		return $accountDAO->register($account);
	}
		
	public function registerBid($postArray){
		$this->checkValueNotNullOrEmpty($postArray);
		
		//create bid
		$bid = $this->createBid($postArray);
		
		$this->validateBid($bid);
		
		$bidDAO = new BiddingDAO();
		return $bidDAO->register($bid);
	}
	
	public function registerDocument($postArray){
		//check not null
		$this->checkValueNotNullOrEmpty($postArray);
		//create
		
		//validate
		
		//register
	}
	
	public function registerOperation($postArray){
		$this->checkValueNotNullOrEmpty($postArray);		
		//create object
		$purchase = $this->createOperation($postArray);
		//validate object
		$this->validateOperation($purchase);		
		//register
		$purchaseOrderDAO =  new PurchaseOrderDAO();
		return $purchaseOrderDAO->register($purchase);
	}
	
	private function createDocument($postArray){
		
	}
	
	private function checkValueNotNullOrEmpty($postArray){
		foreach ($postArray as $key=>$value){
			if(empty($value) || is_null($value) ){
				throw new Exception('Null or Empty Value');
			}
		}
	}
	
	private function createAccount($postArray){
		$account = new AccountInformation();
		foreach ($postArray as $key=>$value){
			if (strcasecmp ( $key, 'holder' ) === 0) {
				$account->setAccountHolder( $value );
			}
			if (strcasecmp ( $key, 'address' ) === 0) {
				$account->setAddress( $value );
			}
			if (strcasecmp ( $key, 'bankName' ) === 0) {
				$account->setBankName( $value );
			}
			if (strcasecmp ( $key, 'codeABA' ) === 0) {
				$account->setCodeAba( $value );
			}
			if (strcasecmp ( $key, 'numberAccount' ) === 0) {
				$account->setNumberAccount( $value );
			}
			if (strcasecmp ( $key, 'idPerson' ) === 0) {
				$account->setIdPerson( $value );
			}
			if (strcasecmp ( $key, 'accountType' ) === 0) {
				$account->setIdAccountType( $value );
			}
		}
		return $account;
	}
	
	private function createPerson($postArray){
		$person = new Person();
		foreach ($postArray as $key=>$value){
			if (strcasecmp ( $key, 'address1' ) === 0) {
				$person->setAddress1 ( $value );
			}				
			if (strcasecmp ( $key, 'address2' ) === 0) {
				$person->setAddress2 ( $value );
			}
			if (strcasecmp ( $key, 'address3' ) === 0) {
				$person->setAddress3 ( $value );
			}
			if (strcasecmp ( $key, 'birthDate' ) === 0) {
				$person->setBirthDate( $value );
			}
			if (strcasecmp ( $key, 'name' ) === 0) {
				$person->setName( $value );
			}
			if (strcasecmp ( $key, 'lastname' ) === 0) {
				$person->setLastName( $value );
			}
			if (strcasecmp ( $key, 'postalcode' ) === 0) {
				$person->setPostalCode( $value );
			}
			if (strcasecmp ( $key, 'country' ) === 0) {
				$person->setIdCountry( $value );
			}
			if (strcasecmp ( $key, 'nationality' ) === 0) {
				$person->setIdNationality( $value );
			}
			if (strcasecmp ( $key, 'phonenumber' ) === 0) {
				$person->setPhone( $value );
			}
			if (strcasecmp ( $key, 'mobilenumber' ) === 0) {
				$person->setMobile( $value );
			}
			if (strcasecmp ( $key, 'sex' ) === 0) {
				$person->setIdSex( $value );
			}
			if (strcasecmp ( $key, 'idOcupation' ) === 0) {
				$person->setIdOcupation( $value );
			}
			if (strcasecmp ( $key, 'idFundOrigin' ) === 0) {
				$person->setIdFundOrigin( $value );
			}
			if (strcasecmp ( $key, 'idOperationType' ) === 0) {
				$person->setIdOperationType( $value );
			}
			if (strcasecmp ( $key, 'acceptterms' ) === 0) {
				$person->setAcceptTerms( $value );
			}
			if (strcasecmp ( $key, 'username' ) === 0) {
				$person->setUsername( $value );
			}
			if (strcasecmp ( $key, 'email' ) === 0) {
				$person->setEmailPerson( $value );
			}
	
		}
		return $person;
	}

	private function createBid($postArray){
		$bid = new Bidding();
		foreach ($postArray as $key=>$value){
			if (strcasecmp ( $key, 'dateInit' ) === 0) {
				$bid->setDateInit( $value );
			}
			if (strcasecmp ( $key, 'dateEnd' ) === 0) {
				$bid->setDateEnd( $value );
			}
			if (strcasecmp ( $key, 'totalAmountOffered' ) === 0) {
				$bid->setTotalAmountOffered( $value );
			}
			if (strcasecmp ( $key, 'totalAmountAwared' ) === 0) {
				$bid->setTotalAmountAwared( $value );
			}
		}
		return $bid;
	}
	
	private function createOperation($postArray){
		$purchase = new PurchaseOrder();
		foreach ($postArray as $key=>$value){
			if (strcasecmp ( $key, 'dateOrder' ) === 0) {
				$purchase->setDateOrder( $value );
			}
			if (strcasecmp ( $key, 'amountOrder' ) === 0) {
				$purchase->setAmountOrder( $value );
			}
			if (strcasecmp ( $key, 'priceOrder' ) === 0) {
				$purchase->setPriceOrder( $value );
			}
			if (strcasecmp ( $key, 'idBidding' ) === 0) {
				$purchase->setIdBidding( $value );
			}
			if (strcasecmp ( $key, 'idPerson' ) === 0) {
				$purchase->setIdPerson( $value );
			}
		}
		return $purchase;
	}
	
	private function validateDocument($document){
		
	}
	
	private function validateOperation($purchase){
		$purchaseDAO = new PurchaseOrderDAO();
		$purchaseFound = $purchaseDAO->getPurchaseDuplicated($purchase);		
		if(!is_null($purchaseFound)){
			throw new Exception('Already exists an equal operation in the actual Bid');
		}
	}
	
	private function validatePerson($person){
		$personDAO = new PersonDAO();
		$foundPerson = $personDAO->getPersonByEmail($person);
		if(!is_null($foundPerson)){
			throw new Exception ('The Email is already registered');
		}
	}

	private function validateAccount($account){
		//validate format ABA
		//validate numberAccount
		//validate account does not exist same user
		$accountDAO = new AccountInformationDAO();
		$accountFound = $accountDAO->getAccountInformationSameUser($account);
		if(!is_null($accountFound)){
			throw new Exception ('The Account Number is already registered for this user');
		}
	}

	private function validateBid($bid){
		$bidDAO = new BiddingDAO();
		$bidFound = $bidDAO->getBiddingSameDate($bid);
		if(!is_null($bidFound)){
			throw new Exception("A Bid is alreadey register for that date");
		}
		
	}


}
?>