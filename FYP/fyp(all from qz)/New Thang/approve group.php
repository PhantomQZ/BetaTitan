<?php    
include("adsession.php");
include("conn.php");       
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
	#section h1{width:800px;}
	</style>
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