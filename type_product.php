<?php 
	include_once "controller/TypeProductController.php";


	$rs = new TypeProductController;
	if(isset($_POST['idType'])){
		return $rs->getProductMenuLeft();

	}
	
	return $rs->getTypeProductPage();
 ?>