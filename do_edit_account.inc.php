<?php
	include_once("dbconnect.inc.php");
	include_once("function.inc.php");
	function edit_info($form){
		
		$form = addslashes_deep($form);
		$con = db_connect();
		extract($form);
		
		
		$query="update `User` set ";
		$dot ="";
		if(isset($gender)){
			$query = $query.$dot." `gender` = '".$gender."' ";
			$dot=",";
		}
		if(isset($email)){
			$query = $query.$dot." `email` = '".$email."' ";
			$dot=",";
		}
		if(isset($birth)){
			$query = $query.$dot."`birth` = '".$birth."' ";
			$dot=",";
		}
		if(isset($signature)){
			$query = $query.$dot."`signature` = '".$signature."' ";
			$dot=",";
		}
		$query = $query."where `uid` = '{$uid}'"; 
		$result = mysql_query($query,$con);
		if(!$result){
			die("mysql error:".mysql_error());
		}
		if(mysql_affected_rows() == 0){
			return false;
		}
		return true;
		
	}
	function edit_password($uid,$newpassword,$oldpassword){
		$query = "update `User` set `password` = '$newpassword' where `uid` = '$uid' and `password` = '$oldpassword' ";
		$con = db_connect();
		$result = mysql_query($query);
		if(!$result){
			die("mysql error:".mysql_error());
		}
		if(mysql_affected_rows() == 0){
			return false;
		}
		else return true;
	}
?>