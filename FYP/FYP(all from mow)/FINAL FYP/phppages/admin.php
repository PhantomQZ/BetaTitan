<?php
include('adsession.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<style type = "text/css">
	#header
	{
		color:white;
		background:black;
		height:150px;
		width: 4000px;
		position: fixed;
		top:-10px;
	}
	#welcome
	{font-weight:bold;}
	body{background-image:url("123.jpg");}
	#list
	{
		list-style-type: none;
		padding:0;
		margin-top:150px;
	}
	#nav li{margin: 0 0 .2em 0;}
	#list a
	{
		display: block;
		width: 180px;
		height:40px;
		background:gray;
		color: white;
		text-decoration:none;
		margin bottom: 10px;
		padding: .2em .8em;
	}
	#nav
	{
		float:left;
		padding:5px;
	}
	#section
	{
		width:350px;
		float:left;
		padding:10px;
		margin-top:150px;
		font-size:20px;
	}
	table,th,tr{border:1px solid black;border-collapse:collapse;width:400px;}
	th,td{padding:5px;}
	table{margin-bottom:10px;}
	</style>
</head>
<body>
	<div id = "main">
		<div id = "header">
			<p id="welcome"><h1 style="black; font-size:40px;"> Admin Page </h1><br>Welcome <?php echo $login_session;?></p>
		</div>
		<div id = "nav">
			<ul id = "list">
				<li><a href="admin.php">Home</a></li>
				<li><a href="main.php">View Site</a></li>
				<li><a href="aduser.php">Manage User</a></li>
				<li><a href="approve purchase.php">Confirm Order</a></li>
				<li><a href="approve game.php">Manage Game</a></li>
				<li><a href="approve group.php">Manage Developer Group</a></li>
				<li><a href="http://mail.google.com">Official E-mail</a></li>
				<li><a href="adlogout.php">Logout</a></li>
			</ul>
		</div>
		<div id = "section">
			<h1>Admin Control Panel</h1>
			<div id = "table">
				<table border="1">
				<tr>
					<td colspan="2">User Details</td>
				</tr>
				<tr>
					<td>Active Users	:</td>
					<td>20</td>
				</tr>
				<tr>
					<td>Blocked Users	:</td>
					<td>3</td>
				</tr>
				</table>
				<table border="1">
				<tr>
					<td colspan="2">Today's request</td>
				</tr>
				<tr>
					<td>Payment request			:</td>
					<td>4</td>
				</tr>
				<tr>
					<td>Game Register request	:</td>
					<td>10</td>
				</tr>
				<tr>
					<td>Developer Group request	:</td>
					<td>2</td>
				</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>