<?php
	include('adlogin.php');
	
	if(isset($_SESSION['login_admin']))
	{header("location:admin.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<style type = "text/css">
	body{background:black;}
	#wrapper{background-color:#dddddd;padding:10px;border-radius:10px;width:300px;text-align:center;margin:0 auto;margin-top:220px;}
	#wrapper img{width:260px;height:100px;}
	</style>
</head>
<body>
<div id = "wrapper">
	<form method="post" name = "admlogin">
	<fieldset>
	<p><img src ="BetaTitan.png"/>
	<h1>Admin Login</h1>
	<p>Username:<br><input type ="text" name ="admname" size ="20" maxlength="15" placeholder="Admin Email"/></p>
	<p>Password:<br><input type ="password" name="admpswrd" size="20" maxlength="15" placeholder="Password"/></p>
	<p><input type="submit" name="submit" value="LOGIN"/>
	<span><?php echo $error;?></span>
	</form>
</div>
</body>
</html>