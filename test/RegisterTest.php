<?php
require 'app/business/delegate.php';
require 'vendor/autoload.php';

class RegisterTest extends PHPUnit_Framework_TestCase{
	
	public function testUserRegister(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$data['address1'] = "prueba 1";
		$data['address2'] = "prueba 2";
		$data['address3'] = "prueba 3";
		$data['birthDate'] = date("Y-m-d");
		$data['name'] = "prueba";
		$data['lastname'] = "prueba last";
		$data['postalcode'] = "1000";
		$data['username'] = 'prueba2@correo.com';
		$data['email'] = date("His").'@correo.com';
		$data['country'] = "1";
		$data['nationality'] = "1";
		$data['phonenumber'] = "000 0000";
		$data['mobilenumber'] = "999 0000";
		$data['sex'] = "1";
		$data['idOcupation'] = "1";
		$data['idFundOrigin'] = "1";
		$data['idOperationType'] = "1";
		$data['acceptterms'] = 1;
		//echo json_encode($data);
		$response = $client->request('POST',
				'/register.php?option=user',
				['form_params' => $data]);
		$this->testPostResponse($response);
	}
	
	public function testAccountRegister(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$data['holder'] = "juan figueroa";
		$data['address'] = "mm m m m mm ";
		$data['bankName'] = "prueba";
		$data['codeABA'] = "00000";
		$data['numberaccount'] = "000 000 000000000".date('s');
		$data['idperson'] = 88;
		$data['accounttype'] = 1;
		$response = $client->request('POST',
				'/register.php?option=account',
				['form_params' => $data]);
		$this->testPostResponse($response);
	}
	
	public function testBidRegister(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$data['dateInit'] = date('Y-m-d');
		$data['dateEnd'] = date('Y-m-d');
		$data['totalAmountOffered'] = 10000;
		$data['totalAmountAwared'] = date('s');		
		$response = $client->request('POST',
				'/register.php?option=bid',
				['form_params' => $data]);
		$this->testPostResponse($response);
	}
	 
	public function testDocumentRegister(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$data['name'] = "prueba";
		$data['name'] = "prueba";
		$data['name'] = "prueba";
		$data['name'] = "prueba";
		$response = $client->request('POST',
				'/register.php?option=document',
				['form_params' => $data]);
		$this->testPostResponse($response);
	}
	
	public function testOperationRegister(){
	
// 	create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$data['dateOrder'] = date('Y-m-d');
		$data['amountOrder'] = 1000;
		$data['priceOrder'] = 89+date('s');
		$data['idBidding'] = 1;
		$data['idPerson'] = 1;
		$response = $client->request('POST',
				'/register.php?option=order',
				['form_params' => $data]);
		$this->testPostResponse($response);
	}
	
	private function testPostResponse($response) {
		$this->assertStringEndsWith ( "200", ( string ) $response->getStatusCode () );
		$this->assertSame ( 'OK', $response->getReasonPhrase () );
		//var_dump($response);
		//var_dump(( string ) $response->getBody ());
		$arrayCatalog = ( string ) $response->getBody();
		//var_dump($arrayCatalog);
		echo "\n--->".$arrayCatalog."<--------";
		$this->assertNotNull ( $arrayCatalog );
		$this->assertTrue(count($arrayCatalog)>0);
	
	}
}
?>