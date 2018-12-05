<?php 

		include_once "DBConnect.php";

		class CheckoutModel extends DBConnect{
			function insertCustomer($fullname, $gender, $email, $address, $phone){
				//$data=[$fullname, $gender, $email, $address, $phone];
				$sql = "insert into customers(name, gender, email, address, phone) values ('$fullname','$gender','$email','$address','$phone')";
				$check =  $this->executeQuery($sql);
				if($check){
					return $this->getLastInsertId();
				}
				return false;
			}
			
			function insertBill($idCustomer,$dateOrder, $total, $promtPrice, $paymentMethod, $note, $token, $tokenDate){
        		$sql = "INSERT INTO bills(id_customer, date_order, total, promt_price,payment_method,note,token,token_date)
                		VALUES($idCustomer, '$dateOrder', $total, $promtPrice,'$paymentMethod', '$note', '$token', '$tokenDate')";
        		$check = $this->executeQuery($sql);
        		if($check){
					return $this->getLastInsertId();
				}
				return false;
   			}
    		function insertBillDetail($idBill,$idProduct,$quantity,$price, $discountPrice){
        		$sql = "INSERT INTO bill_detail(id_bill,id_product,quantity,price,discount_price)
                		VALUES ($idBill,$idProduct,$quantity,$price,$discountPrice)";
        		return $this->executeQuery($sql);
    		}

    		function delCustomer($idCustomer){

    			$sql = "Delete from customers where id = '$idCustomer'";
    			return $this->executeQuery($sql);
    		}
    		function delBill($idBill){
    			$sql = "Delete from bills where id = '$idBill'";
    			return $this->executeQuery($sql);
    		}
    		function delBillDetail($idBill){
    			$sql = "Delete from bill_detail where id_bill = '$idBill'";
    			return $this->executeQuery($sql);
    		}


            function selectBillByToken($token){
                $sql = "select * from bills where token = '$token'";
                return $this->getOneRow($sql);
            }

		}
 ?>