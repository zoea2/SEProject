<?php
	function db_connect(){
		include("setting.inc.php");
		$con =  mysql_connect($dbhost,$dbuser,$dbpass);
		if(!$con) die("mysql error:".mysql_error());
		mysql_select_db($dbname,$con);
		return $con;
	}
?>