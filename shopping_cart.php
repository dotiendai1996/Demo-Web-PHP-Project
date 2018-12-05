<?php 
	

	include_once "controller/ShoppingCartController.php";

	/*if($_SERVER['REQUEST_METHOD'] == "GET"){
		header('Location: 404.html');
		return;
	}*/
	$rs = new ShoppingCartController;

	
	
	if(isset($_POST['action']) && $_POST['action'] == 'update') {
		return $rs->updateCart();
	}

	if(isset($_POST['action']) && $_POST['action'] == 'delete') {
		return $rs->deleteCart();
	}

	if(isset($_POST['idSP'])){
		return $rs->addToCart();
	}


	return $rs->getShoppingCartPage();
 ?>