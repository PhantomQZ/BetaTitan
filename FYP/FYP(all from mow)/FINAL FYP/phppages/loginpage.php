<?php
include('login.php');

if(isset($_SESSION['login_user']))
{header("location:main.php");}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel ="stylesheet" type="text/css" href="login.css"/>
	<style>
	#header{
	background: #191919 url(/borderless/images/default/bg_header.png) repeat-x center top;
	height: 140px;
	margin-top: -10px;
	margin-left: -11px;
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
		#login{float:right;padding-right:10px;text-align:right;width:370px;color:#FFFFFF}
		#login a{color:#FFFFFF;text-decoration:none}
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
	<div id="header">
		<div class="container">
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
	<div id="body">
		<div id="box">
			<div id="sign">
				<form action="" method="post">
					<br>
					<h2>Login</h2>
					User ID<br><input type="text" name="username" size="20" max-length="18"/>
					<p>Password<br><input type="password" name="password" size="20" max-length="18"/>
					<p><input type="submit" name="submit" value="Login"/>&nbsp; <a href="forgot_pass.php"><u>forgot password?<u></a>
					<span><?php echo $error;?></span>
				</form>
			</div>
            <div id="try" style="margin-top:-195px; width:700px;">
			<div id="register" style="margin-top:-36px;">
				<br><h2>Create</h2>
				<p>Create a new free account</p>
				<p>Its free to join and easy to use. <br>Continue on to create your account by <br>clicking the button below</p>
			  <a href="RegisterUser.php"><button>Register</button></a>
			</div>
		<div id="description">
			<h2>WHY YOU SHOULD JOIN US</h2>
			<ul id="id">
				<li>Buy and download full retail game</li>
				<li>Join our community</li>
				<li>Chat with your friend while playing</li>
				<li>Play your game at any supported platforms</li>
				<li>Schedule a game,tournament,or a lan party</li>
				<li>Receive automatic game updates, and more benefit!</li>
			</ul>
		</div>
    </div>
    </div>
</body>
</html>