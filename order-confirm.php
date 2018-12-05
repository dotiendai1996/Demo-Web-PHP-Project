<?php 
	include_once "controller/CheckoutController.php";


	$rs = new CheckoutController;
	return $rs->confirmOrder();
 ?>