<html>


<?php
	
	session_set_cookie_params(3600);
	session_start();
	include("header.inc.php");
	include_once("function.inc.php");
	if(isset($_POST["op"]) == "Submit"){
	//echo $_SESSION['code'];
		include_once("do_login.inc.php");
		
		$code = strtoupper($_POST["checkcode"]);
		if(check_code($code)){
			try{
				login($_POST['username'],$_POST['password']);
				header("Location:nice.php");
			}
			catch (Exception $e){
				$error_msg = "username or password was wrong";
			}			
		}
		else{
			$error_msg ="checkcode was wrong";
		}	 				
	}
	if(isset($_SESSION['uid'])){
		header("Location:nice.php");
	}
?>


<div id = "login_frame">

<form action="login.php" method="post">
<table>
<tr><td>Username:</td> <td><input type="text" name="username" /></td></tr>
<tr><td>Password: </td><td><input type="password" name="password" /></td></tr>
<tr><td>CheckCode:</td><td><input type="text" name = "checkcode" /></td></tr>
</table>
	<div><img id = "codeImg" src="createCheckCode.php" onclick="reCreatCode()"></div>
	<div><input type="submit" name = "op" value = "Submit" /><a href ="register.php">register</a></div>
	<div>
		<?php 
			if(isset($error_msg)){
				echo $error_msg;
			}
		?>
	</div>	
</form>

</div>
</html>