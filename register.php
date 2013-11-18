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
Username: 
<input type="text" name="username" />
<br />
Password: 
<input type="password" name="password" />
<input type="hidden" name="op" value="true">
<br />
<input type="submit" value="Submit" />
</form>