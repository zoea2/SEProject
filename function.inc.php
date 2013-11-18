<?php
	#对数组form 内的字符串进行转义处理
	function addslashes_deep($value){
		if(!get_magic_quotes_gpc()){
			 $value = is_array($value) ?
               array_map('addslashes_deep', $value) :
               addslashes($value);

			return $value;
		}
		
		return $value;
	}
	function stripslashes_deep($value)
	{
		$value = is_array($value) ?
                array_map('stripslashes_deep', $value) :
                stripslashes($value);

		return $value;
	}
	function check_code($code){
		//print_r($_SESSION);
		if(isset($_SESSION['checkcode']))
			return $_SESSION['checkcode'] == $code;
		else
			return false;
	}
	
?>