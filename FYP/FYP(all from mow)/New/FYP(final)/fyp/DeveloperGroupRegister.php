<?php include("conn.php"); 
session_start();
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>Group Register</TITLE>
<script type="text/javascript">
function toggle() {
var e = document.getElementById("selectList");
var strMortgageType = e.options[e.selectedIndex].value;
var divToHide = document.getElementById("hidContent");
if(strMortgageType == "No")
{
divToHide.style.display = "none";
}
else
{
divToHide.style.display = "block";
}
} 
</script>
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
<h2 style=font-code:white;>Group Register</h2>
</div>
<div id="MContent">
Before creating a new group, please ensure you read all of the rules below. Failure to adhere to any of these rules will result in your group being closed.
<ul>
<li>BRAND NEW games or JUST STORYLINES / IDEAS will not be accepted. The majority of your game must be developed and consequently
you must be able to show a significant amount of progress, e.g. screenshots of models and maps that you are working on, in-game videos MINIMUM.</li>
<li>The group is not a duplicate of another listed on the site.</li>
<li>The group must not violate the sites Terms of Service.</li>
<li>The group information provided is correct (i.e. valid company details, email, website).</li>
<li>The group information provided is free of spelling and HTML formatting errors.</li>
<li>A group must have 2 or more members and remain active at all times. 
It is recommended that you appoint another leader once you group is authorized so that they can manage the group in your absense.</li>
</ul>
<br><br><!--form start-->
<form name ="grpreg" action="insert_devgrp.php" method="post" enctype="multipart/form-data">
<!--<b>Preview Image*</b>
<br><span style="font-color:silver;font-size:12px;">2000kb max, 1024x768 size recommended<br>The preview image is shown when browsing the group listing.</span>
<br><input type="file" name="Gpreviewimage" id="Gpreviewimage" value="Choose file">
<br><br>
<b>Profile Header Image</b>
<br><span style="font-color:silver;font-size:12px;">2000kb max, 940x370 minimum<br>Please upload an in-game screenshot here with no text as that will look best.</span>
<br><input type="file" name="GPHeader" id="GPHeader" value="Choose file"> 
<br><br>-->
<b>Privacy*</b>
<br><select name="GPrivacy">
	<option value="1">Public - everyone can view the group</option>
	<option value="2">Private - only members can view the group</option>
	</select>
<br><br>
<!--choose to display or hide company-->
<b>Company*</b>
<br><select id="selectList" name="CompanyAva" onchange="toggle()">
	<option value="No">No</option>
	<option value="Yes" selected>Yes</option>
	</select>
<div id="hidContent">
<br>Company Name<br><input type="text" name="CName" size="20">
<br>Company Address<br><textarea name="GCAddress" cols="60" rows="3" maxlength="100"></textarea>
<br>State<br><input type="text" name="Com_state" size="20">
<br>Postcode<br><input type="text" name="Com_postcode" size="20">
<br>Country<br><input type="text" name="Com_country" size="20"><br>
<br><input type="text" name="CPhone" size="20">(phone)
	<input type="text" name="CFax" size="20"> (fax)
</div>
<br><br>
<b>Group Email</b>
<br><input type="text" name="GEmail" size="50">
<br><br>
<b>Homepage</b>
<br><input type="text" name="GHomepage" size="50">
<br><br>
<b>Group Name*</b>
<br><input type="text" name="GName" size="50" maxlength="50">
<br><br>
<b>Summary*</b>
<br><span style="font-color:silver;font-size:12px;">Text Only</span>
<br><textarea name="GSummary" cols="80" rows="5" maxlength="1000"></textarea>
<br><br>
<b>Allow the community to add content in these areas to your games profile::<b>
<br><input type="checkbox" name="article" value="Articles"/>Articles 
<br><input type="checkbox" name="media" value="Media"/>Media 
<br><br>
<span style="float:right;"><input type="submit" name="submit" value="SaveGroup"/><span>
</form>
</div>
</div>
</BODY>
</HTML>
