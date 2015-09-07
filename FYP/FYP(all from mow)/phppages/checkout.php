<?php
require 'conn.php';
$t_price = mysqli_query($conn, 'select total_price from order');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Titan Gaming</title>
<style>
	#header{
	background: #191919 url(/borderless/images/default/bg_header.png) repeat-x center top;
	height: 140px;
	margin-top: -10px;
	margin-left: -11px;
	
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
		#menu li{display:block;float:left;height:60px;}
		#menu li a{display:block;color:#7BD2DC;float:left;font-size:19px;font-weight:bold;height:60px;line-height:60px;padding:0 8px;text-align:center;text-decoration:none}
		#menu:hover li.on a:hover,
		#menu li a:hover,
		#menu li.on a{background:url(/borderless/images/default/bg_header_menu.png) no-repeat center bottom;_background:none;color:#00FFF3}
		#menu li.platforms a:hover{background:none}
		#menu:hover li.on a{background:none}
		#menu li a.menutooltip{background:#080808;color:#fff;line-height:1;padding:6px;text-indent:0;width:auto;z-index:2}
		#login{float:right;padding-right:10px;text-align:right;width:370px;color:#FFFFFF}
		#login a{color:#FFFFFF;text-decoration:none}
	</style>
</head>
	<div id="header">
		<div class="">
		<h1>Titan Games</h1>
		<a href="main.php" class="logo" title="Home"><img src="BetaTitan.png" height="140"/></a>
		<ul id="menu">
		<li><a href="#">Games</a></li>
		<li><a href="#">Community</a></li>
		<li><a href="AboutUs.php">About Us</a></li>
		<li><a href="#">Support</a></li>
        <li><a href="developer.php">Developer</a></li>
		</ul>
		</div>
	</div>
	<div id="content">
		<div class="container">
			<div id="member">
				<div id="login">
					<span>
						Welcome&nbsp;/&nbsp;
						<a href="RegisterUser.php">Register</a>
						&nbsp;/&nbsp;
						<a href="loginpage.php">Login</a>
					</span>
				</div>
			</div>
		</div>
  </div>
  <div style="text-align:center;">
	<h2>Your Order(confirmed)</h2>
	<table cellpadding="2" cellspacing="2" border="1" align="center" method="POST">
		<tr>
			
			<th>Id</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
		</tr>
		<?php
			$result = mysqli_query($conn, 'select * from cart where Order_ID="1"');
			
		while($records = mysqli_fetch_assoc($result))
		{	
		?>
		<tr>
			<td><?php echo $records["Order_ID"]; ?></td>
			<td><?php echo $records["Game_name"]; ?></td>
			<td><?php echo $records["Game_price"]; ?></td>
			<td><?php echo $records["Quantity"]; ?></td>
		</tr>
		<?php }
		?>
	</table>
	
	

	