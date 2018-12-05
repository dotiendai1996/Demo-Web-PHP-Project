<?php 

	include "BaseController.php";

	class AccountPageController extends BaseController{
		function getAccountPage(){
			return $this->loadView('accountpage');
		}
	} 
 ?>