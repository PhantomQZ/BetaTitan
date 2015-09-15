<?php
include('conn.php');
include('session.php');
?>
<!doctype html>
<html>
<head>
	<title>Titan Gaming</title>
    <link rel="stylesheet" type="text/css" href="homepage.css"/>
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
	</style>
</head>
<body>
	<div id="body">
		<div id="header">
			<div class="container">
			<h1>Titan Games</h1>
			<a href="homepage.html" class="logo" title="Home"><img src="BetaTitan.png" height="140"/></a>
			<ul id="menu">
			<li><a href="homepage.html">Games</a></li>
			<li><a href="#">Community</a></li>
			<li><a href="../About Page/AboutUs.html">About Us</a></li>
			<li><a href="../contact/contact.html">Support</a></li>
            <li><a href="#">Developer</a></li>
		</ul>
			</div>
		</div>
	</div>
	<div id="content">
		<div class="container">
			<div id="member">
				<div id="login">
					<span>
						Welcome&nbsp;/&nbsp;
						<a href="../Register Page/RegisterUser.html">Register</a>
						&nbsp;/&nbsp;
						<a href="../login/login.html">Login</a>
					</span>
				</div>
			</div>
		</div>
		<div class="gamelogo">
        	<div id="background" style="background: url(final.jpg); height: 548px; position: center; margin-top: 165px; margin-left: -180px; margin-bottom: 0px; -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box;">
        </div>
		<div id="boxes">
			<div id="boxesholder" class="span-all" style="height: 500px; width: 1200px; margin-top: -128px; margin-left: 152px;">
				<div id="boxinternal">
                <div id="box-title">
				<h2 class="mostpopular_gameheading" style="color:#FFFFFF;top:10px;background-color:#4D4D4D;text-align:center">This Month Most Popular Game</h2>
                </div>
					<div id="games">
					<div id="game1">
						<a href="../battle4 iwp/iwp2.html" style="text-decoration:none; color:black"><img src="b4box.jpg" width="200px" heigh="600px"/><br></a><h3>Battlefield 4: Final Stand</h3>
					</div>
					<div id="game2">
						<a href="../sdo iwp/iwp1.html" style="text-decoration:none; color:black"><img src="sdo-xS3.png" width="300px" heigh="600px"/><br></a><h3>Super Dancer Online-X<br>Season 3</h3>
					</div>
					<div id="game3">
						<a href="../dota 2 iwp/iwp.html" style="text-decoration:none; color:black"><img src="dota2.jpg" width="400px" heigh="800px"/></a><br><h3>DOTA 2</h3>
					</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>
