<?php    
include("conn.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Developer Search</title>
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
		<li><a href="#">Games</a></li>
		<li><a href="#">Community</a></li>
		<li><a href="AboutUs.php">About</a></li>
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
				</div><!--div login-->
			</div><!--div member-->
		</div><!--div container-->
	</div><!--div content-->
	<div id="body" style="background-color:white;opacity:0.7"><!--div body-->
		<form name="searchgrp" method="post" action="">
		<br>
		<p>Search group:<input type="text" name="keyword" size="20">
		
		<p><input type="submit" name="search" value="SEARCH">
		</form>
		<table border="2">
		<tr>
			<th>Developer Group Name</th>
			<th>Total Member</th>
			<th>View Page</th>
			<th>Join Now</th>
		</tr>
		
		<?php
		$x=0;
		if(isset($_POST["search"]))//when search
		{
			$keyword = $_POST["keyword"];
			$result = mysqli_query($conn,"select * from developer_group where Dev_Group_Name like '%$keyword%' and Register_approve = '1'");
			while($row = mysqli_fetch_assoc($result))
			{
				$devid = $row["Dev_ID"];
				$devname = $row["Dev_Group_Name"];
				?>
				<tr>
					<td><?php echo $devname; ?></td>
					<?php
						$member = mysqli_query($conn,"select * from user where Dev_grouptag like '$devid'");
						$y = 0;
						while($row2 = mysqli_fetch_assoc($member))
						{
							$y++;//to count how many user
						}
					?>
					<td><?php echo $y; ?></td>
					<th><a href = "DeveloperPage.php?dev=<?php echo $devid;?>" id="button">Page</th>
					<th><?php 
						$user_check = $_SESSION['login_user'];    
						$userid = mysqli_fetch_assoc(mysqli_query($conn,"select User_ID from user where User_usrname like '$user_check'"));
						$uid = $userid['User_ID'];
						$get = "select * from developer_join_request where User_ID like '$uid' and Dev_ID like '$devid'";
						$row = mysqli_fetch_assoc(mysqli_query($conn,$get));
						$sub = $row['Request'];
						if($sub == 1)
						{echo "request submited";}
						else
						{
							?>
							<a href="join.php?did=<?php echo $devid;?>" id="button">Join</a>
							<?php
						}
						?>
						</th>
				</tr>
				<?php
				$x++;
			}
		}
		else//deafault show all list
		{
		$result2 = mysqli_query($conn,"select * from developer_group where Register_approve = '1'");
		while($rows = mysqli_fetch_assoc($result2))
			{
				$devid = $rows["Dev_ID"];
				$devname = $rows["Dev_Group_Name"];
				?>
				<tr>
					<td><?php echo $devname; ?></td>
					<?php
						$member = mysqli_query($conn,"select * from user where Dev_grouptag like '$devid'");
						$y = 0;
						while($row2 = mysqli_fetch_assoc($member))
						{
							$y++;
						}
					?>
					<td><?php echo $y; ?></td>
					<th><a href = "DeveloperPage.php?dev=<?php echo $devid;?>" id="button">Page</th>
					<th><?php 
						$user_check = $_SESSION['login_user'];    
						$userid = mysqli_fetch_assoc(mysqli_query($conn,"select User_ID from user where User_usrname like '$user_check'"));
						$uid = $userid['User_ID'];
						$get = "select * from developer_join_request where User_ID like '$uid' and Dev_ID like '$devid'";
						$row = mysqli_fetch_assoc(mysqli_query($conn,$get));
						$sub = $row['Request'];
						if($sub == 1)
						{echo "request submited";}
						else
						{
							?>
							<a href="join.php?did=<?php echo $devid;?>" id="button">Join</a>
							<?php
						}
						?>
						</th>
				</tr>
				<?php
				$x++;
			}
		}
		?>
		</table>
		<p> Number of records : <?php echo $x; ?></p><!--total number of how many record-->
		<br>
    </div><!--div body-->
</body>
</html>