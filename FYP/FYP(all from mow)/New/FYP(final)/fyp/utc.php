<?php include("conn.php"); 
session_start();
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>User Terms and Condition</TITLE>
</HEAD>
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
#MContentHeader
{
	background-color:red;
	padding-left:10px;
	font-size:20px;
}
#MContent
{
	background-color:white;
	padding:30px;
	margin-top:-25px;
}
#pagecontent
{
	width:800px;
	margin-left:150px;
}
</style>
<BODY style=background-color:#424242;>
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
</div>
</div>
<br><br>
<div id="pagecontent">
<div id="MContentHeader">
<h2 style=font-code:white;>User Terms And Condition</h2>
</div>
<div id="MContent">
Welcome to the registration to Beta Titan Game Store. You may access many areas of our website without registering your details with us but certain areas are only open to you if you register. The terms and conditions which govern material submitted by you to us and your use of our website are governed by our general "Terms and Conditions of Reading". These Terms and Conditions of Registration are in addition to the general Terms and Conditions of Reading.
<ol>
<li>Registration</li>
	<ul>
		<li>By registering here and creating your "Beta Titan Profile", you can access different services that are offered by us without having to register for each service separately. If a service you wish to subscribe to has additional terms and conditions, you will be asked to accept these separately.</li>
		<li>You agree that:</li>
			<ul>
				<li>you will keep your username and password safe, and won't share them with anyone.</li>
				<li>you will not pass yourself off as someone else or create multiple, false accounts.</li>
			</ul>
	</ul>
<li>Term</li>
	<ul>
		<li>If you breach these or any of our other terms and conditions we reserve the right to close your account, if we do so, we may close all accounts you have open in your name.</li>
		<li>To deactivate your account please contact our Admin; their details can be found under "Support" tab on most of our page.</li>
	</ul>
<li>Administration</li>
	<ul>
		<li>You can update your personal details by accessing your account at edit profile tab beside your username and making any necessary changes; this will update your details in our database.</li>
	</ul>
<li>Data</li>
	<ul>
		<li>All of your personal data will only be kept for our own website use and will not be shared without the owner concern.</li>
	</ul>
<li>General</li>
	<ul>
		<li>No waiver by us of any breach of these terms shall constitute a waiver of any other prior or subsequent breach and we shall not be affected by any delay, failure or omission to enforce or express forbearance granted in respect of any of your obligations.</li>
		<li>The rights and remedies of is under these terms are independent, cumulative and without prejudice to its rights under the law.</li>
		<li>These terms are not intended to create and shall not create any rights, entitlements, claims or benefits enforceable by any third party by virtue of the Contracts (Rights of Third Parties) Act 1999.</li>
	</ul>
</ol>
</div>
</div>
</BODY>
</HTML>
