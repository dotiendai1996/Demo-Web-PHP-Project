<?php 
	include_once "BaseController.php";
	include_once "model/CartModel.php";
	include_once "helper/Cart.php";
	// session_start();

	class ShoppingCartController extends BaseController{
	
		function getShoppingCartPage(){
			$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
			$data = ['cart' => $cart];
			return $this->loadView('shoppingcart','Giỏ hàng', $data);
		}
		function addToCart(){
			$model = new CartModel;
			
			$id = $_POST['idSP'];
			$info = $model->selectInfoProduct($id);
			if(!$info){
				echo json_encode(['code'=>0,
            'message'=>$info->name." không tìm thấy."]);

			}
			
			//var_dump($info); die;
			$qty = isset($_POST['qty']) ? $_POST['qty'] : 1;
			$oldCart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : null;

			$cart = new Cart($oldCart);
			$cart->add($info, $qty);

			$_SESSION["cart"] = $cart;
		//	print_r($_SESSION["cart"]); die;

			echo json_encode(['code'=>1,
           'message'=>$info->name." đã được thêm vào giỏ hàng!",
           'data'=>$cart->totalQty. 'SP: '.number_format($cart->promtPrice),
           'test'=>$_SESSION['cart']]);
		}

		function updateCart(){
			$model = new CartModel;
			$idSP = $_POST['idSP'];
			//echo "1";
			$info = $model->selectInfoProduct($idSP);

			if(!$info){
				echo json_encode(['code'=>0,
            'message'=>$info->name." không tìm thấy."]);

			}
			$qty = $_POST['qty'];
			$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		//	print_r($oldCart);
			$cart = new Cart($oldCart);
			$cart->update($info, $qty);
			$_SESSION['cart'] = $cart;
			//print_r($_SESSION['cart'] = $cart);

		echo json_encode([
			'code'=>'1',
				'message'=>'Update thành công',
				'data'=>[
						'cart_header'=>$cart->totalQty. 'SP: '.number_format($cart->promtPrice),
						'price'=>number_format($cart->items[$idSP]['price']),
						'discountPrice'=>number_format($cart->items[$idSP]['discountPrice']),
						'totalPrice'=>number_format($cart->totalPrice),
						'promtPrice'=>number_format($cart->promtPrice)
						]
		]);

		}

		function deleteCart(){
			$idSP = $_POST['idSP'];
			$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		//	print_r($oldCart); die;
			$cart = new Cart($oldCart);
			$cart->removeItem($idSP);

			$_SESSION['cart'] = $cart;
		echo json_encode([
			'code'=>'1',
				'message'=>'Delete thành công',
				'data'=>[
						'cart_header'=>$cart->totalQty. 'SP: '.number_format($cart->promtPrice),
						//'price'=>number_format($cart->items[$idSP]['price']),
						//'discountPrice'=>number_format($cart->items[$idSP]['discountPrice']),
						'totalPrice'=>number_format($cart->totalPrice),
						'promtPrice'=>number_format($cart->promtPrice)
						]
		]);
		}
	}
 ?>