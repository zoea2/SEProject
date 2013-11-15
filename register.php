<?php
	include("header.inc.php");
	include_once("do_register.inc.php");
	if(isset($_POST['op']) && $_POST['op'] == true){
		try{
			if(register($_POST)){
				header("Location:nice.php");
			}
		}	
		catch (Exception $e) {
			// unsuccessful login
			echo "<a>".$e->getMessage()."</a>";
			
		}	
	}
	/*
	`uid` integer unsigned not null auto_increment,
	`username` varchar(45) not null unique default '',
	`password` varchar (45)  not null default '',
	`gender` char(1) not null default '0',
	`e-mail` varchar(255) ,
	`photo_id` integer unsigned not null default 0,
	`birth` date,
	`reg_time` date,
	`auth` char(1) not null default '0',
	`signature` text,
	*/
?>
	
	

<form name="register" action="register.php" method="post">
<table>
<tr>
	<td>Username: </td> 
	<td><input type="text" name="username" /></td>
</tr>
<tr>
	<td>Password: </td>
	<td><input type="password" name="password" /></td>
</tr>
<tr>
	<td>Gender: </td>
	<td><input type="radio" name="sex" value="male" /> Male<input type="radio" name="sex" value="female" /> Female</td>
</tr>
<tr>
	<td>Email: </td>
	<td><input type="text" name="e-mail" /></td>
</tr>
<tr>
	<td>Birth: </td>
	<td>
		<script type="text/javascript">
			document.write('<select neme = "year">
			<option value = "sd">sdf</option>
			<option value="saab">Saab</option>
			</select>');
		</script>
	</td>
</tr>
<tr>
	<td>Signature: </td>
	<td><textarea rows="3" cols="30" />Please input your signature.</textarea></td>
</tr>
<tr>
	<td><input type="submit" value="Submit" /></td>
</tr>
<input type="hidden" name="op" value="true">
<br />
</table>
</form>