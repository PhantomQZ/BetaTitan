<?php
session_start();
include('conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="default/style.css" rel="stylesheet" title="Style" />
        <title>Personnal Messages</title>
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
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
							{
								
								echo "Welcome &nbsp;";
								echo $_SESSION['login_user'];
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
<body>    	
<div class="content">
<?php
//We check if the user is logged
if(isset($_SESSION['username']))
{
//We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
$uid = $_SESSION['userid'];
$req1 = mysqli_query($conn, 'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, user.User_ID as userid, user.User_usrname from pm as m1, pm as m2,user where ((m1.user1="'.$uid.'" and m1.user1read="no" and user.User_ID=m1.user2) or (m1.user2="'.$uid.'" and m1.user2read="no" and user.User_ID=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$req2 = mysqli_query($conn, 'select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, user.User_ID as userid, user.User_usrname from pm as m1, pm as m2,user where ((m1.user1="'.$uid.'" and m1.user1read="yes" and user.User_ID=m1.user2) or (m1.user2="'.$uid.'" and m1.user2read="yes" and user.User_ID=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$row1 = mysqli_num_rows($req1);
$row2 = mysqli_num_rows($req2);

?>
This is the list of your messages:<br />
<a href="new_pm.php" class="link_new_pm">New PM</a><br />
<h3>Unread Messages(<?php echo $row1 ?>):</h3>
<table>
	<tr>
    	<th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date of creation</th>
    </tr>
<?php
//We display the list of unread messages
while($dn1=(mysqli_fetch_array($req1)))
{
$mid = $dn1['id'];
$mti = $dn1['title'];
$mreps = $dn1['reps']-1;
$muid = $dn1['userid'];
$muname = $dn1['User_usrname'];
$mtime = $dn1['timestamp'];
?>
	<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $mid ?>"><?php echo htmlentities($mti, ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $mreps ?></td>
    	<td><a href="profile.php?id=<?php echo $muid ?>"><?php echo htmlentities($muname, ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo date("Y/m/d H:i:s", $mtime )?></td>
    </tr>
<?php
}
//If there is no unread message we notice it
if($row1==0)
{
?>
	<tr>
    	<td colspan="4" class="center">You have no unread message.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h3>Read Messages(<?php echo $row2 ?>):</h3>
<table>
	<tr>
    	<th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date or creation</th>
    </tr>
<?php
//We display the list of read messages
while($dn2 = mysqli_fetch_array($req2))
{
$mid2 = $dn2['id'];
$mti2 = $dn2['title'];
$mreps2 = $dn2['reps']-1;
$muid2 = $dn2['userid'];
$muname2 = $dn2['User_usrname'];
$mtime2 = $dn2['timestamp'];
?>
	<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $mid2 ?>"><?php echo htmlentities($mti2, ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $mreps2 ?></td>
    	<td><a href="profile.php?id=<?php echo $muid2 ?>"><?php echo htmlentities($muname2, ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo date("Y/m/d H:i:s", $mtime2 )?></td>
    </tr>
<?php
}
//If there is no read message we notice it
if($row2==0)
{
?>
	<tr>
    	<td colspan="4" class="center">You have no read message.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
	echo 'You must be logged to access this page.';
}
?>
		</div>
		<div class="foot"><a href="main.php">Go Home</a></div>
	</body>
</html>