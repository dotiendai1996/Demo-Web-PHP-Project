<?php 
		include_once "DBConnect.php";

		class SingleProductModel extends DBConnect{
			function selectSingleProduct($id, $url){
				$data=[$id, $url];
				$sql = "select p.* from products p join page_url u
					on p.id_url = u.id where p.id = ? and u.url = ?";
				return $this->getOneRow($sql, $data);
			}
			function selectRelatedProduct($id_type, $id){
				$data=[$id_type, $id];
				$sql = "select p.*, url from products p  
						join page_url u on p.id_url = u.id where p.id_type = ? and p.id <> ? ";
						return $this->getMoreRow($sql,$data);
			}
		}
 ?>