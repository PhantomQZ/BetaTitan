<?php    
include("adsession.php");
include("conn.php");   
if(!isset($_SESSION['login_admin']))
{
	header("location: main.php");
} 
if(isset($_GET['approve_id']))
{
     $sql_query="Update game set Approve = '1' where Game_Register_ID =".$_GET['approve_id'];
     mysqli_query($conn,$sql_query);
     header("Location: approve game.php");
}
if(isset($_GET['reject_id']))
{
     $sql_query2="Update game set Approve = '2' where Game_Register_ID =".$_GET['reject_id'];
     mysqli_query($conn,$sql_query2);
     header("Location: approve game.php");
}
if(isset($_GET['block_id']))
{
     $sql_query3="Update game set Approve = '3' where Game_Register_ID =".$_GET['block_id'];
     mysqli_query($conn,$sql_query3);
     header("Location: approve game.php");
}
if(isset($_GET['unblock_id']))
{
     $sql_query4="Update game set Approve = '1' where Game_Register_ID =".$_GET['unblock_id'];
     mysqli_query($conn,$sql_query4);
     header("Location: approve game.php");
}
if(isset($_GET['delete_id']))
{
     $sql_query5="delete from game where Game_Register_ID =".$_GET['delete_id'];
     mysqli_query($conn,$sql_query5);
     header("Location: approve game.php");
}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Approve Game</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<script type="text/javascript">
	function approve_id(id)
	{
     if(confirm('Are you sure to approve this game?'))
     {
        window.location.href='approve game.php?approve_id='+id;
     }
	}
	function reject_id(id)
	{
     if(confirm('Are you sure to reject this game?'))
     {
        window.location.href='approve game.php?reject_id='+id;
     }
	}
	function block_id(id)
	{
     if(confirm('Are you sure to block this game?'))
     {
        window.location.href='approve game.php?block_id='+id;
     }
	}
	function unblock_id(id)
	{
     if(confirm('Are you sure to unblock this game?'))
     {
        window.location.href='approve game.php?unblock_id='+id;
     }
	}
	function delete_id(id)
	{
     if(confirm('Are you sure to delete this game?'))
     {
        window.location.href='approve game.php?delete_id='+id;
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
					<li id="selected"><a href="approve game.php"><b>Manage Game</b></a></li>
					<li><a href="approve group.php"><b>Manage Developer Group</b></a></li>
					<li><a href="http://mail.google.com"><b>Official E-mail</b></a></li>
					<li><a href="adlogout.php"><b>Logout</b></a></li>
			</ul>
		</div>
		<div id = "section" style="background:white; opacity: 0.9;">
			<div id = "table">
			<h1>New Game Register</h1>
			<table border="2" style="width:100%">
				<tr>
					<th>ID</th>
					<th>Game Name</th>
					<th>Developer Name</th>
					<th>Approval</th>
				</tr>
				<?php
					$conn = mysqli_connect("localhost","root","","game_store");
					if (mysqli_connect_errno())
					{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$query = "select * from game where Approve = 0";
					$result = mysqli_query($conn,$query);
					while($row=mysqli_fetch_array($result))
					{
						$id = $row['Game_Register_ID'];
						$name = $row['Game_name'];
						$dev = $row['Dev_Group_Name'];
						?>
						<tr>
							<td><?php echo $id; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $dev; ?></td>
							<?php 
								if($row['Approve']==0)
								{
									?>
									<td><a href="javascript:approve_id(<?php echo $row[0];?>)">Approve</a>/<a href="javascript:reject_id(<?php echo $row[0];?>)">Reject</td>
									<?php
								}
								echo "</tr>";
					}
				?>
			</table>
			<h1>All Game</h1>
			<table border = "2" style="width:100%">
				<tr>
					<th>ID</th>
					<th>Game Name</th>
					<th>Developer Name</th>
					<th>Status</th>
					<th>Block Game</th>
					<th>Delete Game</th>
				</tr>
				<?php
					if(mysqli_connect_errno())
					{echo "Failed to connect to MySQL: ".mysqli_connect_error();}
					$query2="select * from game where Approve != 0";
					$result2 = mysqli_query($conn,$query2);
					while($rows = mysqli_fetch_array($result2))
					{
						$ids = $rows['Game_Register_ID'];
						$names = $rows['Game_name'];
						$devn = $rows['Dev_Group_Name'];
						
						echo "<tr>";
						echo "<td>".$ids."</td>";
						echo "<td>".$names."</td>";
						echo "<td>".$devn."</td>";
						?><td><?php
						if($rows['Approve']!=0)
						{
							if($rows['Approve']==1)
							{
								echo "Approved";
							}
							else if($rows['Approve']==2)
							{
								echo "Rejected";
							}
							else if($rows['Approve']==3)
							{
								echo "Blocked";
							}
						}
						?></td><?php
						if($rows['Approve']<3)
						{
							?>
								<td><a href="javascript:block_id(<?php echo $rows[0];?>)">Block</a></td>
							<?php
						}
						else if($rows['Approve']>=3)
						{
							?>
								<td><a href="javascript:unblock_id(<?php echo $rows[0];?>)">Unblock</a></td>
							<?php
						}
						?>
						<td><a href="javascript:delete_id(<?php echo $row[0];?>)">Delete</a></td>
						<?php
						echo "</tr>";
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>