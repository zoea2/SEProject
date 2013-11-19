<?php
	if(isset($_POST["op"]) && $_POST["op"] == true){
		include_once("do_edit_account.inc.php");
		if(edit_info($_POST)){
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
<script type = "text/javascript" src="js/Calendar4.js" ></script>
<script type="text/javascript" src="md5.js" ></script>
<script type="text/javascript" >
	function check_email(email_adr){
		var email = email_adr;
		var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		if(pattern.test(email))
			return true;
		else
			return false;
	}
	function check_msg(){
		if(document.getElementById('emailadd').value == "")
			alert("Please input your email address");
		else if(!check_email(document.getElementById('emailadd').value))
			alert("Please input a correct email address");			
		else{
			//md5encode("firstpwd");
			document.getElementById('registerForm').submit();
		}

	}
	function return_main_page(){
		window.location.href="nice.php";
	}
</script>	
<form name="register" action="edit_account.php" method="post" id="registerForm" > <!---onsubmit="return check_msg();"-->
<table id = "register_form">
<tr id="gender">
	<td>Gender: </td>
	<td><input type="radio" name="gender" value="1" /> Male<input type="radio" name="gender" value="2" /> Female</td>
</tr>
<tr id="email">
	<td>Email: </td>
	<td><input type="text" name="email" id = "emailadd" /></td>
</tr>
<tr id="birth">
	<td>Birth: </td>
	<td id = "birthForm"  ><input type="text" name="birth" id="time1" onclick="MyCalendar.SetDate(this)" readonly></input></td>
</tr>
<tr id="signature">
	<td>Signature: </td>
	<td><textarea name="signature" rows="3" cols="30" />Please input your signature.</textarea></td>

</tr>
<tr id="button">
	<td><input type="button" name="op" value = "Submit" onclick = "check_msg()"/></td>
	<td><button type = "button" onclick="return_main_page()">return</button></td>
</tr>
<input type="hidden" name="op" value="true"/> 
</table>
</form>