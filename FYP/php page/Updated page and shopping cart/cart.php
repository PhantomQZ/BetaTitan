<?php
require 'conn.php';
require 'item.php';

if(isset($_GET['Game_Register_ID'])){
	$result = mysqli_query($conn, 'select * from game where Game_Register_ID='.$_GET['Game_Register_ID']);
	$game = mysqli_fetch_object($result);
	$item = new Item();
	$item->id = $game->Game_Register_ID;
	$item->name = $game->Game_name;
	$item->price = $game->Game_price;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart']));
	for($i=0; $i<count($cart); $i++)
			if($cart[$i]->id==$_GET['Game_Register_ID'])
			{
				$index = $i;
				break;
			}
	
	if($index==-1)
		$_SESSION['cart'][] = $item;
	else{
		$cart[$index]->quantity++;
		$_SESSION['cart'] = $cart;
		}

}

// Delete product in cart
if(isset($_GET['index'])){
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}

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
						<a href="login.php">Login</a>
					</span>
				</div>
			</div>
		</div>
  </div>
	<table cellpadding="2" cellspacing="2" border="1">
		<tr>
			
			<th>Id</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Sub Total</th>
			<th>Option</th>
		</tr>
		<?php
			$cart = unserialize(serialize($_SESSION['cart']));
			$s = 0;
			$index = 0;
			for($i=0; $i<count($cart); $i++){
				$s += $cart[$i]->price * $cart[$i]->quantity;
				?>
			<tr>
				
				<td><?php echo $cart[$i]->id;?></td>
				<td><?php echo $cart[$i]->name;?></td>
				<td><?php echo $cart[$i]->price;?></td>
				<td><?php echo $cart[$i]->quantity;?></td>
				<td><?php echo $cart[$i]->price * $cart[$i]->quantity;?></td>
				<td><a href="cart.php?index=<?php echo $index ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
			</tr>
			<?php 
					$index++;
				} 
			?>
			<tr>
				<td colspan="4" align="right">Sum</td>
				<td align="left"><?php echo $s ?></td>
			</tr>
	</table>
	
	<br>
	<a href="main.php">Continue Shopping</a>