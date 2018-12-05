<?php 
		class DBConnect{
			private $db = null;
			private $sttm = null;
			function __construct($dbName='db_banhang',$userSql='root',$passSql=''){
				$serverSql = 'localhost';
				//$userSql = 'root';
				//$passSql = '';
				try{
					$this->db = new PDO("mysql:host=$serverSql;dbname=$dbName",$userSql, $passSql);
					$this->db->exec('set names utf8');
					//echo "connected";
				}catch(\Exception $e){
					echo $e->getMessage();
					die;
				}
			}

			// for INSERT/UPDATE/DELETE	
			function executeQuery($sql, $data = []){
				$sttm = $this->db->prepare($sql);
				return $sttm->execute(); //return bool
			}

			//getLastId
			function getLastInsertId(){
				return $this->db->lastInsertId();
			}

			//setStatement
			function setStatement($sql,$data=[]){
				$this->sttm = $this->db->prepare($sql);
					for($i = 1; $i<=count($data);$i++){
						$this->sttm->bindValue($i,$data[$i-1]);
					}
			
				return $this->sttm->execute(); //return bool
			}

			//for SELECT 1 row
			function getOneRow($sql, $data = []){
				$check = $this->setStatement($sql, $data);
				if($check){
					return $this->sttm->fetch(PDO::FETCH_OBJ);
				}else{ return false; }
				// throw new Exception(Wrong sql: $sql);
			}
			//for SELECT > 1 row
			function getMoreRow($sql, $data =[]){
				$check = $this->setStatement($sql, $data);
				if($check){
					return $this->sttm->fetchAll(PDO::FETCH_OBJ);
				}else{return false;}
			}
		}
 ?>