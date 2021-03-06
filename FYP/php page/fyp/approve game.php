<?php    include("connection.php");    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Approve Game</title>
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
	body{background:#fbffd9;}
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
	table,th,tr{border-collapse:collapse;}
	th,td{padding:5px;}
	#table h1{width:600px;}
	</style>
</head>
<body>
	<div id = "main">
		<div id = "header">
			<p id="welcome"><h1 style="black; font-size:40px;"> Admin Page </h1><br>Welcome Admin</p>
		</div>
		<div id = "nav">
			<ul id = "list">
				<li><a href="../admin.php">Home</a></li>
				<li><a href="../homepage.php">View Site</a></li>
				<li><a href="../approve purchase.php">Confirm Order</a></li>
				<li><a href="../approve game.php">Confirm Game Register</a></li>
				<li><a href="../approve group.php">Confirm Developer Group Register</a></li>
				<li><a href="http://mail.google.com">Official E-mail</a></li>
				<li><a href="../admin login.php">Logout</a></li>
			</ul>
		</div>
		<div id = "section">
			<div id = "table">
			<h1>Admin Approve Game Register</h1>
			<table border="2" style="width:100%">
				<tr>
					<th>Username</th>
					<th>Game Name</th>
					<th>Form Link</th>
					<th>Approval</th>
				</tr>
				<tr>
					<td>Sample 1</td>
					<td>Unturned</td>
					<td><a href="#">link</a></td>
					<td><a href="#">approve</a>/<a href="#">reject</a></td>
				</tr>
				<tr>
					<td>Sample 2</td>
					<td>Dota2</td>
					<td><a href="#">link</a></td>
					<td><a href="#">approve</a>/<a href="#">reject</a></td>
				</tr>
				<tr>
					<td>Sample 3</td>
					<td>Blockade 3D</td>
					<td><a href="#">link</a></td>
					<td><a href="#">approve</a>/<a href="#">reject</a></td>
				</tr>
				<tr>
					<td>Sample 4</td>
					<td>Transformer</td>
					<td><a href="#">link</a></td>
					<td><a href="#">approve</a>/<a href="#">reject</a></td>
				</tr>
			</table>
			</div>
		</div>
	</div>
</body>
</html>