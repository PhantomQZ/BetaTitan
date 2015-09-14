<?php    
include("adsession.php");
include("conn.php");    
if(!isset($_SESSION['login_admin']))
{
	header("location: main.php");
}
if(isset($_GET['approve_id']))
{
     $sql_query="Update payment set Approve = '1' where Payment_ID =".$_GET['approve_id'];
     $can = mysqli_query($conn,$sql_query);
	 if(!$can)
	 {die(mysqli_error($conn));}
     header("Location: approve purchase.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Approve Purchase</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
	<script type="text/javascript">
function approve_id(id)
{
     if(confirm('Are you sure to approve this user purchase?'))
     {
        window.location.href='approve purchase.php?approve_id='+id;
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
					<li id="selected"><a href="approve purchase.php"><b>Confirm Order</b></a></li>
					<li><a href="approve game.php"><b>Manage Game</b></a></li>
					<li><a href="approve group.php"><b>Manage Developer Group</b></a></li>
					<li><a href="http://mail.google.com"><b>Official E-mail</b></a></li>
					<li><a href="adlogout.php"><b>Logout</b></a></li>
			</ul>
		</div>
		<div id = "section" style="background:white; opacity: 0.9;">
			<h1>Approve Purchase</h1>
			<table border="2" style="width:100%">
				<tr>
					<th>Payment ID</th>
					<th>Order ID</th>
					<th>User Name</th>
					<th>Payment Date</th>
					<th>Total Paid</th>
					<th>Receipt</th>
					<th>Approve Payment</th>
				</tr>
				<?php
					$conn = mysqli_connect("localhost","root","","game_store");
					if (mysqli_connect_errno())
					{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
						$x=0;
						$query = "select * from payment";
						$result = mysqli_query($conn,$query);
						while ($row = mysqli_fetch_array($result))
						{
							$uid = $row['User_ID'];
							$pay = $row['Payment_ID'];
							$query2 = mysqli_query($conn,"select * from user where User_ID = $uid");
							$run = mysqli_fetch_array($query2);
							$name = $run['User_usrname'];
							echo "<tr>";
							echo "<td>" . $pay."</td>";
							echo "<td>" . $row['Order_ID']."</td>";
							echo "<td>" . $name."</td>";
							echo "<td>" . $row['Payment_date']."</td>";
							echo "<td>" . $row['Price']."</td>";
							?>
							<td><a href="<?php echo $row['Receipt']?>" target="_blank">Link</a></td>
							<?php
							if($row['Approve']==0)
							{
								?>
								<td><a href="javascript:approve_id(<?php echo $pay;?>)">Approve</a></td>
								<?php 
							}
							else
							{
								echo "<td>Approved</td>";
							}
							echo "</tr>";
							$x++;
						}
				?>
			</table>
		</div>
	</div>
</body>
</html>