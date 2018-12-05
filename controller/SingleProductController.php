<?php 
	
	include_once "BaseController.php";
	include_once "model/SingleProductModel.php";

	class SingleProductController extends BaseController{
		function getSingleProductPage(){
				$model = new SingleProductModel;
			$url = $_GET['url'];
			$id = $_GET['id'];
		
			$singleProduct = $model->selectSingleProduct($id, $url);
				$id_type = trim($singleProduct->id_type);
			$idProduct = trim($singleProduct->id);
			if(!$singleProduct){
				//header('Location:404.html');
				return $this->loadView('404error','Không tìm thấy',[]);
				return;
			}
			$relatedProduct = $model->selectRelatedProduct($id_type, $idProduct);
			//var_dump($singleProduct); die;
			$data = ['singleProduct' => $singleProduct,
					'relatedProduct' => $relatedProduct];
			return $this->loadView('singleproduct',$singleProduct->name,$data);

		}
	}
 ?>