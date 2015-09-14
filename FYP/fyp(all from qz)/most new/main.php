<?php 
require 'conn.php';
session_start();
?>
<html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<head> 
	<title>Titian Online Game Store</title>
	<link rel ="stylesheet" type="text/css" href="main.css"/>
	<link href="style/style.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery.cycle.all.min.js"></script>
	<script type="text/javascript" src="scripts.js"></script>
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
		<li><a href="game.php">Games</a></li>
		<li><a href="#">Community</a></li>
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
							$link6 = 'user_profile.php';
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
							{
								
								echo "Welcome &nbsp;";
								echo "<a href= '".$link6."'>".$_SESSION['login_user']."</a>";
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
		<br>
<div id="container">
  <div id="slideshow" style="overflow-x: hidden; overflow-y: hidden; ">
  <ul id="nav" style="display: none; ">
			<li id="prev"><a href="http://line25.com/wp-content/uploads/2010/slideshow/demo/demo.html#">Previous</a></li>
			<li id="next"><a href="http://line25.com/wp-content/uploads/2010/slideshow/demo/demo.html#">Next</a></li>
		</ul>
	
		<ul id="slides" style="position: relative; ">
			<li style="position: absolute; top: 0px; left: 0px; width: 1280px 1px; height: 50px; z-index: 5; opacity: 0; display: none; "><img src="assassincreed.jpg" alt="Harley Davidson Sportster"></li>
			<li style="top: 0px; left: 0px; height: 20px; position: absolute; display: block; z-index: 5; opacity: 0.587512; "><a href="gamepage.php?gameid=1"><img src="dota2.jpg" alt="Harley Davidson Sportster"></a>"</li>
			<li style="position: absolute; z-index: 6; top: 0px; left: 0px; display: block; height: 20px; opacity: 0.412488; "><a href="gamepage.php?gameid=2"><img src="battlefield.jpg" alt="Harley Davidson Sportster"></a></li>
			<li style="position: absolute; top: 0px; left: 0px; width: 1071px; height: 20px; z-index: 5; opacity: 0; display: none; "><img src="lol.jpg" alt="Harley Davidson Sportster"></li>
			<li style="position: absolute; top: 0px; left: 0px; width: 1071px; height: 20px; z-index: 5; opacity: 0; display: none; "><img src="call.jpg" alt="Harley Davidson Sportster"></li>
			<li style="top: 0px; left: 0px; height: 20px; position: absolute; z-index: 5; opacity: 0; display: none; "><img src="csgo.jpg" alt="Harley Davidson Sportster"></li>
		</ul>
	</div>
</div>
<div id="all_size">
<div id="size">
	<fieldset style="border:none;background-color:rgba(255,255,255,0.2);">
		<fieldset style="width:340px; height:50px;background-color:#B20000; padding-bottom:10px;border-color:#B20000;">
		<h2 style="color:white;">Game Review</h2>
		</fieldset>
	<img src="Assassin's_Creed_III.jpg" style="float:left; width:140px; height:190px; padding-top:10px;" />
	<p style="float:right;width:220px;height:168px;text-align:justify;">Assassin's Creed is an action-adventure video game in which the player primarily 
	assumes the role of Altair, as experienced by protagonist Desmond Miles. 
	The primary goal of the game is to carry out a series of assassinations ordered by Al Mualim, 
	the leader of the Assassins. To achieve this goal,the player must travel from
	</p> 
	<p style="margin-top:20px;text-align:justify;"><br>the Brotherhood's headquarters in Masyaf, 
	across the terrain of the Holy Land known as the Kingdom to one of three cities Jerusalem, Acre, or Damascus to find the Brotherhood agent in that city. 
	There, the agent, in addition to providing a safe house, gives the player minimal knowledge about the target, and requires them to perform additional "recon" missions before attempting the assassination. 
	These missions include: eavesdropping, interrogation, pickpocketing and completing tasks for informers and fellow assassins.
	</p>
	</fieldset>
</div>
<div id="size2">
	<fieldset style="height:465px; margin-bottom:40px;border:none;background-color:rgba(255,255,255,0.2);">
		<fieldset style="height:50px;background-color:#B20000; padding-bottom:10px; border-color:#B20000;">
		<h2 style="color:white;">Most Popular Games</h2>
		</fieldset>
	<div id="game1">
	<h3 style="margin-left:20px;text-decoration: underline;">BATTLEFIELD 4 </h3><br><a href="gamepage.php?gameid=2"><img src="b4box.jpg"style="margin-top:0px;margin-left:5px; height:250px;float:left;"/></a>
	<div id="game2">
	  <h3 style="margin-left:25px;margin-top:22px;text-decoration: underline;">SDO SEASON 3 </h3><br><a href="gamepage.php?gameid=3"><img src="sdo-xS3.png" style="height:250px; width:300px; float:center; margin-left:-65px; margin-top:20px;" /></a>
	  <br>
	  </div>
	</div>
	<div id="game3">
	  <h3 style="margin-left:320px;margin-top:-22px;text-decoration: underline;">DOTA 2 </h3><br><a href="gamepage.php?gameid=1"><img src="dota.jpg" style="width:310px; height:210px; float:right;margin-top:33px;"/></a>
	</div>
	
	
	
</fieldset>
</div>
</div>
<br>
<script>

</script>
</body>
</html>

