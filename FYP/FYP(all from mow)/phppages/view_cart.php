<?php    

require 'cart.php';
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
	// slight update to account for browsers not supporting e.which
	function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
	// To disable f5
		/* jQuery < 1.7 */
	$(document).bind("keydown", disableF5);
	/* OR jQuery >= 1.7 */
	$(document).on("keydown", disableF5);

	// To re-enable f5
		/* jQuery < 1.7 */
	$(document).unbind("keydown", disableF5);
	/* OR jQuery >= 1.7 */
	$(document).off("keydown", disableF5);
	$(document).ready(function(){    //Starting DOM
                                                document.onkeydown=function(e) {   //F5 Key code
                                                var event = window.event || e;
                                                if (event.keyCode == 116) {
                                                            event.keyCode = 0;
                                                            return false;
                                                }
                                    }                     
                                    $(document).bind('keypress keydown keyup', function(e) {
                                        if(e.which === 82 && e.ctrlKey) {    // Ctrl +R key code
                                           console.log('blocked');
                                           return false;
                                        }
                                    });                   
            });
            </script>

	</script>
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
  <div style="text-align:center;">
	<h2>Your Order</h2>
	<table cellpadding="2" cellspacing="2" border="1" align="center" method="POST">
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
			$index = 0;
			$s=0;
			for($i=0; $i<count($cart); $i++){
				$s += $cart[$i]->price * $cart[$i]->quantity;
				?>
			<tr>
				<td><?php echo $cart[$i]->no;?></td>
				<td><?php echo $cart[$i]->name;?></td>
				<td><?php echo $cart[$i]->price;?></td>
				<td><?php echo $cart[$i]->quantity;?></td>
				<td><?php echo $cart[$i]->price * $cart[$i]->quantity;?></td>
				<td><a href="view_cart.php?index=<?php echo $index ?>&no=<?php echo $cart[$i]->no ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
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
	<br>
	<a href="checkout.php" onclick="checkout();">Checkout</a>
	
	<script type="text/javascript">
	function checkout()
	{
		var c=confirm("Are you confirm your order?");
		
		if(c==true)
		{
			<?php
				//$connect = mysqli_connect("localhost", "root", "", "game_store");
				$date = date('Y-m-d H:i:s');
				$query ="Insert into order (Order_ID, Order_data, total_price) values ('1', '123', '300')";
				mysqli_query($conn, $query);
				
				
			?>
		}
		else 
		{
			alert('it didnt work');
		}
	}
	</script>
	</html>