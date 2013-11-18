<?php
	session_set_cookie_params(3600);
	session_start();
	if(isset($_SESSION["uid"])){
		echo "login success";
	}
	else
		header("Location:login.php");
	if(isset($_POST["logout"]) == "Logout"){
		session_destroy();
		header("Location:login.php");
	}
?>
<form action="nice.php" method="post">
<input type="submit" name = "logout" value = "Logout" />
</form>