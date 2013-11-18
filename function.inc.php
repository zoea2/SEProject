<?php
	#对数组form 内的字符串进行转义处理
	function check_form($form){
		if(!get_magic_quotes_gpc()){
			for($i = 0;$i < count($form);$i ++){
				$form[$i] = addslashes($form[$i]);
			}
		}
	}
	function check_code($code){
		//print_r($_SESSION);
		if(isset($_SESSION['checkcode']))
			return $_SESSION['checkcode'] == $code;
		else
			return false;
	}
	
?>