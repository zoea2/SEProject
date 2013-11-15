<?php

	include_once("dbconnect.inc.php");
	function register($form){
		
		$con = db_connect();
		extract($form);
		$password = md5($password);
		if(!isset($username)){
			throw new Exception('请填入用户名');
		}
		if(!isset($password)){
			throw new Exception('请输入密码');
		}
		
		$result = mysql_query("select * from `User` where `username` = '".$username."'",$con);
		if(!$result){
			die("mysql error:".mysql_error());
		}
		if (mysql_num_rows($result) > 0)  {
			throw new Exception('该用户名已存在');
			
		} 
		$reg_time = date("Y-m-d");
		$result = mysql_query("insert into `User`(`username`,`password`,`reg_time`) values ('".$username."','".$password."','".$reg_time."')");
		if(!$result){
			die("mysql error:".mysql_error());
		}
		return true;
		
	}
//do my job	
	
?>
<script type="text/javascript">
<!--
	function createBirthForm(){
		document.write("fuck");
	}
-->

</script>
