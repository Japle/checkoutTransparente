<?php
	
	require "app/Checkout.class.php";
		
	$checkout = new Checkout();
	$checkout->doPayment($_POST);
	
?>