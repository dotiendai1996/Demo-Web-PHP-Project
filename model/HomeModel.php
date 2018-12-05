<?php 
		include_once "DBConnect.php";

		class HomeModel extends DBConnect{
			function selectSlide(){
				$sql = "select * from slide where status=1";
				$data = [];
				return $this->getMoreRow($sql,$data);
			}
			function selectSpecialProduct(){
				$sql = "select p.*, u.url as url from products p 
				join page_url u on p.id_url = u.id where status = 1";
				$data = [];
				return $this->getMoreRow($sql,$data);
			}
			function selectNewProduct(){
				$sql = "select p.*, u.url as url from products p 
					join page_url u 
					on p.id_url = u.id where new = 1";
				$data = [];
				return $this->getMoreRow($sql,$data);
			}
			function selectHotProduct(){
				$sql = "select sum(quantity) as quantity, id_product, p.*, u.url as url from bill_detail b
						join products p on b.id_product = p.id
						join page_url u on u.id = p.id_url
						group by id_product order by quantity DESC limit 0,5 ";
				$data = [];
				return $this->getMoreRow($sql, $data);
			}
			function selectProductType6(){
				$sql = "select p.*, u.url as url from products p 
					join page_url u on p.id_url = u.id 
					join categories c on c.id = p.id_type
					where c.id = 6 order by price ASC";
				$data = [];
				return $this->getMoreRow($sql, $data);
			}
			function selectSaleProduct(){
				$sql = "select p.*, u.url as url from products p
					join page_url u on p.id_url = u.id
					join categories c on c.id = p.id_type
					where promotion_price > 0 ";
				$data = [];
				return $this->getMoreRow($sql, $data);
			}
			
		}
 ?>