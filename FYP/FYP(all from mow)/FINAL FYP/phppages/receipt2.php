<?php
require 'conn.php';
include 'login2.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Titan Gaming</title>
<link rel ="stylesheet" type="text/css" href="forgot.css"/>
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
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	$orderid=$_SESSION['orders'];
?>
<fieldset style="background: rgba(255,255,255,0.60);margin-left:500px;margin-top: 45px;margin-right:500px;">
  <div style="text-align:center;">
	<h2>Upload your resit</h2>
	</div>
	<div align="center">
				
				<form action="uploadreceipt.php?orderid=<?php echo $orderid ?>" method="post" enctype="multipart/form-data">
				<h5>upload resit here: </h5>
				<input type="file" name="resit" id="resit"><br><br>
				
				<input type="submit" value="Upload" name="btnsubmit">
			</form>
		
    </div>
</fieldset>
<?php
}
else{ 
	$orderid=$_SESSION['orders'];
?>
		<fieldset style="background: rgba(255,255,255,0.60);margin-left:500px;margin-top: 45px;margin-right:500px;">
		<form action="" method="post" align="center">
					<br>
					<h2>Login</h2>
					User ID<br><input type="text" name="username" size="20" max-length="18"/>
					<p>Password<br><input type="password" name="password" size="20" max-length="18"/>
					<p><input type="submit" name="submit" value="Login"/>&nbsp; <a href="forgot_pass.php"><u>forgot password?<u></a>
					<span><?php echo $error;?></span>
				</form>
		</fieldset>
	<?php
	}

?>
	
	
	
	

	