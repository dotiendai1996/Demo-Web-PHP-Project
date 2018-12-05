<?php 

	include_once "controller/CheckoutController.php";

	/*if($_SERVER['REQUEST_METHOD'] == "GET"){
		header('Location: trang-chu');
		return;
	}*/
	
	$rs = new CheckoutController;

	//if(($_SERVER['REQUEST_METHOD'] == "POST") && (isset($_POST['gotoCheckout']))){
		//print_r($_SERVER["REQUEST_METHOD"]); die;
		
	//}

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$rs->postCheckout();
	}

	
	$rs->getCheckoutPage();
	


 ?>