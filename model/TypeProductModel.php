<?php 
		include_once "DBConnect.php";

		class TypeProductModel extends DBConnect{
			function selectCategories(){
				$sql = "select c.*, u.url as url from categories c 
				join page_url u on c.id_url = u.id";
				$data = [];
				return $this->getMoreRow($sql, $data);
			}
			function selectCategoriesByUrl($url){
				$sql = "select c.*, u.url as url from categories c join page_url u
						on c.id_url = u.id where u.url = ?";
				$data = [$url];
				return $this->getOneRow($sql, $data);
			}
			function selectProductsByCategory($id, $position = 0, $quantity = 12){
				//$data = [$id, $quantity];
				$sql = "select p.*, u.url from products p join categories c
						on p.id_type = c.id 
						join page_url u on u.id = p.id_url where c.id = $id limit $position,$quantity";
					return $this->getMoreRow($sql, []);
			}
			function selectCountProductsByCategory($id){
				$sql = "select count(id) as countProduct from products where id_type = $id";
				return $this->getOneRow($sql, []);
			}
			function selectCategoriesAndQuatityProducts(){
				$sql ="select count(p.id) as soluong, c.* from categories c join products p on p.id_type = c.id
						group by c.id";
				return $this->getMoreRow($sql,[]);
			}
			function selectProductByIdCategory($idType){
				$sql = "select p.*, u.url as url from products p
						join page_url u on p.id_url = u.id where p.id_type = ?";
				$data = [$idType];
				return $this->getMoreRow($sql, $data);
			}
		}
 ?>