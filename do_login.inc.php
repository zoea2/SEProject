<?php

	include_once("dbconnect.inc.php");
	function login($username,$password){

		$con = db_connect();
		$password = md5($password);
		//echo $password;
		$result = mysql_query("select * from `User` where `username` = '".$username."' and `password` = '".$password."'",$con);
		if (mysql_num_rows($result) > 0) {
			if($row = mysql_fetch_array($result)){
				session_start();
				$_SESSION["uid"] =  $row["uid"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["auth"] = $row["auth"];
			}
		} else {
			throw new Exception('login fail');
		}
		
	}
	
	
?>