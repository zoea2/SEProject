<?php

	include_once("dbconnect.inc.php");
	include_once("function.inc.php")
	function login($username,$password){

		$con = db_connect();
		$username = stripslashes_deep($username);
		//echo $password;
		$result = mysql_query("select * from `User` where `username` = '".$username."' and `password` = '".$password."'",$con);
		if (mysql_num_rows($result) > 0) {
			if($row = mysql_fetch_array($result)){
				//session_start();
				$_SESSION["uid"] =  $row["uid"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["auth"] = $row["auth"];
			}
		} else {
			return ["error"=>"no query result"];
		}
		
	}
?>