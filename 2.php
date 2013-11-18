<?php
	$uid = $_POST['uid'];
	$picture = 'upload/'.$_FILES['myfile']['name'];
	move_uploaded_file($_FILES['myfile']['tmp_name'] , $picture);
	$data = addslashes(fread(fopen($picture, "r"), filesize($form_data)));
	include_once("dbconnect.inc.php");
	$con = db_connect();	
?>