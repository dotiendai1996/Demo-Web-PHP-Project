<?php 
		include_once "BaseController.php";
		include_once "model/HomeModel.php";
		class HomeController extends BaseController{
				function getHomePage(){
					//unset($a) : Hủy giá trị biến a
					$model = new HomeModel;
					$slide = $model->selectSlide();
					$specialProduct = $model->selectSpecialProduct();
					$newProduct = $model->selectNewProduct();
					$hotProduct = $model->selectHotProduct();
					$saleProduct = $model->selectSaleProduct();
					$type6Product = $model->selectProductType6();
					//print_r($hotProduct); die;
				//	print_r($specialProduct); die;
					$data = ['slide' => $slide,
							'specialProduct' => $specialProduct,
							'newProduct' => $newProduct,
							'hotProduct' => $hotProduct,
							'saleProduct' => $saleProduct,
							'type6Product' => $type6Product]	;

					return $this->loadView('home','Trang chủ',$data);
				}
		}
 ?>