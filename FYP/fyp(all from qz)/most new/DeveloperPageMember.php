<!doctype html>
<?php 
	$conn = mysqli_connect("localhost","root","","game_store");
	$devid = $_GET["dev"];
	$b = mysqli_fetch_assoc(mysqli_query($conn,"select * from developer_group where Dev_ID = '$devid' "));
	$titlen = $b['Dev_Group_Name'];
	$locate = "$_SERVER[HTTP_REFERER]";
	session_start();
	if(isset($_GET['delete_id']))
{
     $sql_query2="update user set Dev_grouptag = '0' where User_ID = ".$_GET['delete_id'];
     mysqli_query($conn,$sql_query2);
     header("Location: $locate");
}
?>
<html>
<head>
<meta charset="utf-8">
<link href="DP.php?dev=<?php echo $devid ?>" rel="stylesheet" type="text/css"><ul></ul>
<title><?php echo $titlen; ?></title>
<script type="text/javascript">
function comments()
	{	
		<?php
			if(isset($_POST["btnsubmit"])){
			$comment = $_POST['GSummary'];
			$user = $_SESSION['login_user'];
			$gname = $b['Dev_Group_Name'];
				if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
				mysqli_query($conn,"Insert into dev_comment (Comment_text, User_usrname, Dev_Group_Name) values ('$comment', '$user', '$gname')");
				
				}
				else{
					die(mysqli_error($conn));
				header('Location: loginpage.php');
				}
			}
		?>
	}
	function delete_id(id)
	{
     if(confirm('Are you sure to remove this user from this group?'))
     {
        window.location.href='DeveloperPageMember.php?delete_id='+id;
     }
	}
