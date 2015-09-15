<?php 
include("conn.php");
?>
<!DOCTYPE html>
<html>
<style>
#header{
	background: #191919 url(/borderless/images/default/bg_header.png) repeat-x center top;
	height: 140px;
	margin-top: -10px;
	margin-left:-11px;
	width:1368px;
}
		#header a.logo{no-repeat 5px top;
	display: block;
	float: left;
	height: 137px;
	width: 80px
}
		#header h1{display:none}
		#menu{
	float: left;
	list-style: none;
	margin-top: 48px;
	margin-right: 0;
	margin-left: 358px;
	margin-bottom: 0;
	margin-left: 317px
}
		#menu li{display:block;float:left;height:60px}
		#menu li a{display:block;color:#7BD2DC;float:left;font-size:19px;font-weight:bold;height:60px;line-height:60px;padding:0 8px;text-align:center;text-decoration:none}
		#menu:hover li.on a:hover,
		#menu li a:hover,
		#menu li.on a{background:url(/borderless/images/default/bg_header_menu.png) no-repeat center bottom;_background:none;color:#00FFF3}
		#menu li.platforms a:hover{background:none}
		#menu:hover li.on a{background:none}
		#menu li a.menutooltip{background:#080808;color:#fff;line-height:1;padding:6px;text-indent:0;width:auto;z-index:2}
		#login{float:right;padding-right:10px;text-align:right;width:370px;color:#FFFFFF}
		#login a{color:#FFFFFF;text-decoration:none}
#body{
	display: block;
}
body{	background-image:url(background.jpg);}
#tables
{
	 background-color:rgba(255,255,255,0.3);
	 margin: 80px auto; 
	 
}
</style>
<link rel="stylesheet" type="text/css" href="PurchaseC.css">
<body>
<div id="body">
  <div id="header">
			<div class="container">
			<h1>Titan Games</h1>
			<a href="../homepage/homepage.html" class="logo" title="Home"><img src="BetaTitan.png" height="140"/></a>
			<ul id="menu">
			<li><a href="game.php">Games</a></li>
			<li><a href="AboutUs.php">About Us</a></li>
			<li><a href="support.php">Support</a></li>
			<li><a href="developer.php">Developer</a></li>
		</ul>
			</div>
  </div>
  <div id="content">
	<div class="container">
			<div id="member">
				<div id="login">
					<span>
						<?php
							
							$link1 = 'RegisterUser.php';
							$link2 = 'loginpage.php';
							$link3 = 'logout.php';
							$link4 = 'edit_profile.php';
							$link5 = 'list_pm.php';
							$link6 = 'user_profile.php';
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
							{
							//We count the number of new messages the user has
							$nb_new_pm = mysqli_fetch_array(mysqli_query($conn,'select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
							//The number of new messages is in the variable $nb_new_pm
							$nb_new_pm = $nb_new_pm['nb_new_pm'];
							//We display the links
								echo "Welcome &nbsp;";
								echo "<a href= '".$link6."'>".$_SESSION['login_user']."</a>";
								echo "&nbsp;/&nbsp;";
								echo "<a href = '".$link5."'>inbox ".$nb_new_pm."</a>";
								echo "&nbsp;/&nbsp;";
								echo "<a href = '".$link4."'>Edit Profile</a>";
								echo "&nbsp;/&nbsp;";
								echo "<a href = '".$link3."'>Log Out</a>";
							}
							else
								{
								echo "Welcome &nbsp;/&nbsp; </i>";
								echo "<a href='".$link1."'>Register</a>&nbsp;/&nbsp;";
								echo "<a href='".$link2."'>Login</a>";
								}
							?>
					</span>
				</div>
			</div>
	</div>
</div>
<head>
<title>Order</title>
</head>
<body>
<div>
<h1 align="center"><u>Your Order</u></h1>
<div id="tables" style="width:400px;">
<table border="1" width="100%">
<tr>
	<th>Game</th>
	<th>Quatity</th>
	<th>Price</th>
</tr>
<?php

	$sql = "select * from orders";
	$result = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_assoc($result))
	{	
?>
<tr>
		<td><?php echo $row["Game_name"]; ?></td>
		<td><?php echo $row["Quantity"]; ?></td>
		<td><?php echo $row["Game_price"]; ?></td>
</tr>
<?php
	}
	
?>
</table>

<div id="user-details">
	<h2 align="center">Your Data</h2>
		<div id="user-details-content"></div>
</div>
<div style="text-align:center;">
<input type="submit" name="payment"  class="btn" value="Pay" />
</div>
</div>
</body>
</html>