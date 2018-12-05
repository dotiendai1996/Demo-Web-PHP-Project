<?php 
	
	include_once "BaseController.php";

	class SinglePostController extends BaseController{
		function getSinglePostPage(){
			return $this->loadView('singlepost');
		}
	}
 ?>