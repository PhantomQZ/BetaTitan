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
	<link rel="stylesheet" type="text/css" href="admin.css">
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
			<a href="admin.php" class="logo" title="Home"><img src="BetaTitan.png" height="140"/></a>
		</div>
		<div id = "nav">
			<ul id = "list">
				    <li><a href="admin.php"><b>Home</b></a></li>
					<li><a href="main.php"><b>View Site</b></a></li>
					<li id="selected"><a href="aduser.php"><b>Manage User</b></a></li>
					<li><a href="approve purchase.php"><b>Confirm Order</b></a></li>
					<li><a href="approve game.php"><b>Manage Game</b></a></li>
					<li><a href="approve group.php"><b>Manage Developer Group</b></a></li>
					<li><a href="http://mail.google.com"><b>Official E-mail</b></a></li>
					<li><a href="adlogout.php"><b>Logout</b></a></li>
			</ul>
		</div>
		<div id = "section" style="background:white; opacity: 0.9;">
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