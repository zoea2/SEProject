<?php
	session_set_cookie_params(3600);
	session_start();
	if(isset($_SESSION["uid"])){
		echo "login success";
	}
	else
		header("Location:login.php");
	if(isset($_POST["logout"])){
		session_destroy();
		header("Location:login.php");
	}
	else if(isset($_POST["editInfo"]))
		header("Location:edit_account.php");
	else if(isset($_POST["editpwd"]))
		header("Location:edit_passwd.php");
?>
<form action="nice.php" method="post">
<input type="submit" name = "logout" value = "Logout" />
<input type="submit" name = "editInfo" value = "edit user infomation"/>
<input type="submit" name = "editpwd" value = "edit password"/>
</form>