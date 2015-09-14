<?php
include('adsession.php');
if(!isset($_SESSION['login_admin']))
{
	header("location: main.php");
}
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
		<?php 
	?>
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
		<?php 
			$firstsql = "select * from user where Status = 0";
			$first = mysqli_num_rows(mysqli_query($conn,$firstsql));
			$secondsql = "select * from user where Status = 1";
			$second = mysqli_num_rows(mysqli_query($conn,$secondsql));
			$thirdsql = "select * from payment where Approve = 0";
			$third = mysqli_num_rows(mysqli_query($conn,$thirdsql));
			$foursql = "select * from game where Approve = 0";
			$four = mysqli_num_rows(mysqli_query($conn,$foursql));
			$fivesql = "select * from developer_group where Register_approve = 0";
			$five = mysqli_num_rows(mysqli_query($conn,$fivesql));
		?>
		<div id = "section">
			<h1>Admin Control Panel</h1>
			<div id = "table">
				<table border="1">
				<tr>
					<td colspan="2">User Details</td>
				</tr>
				<tr>
					<td>Active Users	:</td>
					<td><?php echo $first; ?></td>
				</tr>
				<tr>
					<td>Blocked Users	:</td>
					<td><?php echo $second; ?></td>
				</tr>
				</table>
				<table border="1">
				<tr>
					<td colspan="2">Pending request</td>
				</tr>
				<tr>
					<td>Payment request			:</td>
					<td><?php echo $third; ?></td>
				</tr>
				<tr>
					<td>Game Register request	:</td>
					<td><?php echo $four; ?></td>
				</tr>
				<tr>
					<td>Developer Group request	:</td>
					<td><?php echo $five; ?></td>
				</tr>
				</table>
			</div>
		</div>
	</div>
</body>
</html>