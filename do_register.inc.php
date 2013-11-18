<?php

	include_once("dbconnect.inc.php");
	include_once("function.inc.php");
	function register($form){
		
		$con = db_connect();
		$form= addslashes_deep($form);
		extract($form);
		
		$result = mysql_query("select * from `User` where `username` = '".$username."'",$con);
		if(!$result){
			die("mysql error:".mysql_error());
		}
		if (mysql_num_rows($result) > 0)  {
			throw new Exception('exist username');			
		} 
		$reg_time = date("Y-m-d");
		
		$query="insert into `User`(";
		$value="(";
		if(isset($username)){
			$query = $query."`username`";
			$value = $value."'".$username."'";
		}
		if(isset($password)){
			$query = $query.",`password`";
			$value = $value.",'".$password."'";
		}
		if(isset($reg_time)){
			$query = $query.",`reg_time`";
			$value = $value.",'".$reg_time."'";
		}
		if(isset($gender)){
			$query = $query.",`gender`";
			$value = $value.",'".$gender."'";
		}
		if(isset($email)){
			$query = $query.",`email`";
			$value = $value.",'".$email."'";
		}
		if(isset($birth)){
			$query = $query.",`birth`";
			$value = $value.",'".$birth."'";
		}
		if(isset($signature)){
			$query = $query.",`signature`";
			$value = $value.",'".$signature."'";
		}
		$query =$query.") values ".$value.")";
		$result = mysql_query($query);
		if(!$result){
			die("mysql error:".mysql_error());
		}
		return true;
		
		

		
	}
//do my job	
	
?>
