<?php
	if(isset($_POST["op"]) && $_POST["op"] == true){
		session_start();
		include_once("do_edit_account.inc.php");
		if(edit_password($_SESSION['uid'],$_POST["password"],$_POST["oldpasswd"])){
			?>
			<script type="text/javascript">
				alert("modified success");
				window.location.href="nice.php";
			</script>
			<?php
			//header("Location:nice.php");
		}
		else{
			?>
			<script type="text/javascript">
				alert("modified fail");
			</script>
			<?php
			
		}
	}
?>
<script type="text/javascript" src="md5.js" ></script>
<script type="text/javascript" >
	
	function check_msg(){
		if(document.getElementById("oldpasswd") == "")
			alert("Please input your current password");
		else if(document.getElementById("firstpwd").value == "")
			alert("Please input your password");
		else if(document.getElementById("secondpwd").value == "")
			alert("Please input your password again");
		else if(document.getElementById('firstpwd').value != document.getElementById('secondpwd').value){
			alert("The password you second input is different with the first one");
		}
		else{
			md5encode("oldpasswd");
			md5encode("firstpwd");
			document.getElementById("editPasswdForm").submit();
		}
	}
	function return_main_page(){
		window.location.href="nice.php";
	}
</script>	
<form name="editPasswd" action="edit_passwd.php" method="post" id="editPasswdForm" > <!---onsubmit="return check_msg();"-->
<table id = "register_form">
<tr id="oldpassword">
	<td>Current password: </td> 
	<td><input type="password" name="oldpasswd" id="oldpasswd"/></td>	
</tr>
<tr id="newpassword">
	<td>Password: </td>
	<td><input id = "firstpwd" type="password" name="password" /></td>
</tr>
<tr id="newpassword2">
	<td>Password again: </td>
	<td><input id = "secondpwd" type="password" /></td>
</tr>
<tr id="button">
	<td><input type="button" name="op" value = "Submit" onclick = "check_msg()"/></td>
	<td><button type="button" onclick="return_main_page()">return</button></td>
</tr>
	
<input type="hidden" name="op" value="true"/> 
</table>
</form>