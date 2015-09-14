<?php    
include("adsession.php");
include("conn.php");    
if(isset($_GET['approve_id']))
{
     $sql_query="Update payment set Status = '1' where Payment_ID =".$_GET['approve_id'];
     mysqli_query($conn,$sql_query);
     header("Location: approve purchase.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Approve Purchase</title>
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
	#section h1{width:600px;}
	</style>
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
			<h1>Approve Purchase</h1>
			<table border="2" style="width:100%">
				<tr>
					<th>Payment ID</th>
					<th>Order ID</th>
					<th>User Name</th>
					<th>Payment Date</th>
					<th>Total Paid</th>
					<th>Method of Payment</th>
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
							$query2 = mysqli_fetch_array(mysqli_query($conn,"select user.User_usrname, user.User_ID, payment.User_ID from user,payment where user.User_ID = payment.User_ID"));
							$name = $query2['User_usrname'];
							echo "<tr>";
							echo "<td>" . $row['Payment_ID']."</td>";
							echo "<td>" . $row['Order_ID']."</td>";
							echo "<td>" . $name."</td>";
							echo "<td>" . $row['Payment_date']."</td>";
							echo "<td>" . $row['Price']."</td>";
							echo "<td>" . $row['Method_of_payment']."</td>";
							?>
							<td><a href="<?php echo $row['Receipt']?>"</a>Link</td>
							<?php
							if($row['Status']==0)
							{
								?>
								<td><a href="javascript:approve_id(<?php echo $row[0];?>)">Approve</a></td>
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