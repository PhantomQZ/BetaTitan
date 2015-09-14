<?php    
include("adsession.php");
include("conn.php");       
if(!isset($_SESSION['login_admin']))
{
	header("location: main.php");
}
if(isset($_GET['approve_id']))
{
     $sql_query="Update developer_group set Register_approve = '1' where Dev_ID =".$_GET['approve_id'];
     mysqli_query($conn,$sql_query);
     header("Location: approve group.php");
}
if(isset($_GET['reject_id']))
{
     $sql_query2="Update developer_group set Register_approve = '2' where Dev_ID =".$_GET['reject_id'];
     mysqli_query($conn,$sql_query2);
     header("Location: approve group.php");
}
if(isset($_GET['delete_id']))
{
     $sql_query2="delete from developer_group where Dev_ID =".$_GET['delete_id'];
     mysqli_query($conn,$sql_query2);
     header("Location: approve group.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Approve Group</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<script type="text/javascript">
	function approve_id(id)
	{
     if(confirm('Are you sure to approve this group register?'))
     {
        window.location.href='approve group.php?approve_id='+id;
     }
	}
	function reject_id(id)
	{
     if(confirm('Are you sure to reject this group register?'))
     {
        window.location.href='approve group.php?reject_id='+id;
     }
	}
	function delete_id(id)
	{
     if(confirm('Are you sure to delete this group?'))
     {
        window.location.href='approve group.php?delete_id='+id;
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
					<li><a href="aduser.php"><b>Manage User</b></a></li>
					<li><a href="approve purchase.php"><b>Confirm Order</b></a></li>
					<li><a href="approve game.php"><b>Manage Game</b></a></li>
					<li id="selected"><a href="approve group.php"><b>Manage Developer Group</b></a></li>
					<li><a href="http://mail.google.com"><b>Official E-mail</b></a></li>
					<li><a href="adlogout.php"><b>Logout</b></a></li>
			</ul>
		</div>
		<div id = "section" style="background:white; opacity: 0.9;">
			<h1>New Developer Group Register</h1>
			<table border="2" style="width:100%">
				<tr>
					<th>Developer Group ID</th>
					<th>Group name</th>
					<th>Approval</th>
				</tr>
				<?php
					$conn = mysqli_connect("localhost","root","","game_store");
					if (mysqli_connect_errno())
					{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
						
						$query = "select * from developer_group where Register_approve = 0";
						$result = mysqli_query($conn,$query);
						
						while ($row = mysqli_fetch_array($result))
						{
							$id= $row['Dev_ID'];
							$query2 = mysqli_fetch_array(mysqli_query($conn,"select Dev_Group_Name from developer_group where Dev_ID = $id"));
							$name = $query2['Dev_Group_Name'];
							
							echo "<tr>";
							echo "<td>" . $row['Dev_ID']."</td>";
							echo "<td>" . $name."</td>";
							?>
							<?php
							if($row['Register_approve']==0)
							{
								?>
								<td><a href="javascript:approve_id(<?php echo $row[0];?>)">Approve</a>/<a href="javascript:reject_id(<?php echo $row[0];?>)">Reject</td>
								<?php 
							}
							else if($row['Register_approve']==1)
							{
								echo "<td>Approved</td>";
							}
							else if($row['Register_approve']==2)
							{
								echo "<td>Rejected</td>";
							}
							echo "</tr>";
							
						}
				?>
			</table>
			<h1>Developer Group</h1>
			<table border="2" style="width:100%">
				<tr>
					<th>Developer Group ID</th>
					<th>Group name</th>
					<th>Status</th>
					<th>Delete Group</th>
				</tr>
				<?php
					$conn = mysqli_connect("localhost","root","","game_store");
					if (mysqli_connect_errno())
					{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
						
						$query = "select * from developer_group where Register_approve != 0";
						$result = mysqli_query($conn,$query);
						
						while ($row = mysqli_fetch_array($result))
						{
							$id= $row['Dev_ID'];
							$query2 = mysqli_fetch_array(mysqli_query($conn,"select Dev_Group_Name from developer_group where Dev_ID = $id"));
							$name = $query2['Dev_Group_Name'];
							
							echo "<tr>";
							echo "<td>" . $row['Dev_ID']."</td>";
							echo "<td>" . $name."</td>";
							if($row['Register_approve']==1)
							{
								echo "<td>Approved</td>";
							}
							else if($row['Register_approve']==2)
							{
								echo "<td>Rejected</td>";
							}
							
							?>
							<td><a href="javascript:delete_id(<?php echo $row[0];?>)">Delete</a></td>
							<?php 
							echo "</tr>";
						}
				?>
			</table>
		</div>
	</div>
</body>
</html>