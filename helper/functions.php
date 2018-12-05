<?php 
	function strRandom(){
		$str_random = '';
		$str = "0123456789qwertyuiopasdfghjklzxcvbnmABCDEFGHIKLMNOPQRSUVXYZ";

		for($i = 0; $i<=50; $i++){
			$rand_position = rand(0,strlen($str)-1);
			$str_random .= substr($str, $rand_position, 1); // cắt chuỗi bằng substr
			//c2: 
			//$str_random .= $str[$rand_position];
		}
		return $str_random;
	}


	//qarhmhrFS7CseEfdK93pAwMjvtvf2AarYnDn0RuS0VurBEmfODH
	//juvz9wmdsDSia0drpv2LG2nBiHCDq0iAuP6j3GNhdHGGH6V3DZO
	//3VSPNulltmu63szDzI5oIhKqKtvju5np2zqQKCs1yB7p0BZzd4N
 ?>
