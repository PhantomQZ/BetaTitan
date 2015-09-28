<?php
require 'conn.php';
session_start();
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
	margin-left:-11px;
	width:1368px;
	color: #f35626;
    -webkit-animation: hue 30s infinite linear;
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
		#login{float:right;padding-right:10px;text-align:right;width:370px;color:#FFFFFF;margin-top:-20px;}
		#login a{color:#FFFFFF;text-decoration:none}
#body{
	display: block;
}
body{	background-image:url(background.jpg);}
#About{
	text-align: center;
	background-image:url(background03.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	color: white;
}
#About a{color:green;
text-decoration:none;}
#About a:visited{color:white;}
#About a:hover{font-size:18px;color:red;}
#Point1{
	width: 500px;
	float: left;
	background-image: url(asd.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	color: white;
	padding-top: 15px;
	padding-right: 15px;
	padding-bottom: 15px;
	padding-left: 15px;
}
#Point2{
	width: 500px;
	float: right;
	background-image: url(asd.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	color: white;
	padding-right: 15px;
	padding-left: 15px;
	padding-top: 15px;
	padding-bottom: 15px;
}
#Point3{
	width: 500px;
	float: left;
	background-image: url(asd.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	color: white;
	padding-top: 15px;
	padding-left: 15px;
	padding-bottom: 15px;
	padding-right: 15px;
}
#Headerp{
	background-color: rgba(55,55,55,1.06);
	margin-top: -20px;
}
#ContectLock{
	height: 491px;
	width: 1000px;
	margin-left: 147px;
	background-image: url(background02.jpg);
	background-repeat: no-repeat;
	background-size:cover;
}
@-webkit-keyframes hue {
    from {
      -webkit-filter: hue-rotate(0deg);
    }

    to {
      -webkit-filter: hue-rotate(360deg);
    }
}
    </style>
</head>

<body>
<div id="body">
		<div id="header">
			<div class="container">
			<h1>Titan Games</h1>
			<a href="main.php" class="logo" title="Home"><img src="BetaTitan.png" height="140"/></a>
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
<h1 align="center">&nbsp;</h1>
</div>
<div id="About">
<h1>WELCOME TO TITAN GAMING</h1>
<h3>A website that you could find games you like to play, and stay connect with your friends.
	<br>One could also join or create a community team to create new mods or game together.
	<br><br>Join Titan Gaming today and Start to feel the different.
</h3>
<a href="loginpage.php"><h1>Join Now!</h1>
<p>&nbsp;</p>
</a></div>
<div id="ContectLock">
<div id="Point1">
<div id="Headerp">
<h2>Instant Access to Games Copy</h2>
</div>
You could gain access to all the games we have easily by registering and buying them to gain access or 
a copy of original games disc.
</div><br><br>
<div id="Point2">
<div id="Headerp">
<h2>Join Community or Groups</h2>
</div>
Join game groups, development groups, form clans, chat or meet new people that may be friends or rival.
</div><br><br>
<div id="Point3">
<div id="Headerp">
<h2>Create or buys Mods as items</h2>
</div>
Gift, trade, or create new mods for games in community or groups that could be share or sell later,
make your games more interesting.
</div>
</div>
</div>
</body>
</html>
