<?php
require 'app/business/delegate.php';
require 'vendor/autoload.php';

class ProvisioningTest extends PHPUnit_Framework_TestCase{
	
	private function testGetResponse($response) {
		$this->assertStringEndsWith ( "200", ( string ) $response->getStatusCode () );
		$this->assertSame ( 'OK', $response->getReasonPhrase () );
		
		$arrayCatalog = json_decode ( ( string ) $response->getBody () );
		$this->assertNotNull ( $arrayCatalog );
		$this->assertTrue(count($arrayCatalog)>0);

	}
	
	public function testCountryCatalog(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$request = new GuzzleHttp\Psr7\Request('GET','/provisioning.php?option=country');
		$response = $client->send($request);
		$this->testGetResponse($response);
	}
	
	public function testSexCatalog(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$request = new GuzzleHttp\Psr7\Request('GET','/provisioning.php?option=sex');
		$response = $client->send($request);
		$this->testGetResponse($response);
	}
	
	public function testNationalityCatalog(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$request = new GuzzleHttp\Psr7\Request('GET','/provisioning.php?option=nationality');
		$response = $client->send($request);
		$this->testGetResponse($response);
	}
	
	public function testFundOriginCatalog(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$request = new GuzzleHttp\Psr7\Request('GET','/provisioning.php?option=fundOrigin');
		$response = $client->send($request);
		$this->testGetResponse($response);
	}
	
	public function testOcupationCatalog(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$request = new GuzzleHttp\Psr7\Request('GET','/provisioning.php?option=ocupation');
		$response = $client->send($request);
		$this->testGetResponse($response);
	}
	
	public function testStatusPersonCatalog(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$request = new GuzzleHttp\Psr7\Request('GET','/provisioning.php?option=statusperson');
		$response = $client->send($request);
		$this->testGetResponse($response);
	}
	
	public function testAccountTypeCatalog(){
	
		// create our http client (Guzzle)
		$client = new GuzzleHttp\Client(['base_uri'=>'http://localhost']);
		$request = new GuzzleHttp\Psr7\Request('GET','/provisioning.php?option=accounttype');
		$response = $client->send($request);
		$this->testGetResponse($response);
	}	
	
	
}

?>