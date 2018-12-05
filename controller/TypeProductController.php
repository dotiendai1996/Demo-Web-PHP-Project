<?php 
	include_once "BaseController.php";
	include_once "model/TypeProductModel.php";
	include_once "helper/Pager.php";

	class TypeProductController extends BaseController{
		function getTypeProductPage(){

			$urlType = $_GET['url'];

			$model = new TypeProductModel;

			$categories = $model->selectCategoriesByUrl($urlType);

			//var_dump($products); die;
			//var_dump($categories); die;
			if(!$categories){
				//header('Location:404.html');
				return $this->loadView('404error',"Không tìm thấy",[]);
				return;
			}
			$idType = $categories->id;
			if(isset($_GET['page']) && $_GET['page'] > 0 && is_numeric($_GET['page'])){
				$page = (int) $_GET['page'];
				//echo $page; die;
			}else{
				$page = 1;
				//echo $page; die;
			}
			//echo $page;
			$itemPerPage = 12; // Số sản phẩm trên một trang
			$position = ($page-1)*$itemPerPage; // Vị trí đứng của sản phẩm trong sQL
			$countProduct = $model->selectCountProductsByCategory($idType); //tổng số sp
			// $totalPage = ceil($totalItem/$itemPerPage);// tổng số page
			// print_r($totalPage); die;
			// print_r($totalPage->countProduct) ; die;
			$products = $model->selectProductsByCategory($idType, $position, $itemPerPage);
		//	var_dump($products); 
		//	var_dump($categories); die;
			//echo $urlType; die;
			if(!$products){
				//header('Location:404.html');
				return $this->loadView('404error',"Không tìm thấy",[]);
				return;
			}
				$pager = new Pager($countProduct->countProduct, $page,$itemPerPage, 3 );
				$pagination = $pager->showPagination();

				$allcategories = $model->selectCategoriesAndQuatityProducts();
				//var_dump($allcategories); die;
			//echo $urlType; die;
			$data = ['categories' => $categories,
					'products' => $products,
					'pagination' => $pagination,
					'allcategories' => $allcategories];
			//var_dump($data['categories']->name); die;
			return $this->loadView('typeproduct',$categories->name,$data);

		}

		function getProductMenuLeft(){
			$idType = $_POST['idType'];
			//echo $idType; die;
			$model = new TypeProductModel;

			$products = $model->selectProductByIdCategory($idType);
			//print_r($products); die;
			$data = ['products' => $products];
			return $this->loadHtmlAjax('typeproduct',$data);
		}

	}

 ?>