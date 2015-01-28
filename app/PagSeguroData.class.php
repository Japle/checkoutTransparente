<?php
	
	class PagSeguroData {
		
		private $sandbox;
		
		private $sandboxData = Array(
			
			'credentials' => array(
				"email" => "japle_noodles@hotmail.com",
				"token" => "D29BDF43177840C89EFA6CFF6C0F7180"
			),
			
			'sessionURL' => "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions",
			'transactionsURL' => "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions",
			'javascriptURL' => "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"
		);
		
		private $productionData = Array(
			
			'credentials' => array(
				"email" => "japle_noodles@hotmail.com",
				"token" => "F6AEBAA77FF343A4ACA390E76C335511"
			),
			
			'sessionURL' => "https://ws.pagseguro.uol.com.br/v2/sessions",
			'transactionsURL' => "https://ws.pagseguro.uol.com.br/v2/transactions",
			'javascriptURL' => "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"
			
		);
		
		public function __construct($sandbox = false) {
			$this->sandbox = (bool)$sandbox;
		}
		
		private function getEnviromentData($key) {
			if ($this->sandbox) {
				return $this->sandboxData[$key];
			} else {
				return $this->productionData[$key];
			}
		}
		
		public function getSessionURL() {
			return $this->getEnviromentData('sessionURL');
		}
		
		public function getTransactionsURL() {
			return $this->getEnviromentData('transactionsURL');
		}
		
		public function getJavascriptURL() {
			return $this->getEnviromentData('javascriptURL');
		}
		
		public function getCredentials() {
			return $this->getEnviromentData('credentials');
		}
		
		public function isSandbox() {
			return (bool)$this->sandbox;
		}
		
	}
	
?>