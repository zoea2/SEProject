<?php
	include("header.inc.php");
	include("function.inc.php");
	include_once("do_register.inc.php");
	if(isset($_POST['op']) && $_POST['op'] == true){
		try{
			if(register($_POST)){
				header("Location:nice.php");
			}
		}	
		catch (Exception $e) {
			// unsuccessful login
			$msg = $e->getMessage();
			if($msg == "exist username"){
				?>
					<script type="text/javascript">//show_msg()</script>
				<?php
			}
		}	
	}
?>

<script type="text/javascript">
	function show_msg(){
		document.getElementById("username_error").style.visibility="visible";
	}

</script>
<script type = "text/javascript" src="js/Calendar4.js" ></script>


<script type="text/javascript">
	function check_msg(){
		
		/*if(document.getElementById('firstpwd').value != document.getElementById('secondpwd').value){
			var msg = document.createElement("td");
			var text = document.createTextNode("two password doesn't match");
			msg.appendChild(text);
			document.getElementById("password2").appendChild(msg);
			return 
		}	*/	
		
		document.getElementById('registerForm').submit();
	}
	function createBirthForm(){
		var birthForm = '<select name="cars"><option value="volvo">Volvo</option><option value="saab">Saab</option><option value="fiat">Fiat</option><option value="audi">Audi</option></select>';
		document.getElementById("birthForm").innerHTML = birthForm;
	}
</script>	
<form name="register" action="register.php" method="post" id="registerForm" > <!---onsubmit="return check_msg();"-->
<table id = "register_form">
<tr id="username">
	<td>Username: </td> 
	<td><input type="text" name="username" /></td>
	
</tr>
<tr id="password">
	<td>Password: </td>
	<td><input id = "firstpwd" type="password" name="password" /></td>
</tr>
<tr id="password2">
	<td>Password again: </td>
	<td><input id = "secondpwd" type="password" /></td>
</tr>
<tr id="gender">
	<td>Gender: </td>
	<td><input type="radio" name="gender" value="1" /> Male<input type="radio" name="gender" value="2" /> Female</td>
</tr>
<tr id="email">
	<td>Email: </td>
	<td><input type="text" name="email" /></td>
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
	<td><input type="button" name="op" value = "true" onclick = "check_msg()"/></td>
</tr>
<input type="hidden" name="op" value="true"/> 
</table>
</form>