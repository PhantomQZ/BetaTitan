<?php    
include("conn.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Developer Login</title>
	<link rel ="stylesheet" type="text/css" href="login2.css"/>
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
	<script type="text/javascript">
		function check()
		{
			<?php 
			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
			{
				?>
					location.href='DeveloperGroupRegister.php';
				<?php
			}
			else
			{
				?>
				alert("You have to login to register a developer group");
				<?php
			}
			?>
		}
	</script>
</head>
<body>
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
				</div><!--div login-->
			</div><!--div member-->
		</div><!--div container-->
	</div><!--div content-->
	<div id="body">
		<div id="box">
            <div id="try">
			<div id="register">
			<?php
			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
				{
					$loged=$_SESSION['userid'];
					$row=mysqli_query($conn, "select * from user where User_ID='$loged'");
					$result=mysqli_fetch_assoc($row);
					$usergrp=$result['Dev_grouptag'];
					$rowtwo=mysqli_query($conn, "select * from developer_group where Dev_ID='$usergrp'");
					$resulttwo=mysqli_fetch_assoc($rowtwo);
					$grpname=$resulttwo['Dev_Group_Name'];
					$grpid=$resulttwo['Dev_ID'];
					if($usergrp!=0)
						{
							?>
							<br>
							<br>
							<p style="font-size:15pt;">Joined Developer Group : <?php echo $grpname ?></p>
							<p>You have joined a Developer Group<br>
								Link to redirect to your Developer Homepage</p>
								<a href="DeveloperPage.php?dev=<?php echo $grpid ?>">Click Here to go Developer Page</a> 
							<?php
						}
						else
						{
							?>
				<br><h2>Join Developer</h2>
				<p>Join Developer Group</p>
				<p>Its free to create a group,You are welcome to share your game to everyone on our page<br>
				   Continue on to create developer group by<br>clicking the button below</p>
			  
			  <input type = "button" onclick="check()" value="Create">
						<?php
				}		
				}
				else
				{
							?>
				<br><h2>Join Developer</h2>
				<p>Join Developer Group</p>
				<p>Its free to create a group,You are welcome to share your game to everyone on our page<br>
				   Continue on to create developer group by<br>clicking the button below</p>
			  
			  <input type = "button" onclick="check()" value="Create">
						<?php
				}				
			?>
			</div>
		<div id="search">
				<br><h2>Search Developer</h2>
				<p>Search for existing Developer Group</p>
				<p>Search for Group that had been create by other user<br>
				   Continue on to search developer group <br>clicking the button below</p>
			  <a href="searchgrp.php"><button>Search</button></a>
			</div>
    </div>
    </div>
	</div>
</body>
</html>