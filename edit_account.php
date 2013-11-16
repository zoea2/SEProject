<?php
	include_once();
?>
<script type="text/javascript">
	function check_email(email_adr){
		var email = email_adr;
		var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		if(pattern.test(email))
			return true;
		else
			return false;
	}
	function check_msg(){
		/*if(document.getElementById('firstpwd').value != document.getElementById('secondpwd').value){
			alert("The password you second input is different with the first one");
		}
		else*/
		if(document.getElementById('email').value == "")
			alert("Please input your email address");
		else if(!check_email(document.getElementById('email').value))
			alert("Please input correct email address");		
		else 
			document.getElementById('registerForm').submit();
	}
	function createBirthForm(){
		var birthForm = '<select name="cars"><option value="volvo">Volvo</option><option value="saab">Saab</option><option value="fiat">Fiat</option><option value="audi">Audi</option></select>';
		document.getElementById("birthForm").innerHTML = birthForm;
	}
</script>	
<form name="register" action="edit_account.php" method="post" id="registerForm" > <!---onsubmit="return check_msg();"-->
<table>
<tr>
	<td>Gender: </td>
	<td><input type="radio" name="sex" value="1" /> Male<input type="radio" name="sex" value="2" /> Female</td>
</tr>
<tr>
	<td>Email: </td>
	<td><input type="text" name="email" id="email"/></td>
</tr>
<tr>
	<td>Birth: </td>
	<td id = "birthForm" >dsfsd</td>
</tr>
<tr>
	<td>Signature: </td>
	<td><textarea rows="3" cols="30" id = "signature_area"/>Please input your signature.</textarea></td>
</tr>
<tr>
	<td><input type="button" value = "Submit" onclick = "check_msg()"/></td>
</tr>
<input type="hidden" name="op" value="true">
<br />
</table>
</form>