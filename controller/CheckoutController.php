<?php 
	
	include "BaseController.php";
	include_once "model/CheckoutModel.php";
	include_once "helper/Cart.php";
	include_once "helper/functions.php";
	include_once "helper/Mail.php";
	!isset($_SESSION) ? session_start() : '';
	//include "helper/Cart.php";

	class CheckoutController extends BaseController{
		function getCheckoutPage(){
			$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
		//	var_dump($oldCart); die;
			if($oldCart !=null){
				$data = ['cart'=>$oldCart];
				return $this->loadView('checkout','Thanh toán',$data);
			}else{
				header('Location: index.php');
			}

		}

		function postCheckout(){
			$customer = $_POST;
			// print_r($customer); die;
			$full_name = $_POST['full_name'];
			$gender = $_POST['gender'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$paymentMethod = $_POST['payment_method'];
			$note = $_POST['note'];
			//print_r($paymentMethod); die;
			$model = new CheckoutModel;
			$idCustomer = $model->insertCustomer($full_name, $gender, $email, $address, $phone);
			// print_r($insertCustomer); die;
			if($idCustomer){
				//print_r("thanh cong"); die;
				//insertBill
				$dateOrder = date('Y-m-d H:i:s', time());
				$oldCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;

				//$cart = new Cart;
				$totalPrice = $oldCart->totalPrice;
				$promtPrice = $oldCart->promtPrice;
				$tokenDate = $dateOrder;
				$token = strRandom();
				//print_r($oldCart); die;
				$idBill = $model->insertBill($idCustomer, $dateOrder, $totalPrice, $promtPrice, $paymentMethod, $note, $token, $tokenDate);
				if($idBill){
					//insertBillDetail
					//print_r($idBill); die;
					//print_r($oldCart); die;
					foreach($oldCart->items as $idProduct=>$item) {
						# code...
						$quantity = $item['qty'];
						$price = $item['price'];
						$discountPrice = $item['discountPrice'];
						//print_r($quantity); die;
						$check = $model->insertBillDetail($idBill,$idProduct,$quantity,$price, $discountPrice);
						if($check == false){
							$model->delBillDetail($idBill);
							$model->delBill($idBill);
							$model->delCustomer($idCustomer);
							return $_SESSION['error'] = "Có lỗi xảy ra. Vui lòng thử lại.";
						}
					}
					$subject = "Đặt hàng thành công - Xác nhận đơn hàng $idBill";
					$link = "http://localhost:8888/shop2408/order/$token";
					//print_r($promtPrice); die;
					$message = "<p>
					Chào $full_name. <br/>
					Đơn hàng của bạn đã đặt hàng thành công. <br/>
					Tổng giá đơn hàng: <b>".number_format($promtPrice)."</b>.<br/>
					Vui lòng nhấp vào <a href='$link'>đây</a> để xác nhận đơn hàng.</p> 
					<img src='http://imgt.taimienphi.vn/cf/Images/nth/2015/3/phan-biet-cc-va-bcc-trong-email.jpg'/>
		    			<p>Xin cảm ơn.</p>";

					sendMail($email, $full_name, $subject, $message);
					
					return $_SESSION['success'] = "Đặt hàng thành công. Bạn vui lòng kiểm tra email để xác nhận đơn hàng.";
					
				}else{
					$model->delCustomer($idCustomer);
					return $_SESSION['error'] = "Có lỗi xảy ra. Vui lòng thử lại.";
				}
			}	
			else{
				return $_SESSION['error'] = "Có lỗi xảy ra. Vui lòng thử lại.";
				//print_r("that bai");

			}
			header('Location: dat-hang');
		}

		function confirmOrder(){
			$token = trim($_GET['token']);
			//print_r($token); die;
			if($token == ''){
				$_SESSION['error'] = "Liên kết bạn nhập vào không hợp lệ, vui lòng thử lại.";
				header('Location: ./404error.php');
			}
			$model = new CheckoutModel;
			$bill = $model->selectBillByToken($token);
			if(!$bill){
				$_SESSION['error'] = "Liên kết bạn nhập vào không hợp lệ, vui lòng thử lại.";
				header('Location:http://location:8888/shop2408/404ersror.php');
			}
			print_r($bill);
		}
	}
 ?>