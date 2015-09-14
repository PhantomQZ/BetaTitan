<?php
include('adsession.php');
include('conn.php');
if(!isset($_SESSION['login_admin']))
{
	header("location: main.php");
}
if(isset($_GET['delete_id']))
{
     $sql_query="DELETE FROM user WHERE User_ID=".$_GET['delete_id'];
     mysqli_query($conn,$sql_query);
     header("Location: aduser.php");
}
if(isset($_GET['block_id']))
{
     $sql_query3="Update user set Status = '1' where User_ID=".$_GET['block_id'];
     mysqli_query($conn,$sql_query3);
     header("Location: aduser.php");
}
if(isset($_GET['unblock_id']))
{
     $sql_query4="Update user set Status = '0' where User_ID =".$_GET['unblock_id'];
     mysqli_query($conn,$sql_query4);
     header("Location: aduser.php");
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
	<script type="text/javascript">
	function block_id(id)
	{
     if(confirm('Are you sure to block this user?'))
     {
        window.location.href='aduser.php?block_id='+id;
     }
	}
	function unblock_id(id)
	{
     if(confirm('Are you sure to unblock this user?'))
     {
        window.location.href='aduser.php?unblock_id='+id;
     }
	}
	function delete_id(id)
	{
		 if(confirm('Are you sure to delete this user ?'))
		 {
			window.location.href='aduser.php?delete_id='+id;
		 }
	}
</script>
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
			<h1>Manage User</h1>
			<div id = "table">
				<?php
				$conn = mysqli_connect("localhost","root","","game_store");
				if (mysqli_connect_errno())
				{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
					$x=0;
					$query = "select * from user";
					$result = mysqli_query($conn,$query);
					
					echo "<table border='2'>
					<tr>
					<th>User ID</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Security Question</th>
					<th>Security Answer</th>
					<th>Developer Group tag</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Address</th>
					<th>State</th>
					<th>Postcode</th>
					<th>Country</th>
					<th>Status</th>
					<th>Delete User</th>";
					while($row = mysqli_fetch_array($result))
					{
						$uid = $row['User_ID'];
						echo "<tr>";
						echo "<td>" . $row['User_ID']."</td>";
						echo "<td>" . $row['User_usrname']."</td>";
						echo "<td>" . $row['User_pswrd']."</td>";
						echo "<td>" . $row['User_email']."</td>";
						echo "<td>" . $row['User_contact']."</td>";
						echo "<td>" . $row['User_secQ']."</td>";
						echo "<td>" . $row['User_secA']."</td>";
						echo "<td>" . $row['Dev_grouptag']."</td>";
						echo "<td>" . $row['User_Fname']."</td>";
						echo "<td>" . $row['User_Lname']."</td>";
						echo "<td>" . $row['User_address']."</td>";
						echo "<td>" . $row['User_state']."</td>";
						echo "<td>" . $row['User_postcode']."</td>";
						echo "<td>" . $row['User_country']."</td>";
						if($row['Status']==0)
						{
							?>
								
								<td>Normal<br><a href="javascript:block_id(<?php echo $uid;?>)">Block</a></td>
							<?php
						}
						else if($row['Status']>=1)
						{
							?>
								<td>Blocked<br><a href="javascript:unblock_id(<?php echo $uid;?>)">Unblock</a></td>
							<?php
						}
						?>
						<td><a href="javascript:delete_id(<?php echo $row[0]; ?>)">Delete</a></td>
						<?php
						echo "</tr>";
						$x++;
					}
					echo "</table>";
					mysqli_close($conn);
				?>
				<p> Number of User : <?php echo $x; ?></p>
			</div>
		</div>
	</div>
</body>
</html>