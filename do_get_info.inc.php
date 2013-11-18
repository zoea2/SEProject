<?php
	include_once("dbconnect.inc.php");	
	include_once("function.inc.php");
	function get_info($uid){
		$con = db_connect();
		$query = "select * from `User` where `uid` = '".$uid."'";
		$result = mysql_query($query,$con);
		if(!$result){
			die("mysql error:".mysql_error());
		}
		if(mysql_num_rows($result) > 0){
			$result =  mysql_fetch_array($result);
			$result = stripslashes_deep($result);
			unset($result["password"]);
			return $result;
		}
		else {
			return ["error"=>"no query result"];
		}
	}
?>
