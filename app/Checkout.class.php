<?php
	
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	require_once "HttpConnection.class.php";
	require_once "XmlParser.class.php";
	require_once "PagSeguroData.class.php";
	
	class Checkout {
		
		private $pagSeguroData;
		
		
		public function __construct($sandbox = true) {
			$this->pagSeguroData = new PagSeguroData($sandbox);
		}
		
		public function showTemplate() {
			$isSandbox = $this->pagSeguroData->isSandbox();
			require 'templates/checkout.php';
			exit();
		}
		
		
		public function printSessionId() {
			
			// Creating a http connection (CURL abstraction)
			$httpConnection = new HttpConnection();
			
			// Request to PagSeguro Session API using Credentials
			$httpConnection->post($this->pagSeguroData->getSessionURL(), $this->pagSeguroData->getCredentials());
			
			// Request OK getting the result
			if ($httpConnection->getStatus() === 200) {
				
				$data = $httpConnection->getResponse();
				
				$sessionId = $this->parseSessionIdFromXml($data);
				
				echo $sessionId;
				
			} else {
				
				throw new Exception("API Request Error: ".$httpConnection->getStatus());
				
			}
			
		}
		
		public function getSessionId() {
			
			// Creating a http connection (CURL abstraction)
			$httpConnection = new HttpConnection();
			
			// Request to PagSeguro Session API using Credentials
			$httpConnection->post($this->pagSeguroData->getSessionURL(), $this->pagSeguroData->getCredentials());
			
			// Request OK getting the result
			if ($httpConnection->getStatus() === 200) {
				
				$data = $httpConnection->getResponse();
				
				$sessionId = $this->parseSessionIdFromXml($data);
				
				return $sessionId;
				
			} else {
				
				throw new Exception("API Request Error: ".$httpConnection->getStatus());
				
			}
			
		}		
		
		public function doPayment($params) {
			
			// Adding parameters
			
			$params += $this->pagSeguroData->getCredentials(); // add credentials
			$params['paymentMode'] = 'default'; // paymentMode
			$params['currency'] = 'BRL'; // Currency (only BRL)
			$params['reference'] = rand(0, 9999); // Setting the Application Order to Reference on PagSeguro
			
			// treat parameters here!
			$httpConnection = new HttpConnection();
			$httpConnection->post($this->pagSeguroData->getTransactionsURL(), $params);
			
			// Get Xml From response body
			$xmlArray = $this->paymentResultXml($httpConnection->getResponse());

			// Setting http status and show json as result
			//http_response_code($httpConnection->getStatus());
			header("HTTP/1.1 ".$httpConnection->getStatus());
			
			echo json_encode($xmlArray);
			
		}
		
		private function parseSessionIdFromXml($data) {
			
			// Creating an xml parser 
			$xmlParser = new XmlParser($data);
			
			// Verifying if is an XML
			if ($xml = $xmlParser->getResult("session")) {
				
				// Retrieving the id from "session node"
				return $xml['id'];
				
			} else {
				throw new Exception("[$data] is not an XML");
			}
			
		}
		
		
		private function paymentResultXml($data) {
			
			// Creating an xml parser 
			$xmlParser = new XmlParser($data);
			
			// Verifying if is an XML
			if ($xml = $xmlParser->getResult()) {
				return $xml;
			} else {
				throw new Exception("[$data] is not an XML");
			}
			
		}
		
		
		
	}
	
?>