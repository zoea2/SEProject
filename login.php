<html>


<?php
	
	session_set_cookie_params(3600);
	session_start();
	include("header.inc.php");
	include_once("function.inc.php");
	if(isset($_POST["op"]) == "Login"){
	//echo $_SESSION['code'];
		//print_r($_POST);
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
<script type="text/javascript" src = "md5.js"></script>
<script type="text/javascript" >
	function check_msg(){
		if(document.getElementById('usernames').value == "")
			alert("Please input your username");
		else if(document.getElementById("password").value == "")
			alert("Please input your password");	
		else if(document.getElementById('checkcodeinput').value == "")
			alert("Please input checkcode");
		else{
			md5encode("password");
			document.getElementById('loginForm').submit();
		}

	}
</script>	
<div id = "login_frame">
<form action="login.php" method="post" id= "loginForm">
<table>
<tr><td>Username:</td> <td><input type="text" name="username" id="usernames" /></td></tr>
<tr><td>Password: </td><td><input type="password" name="password" id="password" /></td></tr>
<tr><td>CheckCode:</td><td><input type="text" name ="checkcode" id="checkcodeinput" /></td></tr>

</table>
	<div><img id = "codeImg" src="createCheckCode.php" onclick="reCreatCode()"></div>
	<div><input type="button" onclick = 'check_msg()' value="Login" /><a href ="register.php">register</a></div>
	<input type="hidden" name="op" value="Login"/> 
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