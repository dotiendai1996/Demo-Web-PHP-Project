<?php 
	include_once "model/TypeProductModel.php";
	include_once "helper/Cart.php";
	session_start();

	class BaseController{
		private $domain = '';
		private $url = '';
		function loadView($view='home', $title = 'Home', array $data){
			$model = new TypeProductModel;
			$domain = $this->domain;
			$url = $this->url;
			$categories = $model->selectCategories();
			//print_r($categories); die;
			//code của layout.view.php
			include_once "view/layout.view.php";
		}
		function loadHtmlAjax($view, $data){
			include_once "view/ajax/ajax.$view.view.php";

		}

		function __construct(){
			$server = $_SERVER;
			//$domain = ''; //http://localhost
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$this->domain = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];
			// print_r($this->domain); die;
		//	print_r($_SERVER); die;
			$this->url = $this->domain.$_SERVER['REQUEST_URI'];
		}
		function load404Page($view='404error', $title = 'Không tìm thấy trang', array $data){
				include_once "view/layout.view.php";
		}
	}
 ?>