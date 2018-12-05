<?php 

		include_once "DBConnect.php";

		class CartModel extends DBConnect{
			function selectInfoProduct($id){
				$data = [$id];
				$sql = "Select id, name, image, price, promotion_price from products 
				where id=? and deleted=0";
				return $this->getOneRow($sql, $data);

			}
		}


		//mảng 5 phần tử, làm sao random
 ?>