</script>
	<style>
		#header{
	background: #191919 url(/borderless/images/default/bg_header.png) repeat-x center top;
	height: 140px;
	margin-top: -17px;
	margin-left:-8px;
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
							$link5 = 'edit_grprofile.php';
							$c = mysqli_fetch_assoc(mysqli_query($conn,"select * from developer_group where Dev_ID = '$devid' "));
							$icon = $c['previewIMG'];
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
							{
								$user_check = $_SESSION['login_user'];   
								$result = mysqli_query($conn, "select * from user where User_usrname LIKE '$user_check' ");
								$row = mysqli_fetch_assoc($result);
								$devid = $_GET['dev'];
								$did = $row['Dev_grouptag'];
								$adcheck = $row['Dev_admin'];
							
								echo "Welcome &nbsp;";
								echo $_SESSION['login_user'];
								echo "&nbsp;/&nbsp;";
								echo "<a href = '".$link4."'>Edit Profile</a>";
								echo "&nbsp;/&nbsp;";
								if($adcheck == '1' && $did == $devid)
								{echo "<a href = '".$link5."?dev=".$devid."'>Edit Group Profile</a>";
								 echo "&nbsp;/&nbsp;";}
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
<div id="contentlock">
	<div id="topdiv">
		<div id="topdivHeader">
        	<div id="Hicon">
			<img src="<?php echo $icon; ?>"height="58"width="64"margin-left="20px"/>
            </div>
            <div id="settitle">
			<div id="locktitle">
			<?php 
				$a = mysqli_fetch_assoc(mysqli_query($conn,"select * from developer_group where Dev_ID = '$devid' "));
				$name = $a['Dev_Group_Name'];
				$privacy = $a['Privacy'];
				$company = $a['Com_name'];
				$hpage = $a['Homepage'];
				$phone = $a['Com_phone'];
				$fax = $a['Com_fax'];
				$email = $a['Group_email'];
				$summary = $a['Summary'];
				$background1= $a["headerIMG"];
				$member = mysqli_query($conn,"select * from user where Dev_grouptag like '$devid'");
						$y = 0;
						while($row2 = mysqli_fetch_assoc($member))
						{
							$y++;
						}
				$date = $a['Date'];
			?>
			<span id="titlecss"><b><?php echo $name;?></b></span></div>
			<div id="lockpurchase"><a href="#"target="_blank"title="Purchase"><img Src="subbtn4.png"height="56"width="160"/></a>
			<a href="#"target="_blank"title="Purchase"><img Src="join.png"height="60"width="160"/></a>
			<span id="purc"><a href="#"target="_blank"title="Purchase"><b></b></a></span>
			<br><div id="gameprice"><b></b></div></div>
			</div><!--End of header title division-->
			
			<div id="titleExB">
			</div><!--Title Blue Line-->
			<div id="topDivBackg" style="background-image: url(<?php echo $background1; ?>);">
			<div id="topdivDescrip">
			<form name="GRating">
			<table width="105%" border="0" cellpadding="6">
				<tr>
					<td>Members
					<td><?php echo $y;?>
				<tr>
					<td>Established
					<td><?php echo $date;?>
				<tr>
					<td>Privacy
					<td><?php
							if($privacy == '1')
							{echo 'Public';}
							else if($privacy == '2')
							{echo 'Private';}
						?>
				<tr>
					<td>Company
					<td><?php 
							if($company == NULL)
							{echo 'Not Available';}
							else
							{echo $company;}
						?>
						</b></a>
				<tr>
					<td>Homepage
					<td><?php echo "<a href='".$hpage."'target='_blank' title='GHomePage' style='color: white'> <b>$hpage</b></a>";?>
				<tr>
					<td>Contact
					<td>
					<?php
						if($fax == NULL && $phone == NULL)
						{echo 'Not Available';}
						else 
						{
						if($phone != NULL && $fax == NULL)
						{echo 'phone: ',$phone;}
						else if($phone == NULL && $fax != NULL)
						{echo 'fax: ',$fax;}
						else
						{echo 'phone: ',$phone,'/fax: ',$fax;}
						}
					?>
				<tr>
					<td>Email
					<td>
					<?php 
						if($privacy == '1')
						{echo $email;}
						else
						{echo 'Hidden';}
					?>
				<tr>
					<td>
					<td>
				<tr>
					<td>
					<td>
				<tr>
					<td>
					<td>
				<tr>
					<td>
					<td>
				<tr>
					<td>
					<td>
				</table>
			</form>
				</div><!--Top division game description division-->
				</div><!--top division description there background-->
				<br>
				<br>
			<div id="SummaryDivision">
			<div id="SumNavBar">
			<ul class="tablist"> 
				<li><a href="DeveloperPage.php?dev=<?php echo $devid;?>">Summary</a></li> 
				<li id="current"><a href="DeveloperPageMember.php?dev=<?php echo $devid;?>">Members</a></li> 
				<li><a href="DeveloperPageGame.php?dev=<?php echo $devid;?>">Games</a></li> 	
			</ul>
			</div><!--Nav bar-->
			<div id="SummaryDescrip"><!--Member List-->
			<table border ="2">
			<?php
				$x = 0;
				$sql = "select * from user where Dev_grouptag = '$devid'";
				$fetch = mysqli_query($conn,$sql);
				if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
				{
						$user_check = $_SESSION['login_user'];   
						$result = mysqli_query($conn, "select * from user where User_usrname LIKE '$user_check' ");
						$row = mysqli_fetch_assoc($result);
						$devid = $_GET['dev'];
						$did = $row['Dev_grouptag'];
						$adcheck = $row['Dev_admin'];
					if($adcheck == '1' && $did == $devid)
					{
						?>
						<tr>
						<th>Member List</th>
						<th>Delete</th>
						</tr>
						<?php
						while($row = mysqli_fetch_assoc($fetch))
						{
						$name = $row['User_usrname'];
						$uid = $row['User_ID'];
						?>
						<tr>
							<td><?php echo $name;?></td>
							<td><a href="javascript:delete_id(<?php echo $uid;?>)">Delete</a></td>
						</tr>
						<?php $x++;
						}
					}
				}
				else
				{
					?>
					<tr>
					<th>Member List</th>
					</tr>
					<?php
					while($row = mysqli_fetch_assoc($fetch))
					{
					$name = $row['User_usrname'];?>
					<tr>
						<td><?php echo $name;?></td>
					</tr>
					<?php $x++;
					}
				}
			?>
			</table>
			<?php echo "Total Member: ",$x;?>
            <br>
			</div><!--Member List-->
			<div id="CommentSec">
			<h1>Comments</h1>
			<?php
			$cmt = mysqli_query($conn, "select * from dev_comment where Dev_Group_Name='$titlen'");
			while($getcmt = mysqli_fetch_assoc($cmt))
			{	$result2 = $getcmt['Comment_text'];
				//$name = $_SESSION['login_user'];
				if($result2!=NULL){
				?>
				<br>
				<b><u><?php echo $getcmt['User_usrname'];?></u></b>
				<br>
				<?php
				echo $getcmt['Comment_text'];
				?>
				<br>
				<?php
				}
				else{
				
				}
				
			
			}
			
			?>
			
			<div id="hidContent">
			<?php
			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			?>
			<form name="comment" method="POST">
			<br><textarea name="GSummary" cols="80" rows="5" maxlength="1000"></textarea>
			<br><br><input type="submit" name="btnsubmit" value="Comment" onclick="comments();"/>
			</form>
			<?php
			}
			else{
			?>
				<br><br>
				<b><u><a href="loginpage.php"><?php echo "You must login to comment.";?></a></u></b>
			<?php
			}
			?>
			
			</div><!--hidContent"-->
			</div><!--Comment div-->
			</div><!--Summary division-->
			</div><!--Header division-->
			</div><!--Top division-->


</div><!--Content Lock-->
</div><!--Body-->