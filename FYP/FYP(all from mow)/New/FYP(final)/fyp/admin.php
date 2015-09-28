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
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<div id = "main">
		<div id = "header">
			<a href="admin.php" class="logo" title="Home"><img src="BetaTitan.png" height="140"/></a>
		</div><!--div header-->
			<div id = "nav">
				<ul id = "list">
					<li id="selected"><a href="admin.php"><b>Home</b></a></li>
					<li><a href="main.php"><b>View Site</b></a></li>
					<li><a href="aduser.php"><b>Manage User</b></a></li>
					<li><a href="approve purchase.php"><b>Confirm Order</b></a></li>
					<li><a href="approve game.php"><b>Manage Game</b></a></li>
					<li><a href="approve group.php"><b>Manage Developer Group</b></a></li>
					<li><a href="http://mail.google.com"><b>Official E-mail</b></a></li>
					<li><a href="adlogout.php"><b>Logout</b></a></li>
				</ul>
			</div><!--div nav-->
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
			<div id = "section" style="background:white; opacity: 0.9;">
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
				</div><!--div table-->
			</div><!--div section-->
		</div><!--div body-->
</body>
</html>