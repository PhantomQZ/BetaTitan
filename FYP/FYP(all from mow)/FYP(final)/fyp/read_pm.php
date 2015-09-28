<?php
session_start();
include('conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="default/style.css" rel="stylesheet" title="Style" />
        <title>Read a PM</title>
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
  <br>
<body>
<?php
//We check if the user is logged
if(isset($_SESSION['username']))
{
//We check if the ID of the discussion is defined
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
//We get the title and the narators of the discussion
$req1 = mysqli_query($conn, "select title, user1, user2 from pm where id='$id' and id2='1'");
$dn1 = mysqli_fetch_assoc($req1);
//We check if the discussion exists
if(mysqli_num_rows($req1)==1)
{
//We check if the user have the right to read this discussion
if($dn1['user1']==$_SESSION['userid'] or $dn1['user2']==$_SESSION['userid'])
{
//The discussion will be placed in read messages
if($dn1['user1']==$_SESSION['userid'])
{
	mysqli_query($conn, "update pm set user1read='yes' where id='$id' and id2='1'");
	$user_partic = '2';
}
else
{
	mysqli_query($conn, "update pm set user2read='yes' where id='$id' and id2='1'");
	$user_partic = '1';
}
$req2 = mysqli_query($conn, 'select pm.timestamp, pm.message, user.User_ID as userid, user.User_usrname as username, user.image from pm, user where pm.id="'.$id.'" and user.User_ID=pm.user1 order by pm.id2');
//We check if the form has been sent
if(isset($_POST['message']) and $_POST['message']!='')
{
	$message = $_POST['message'];
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$message = stripslashes($message);
	}
	//We protect the variables
	$message = mysqli_real_escape_string($conn, nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
	//We send the message and we change the status of the discussion to unread for the recipient
	//if(mysqli_query($conn, "insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values('$id', ' . (intval(mysqli_num_rows($req2))+1) . ', '', '$_SESSION['userid']', '', '$message', 'time()', '', '')") and mysqli_query("update pm set user'$user_partic'read='yes' where id='$id' and id2='1'"))
	if(mysqli_query($conn, 'insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval(mysqli_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "")') and mysqli_query($conn, 'update pm set user'.$user_partic.'read="no" where id="'.$id.'" and id2="1"'))
	{
?>
<div class="message">Your message has successfully been sent.<br />
<a href="read_pm.php?id=<?php echo $id; ?>">Go to the discussion</a></div>
<?php
	}
	else
	{
?>
<div class="message">An error occurred while sending the message.<br />
<a href="read_pm.php?id=<?php echo $id; ?>">Go to the discussion</a></div>
<?php
	}
}
else
{
//We display the messages
?>
<div class="content">
<h1><?php echo $dn1['title']; ?></h1>
<table class="messages_table">
	<tr>
    	<th class="author">User</th>
        <th>Message</th>
    </tr>
<?php
//We get the list of the messages
while($dn2=(mysqli_fetch_array($req2)))
{
?>
	<tr>
    	<td class="author center"><?php
if($dn2['username']!='')
{
	//echo '<img src="'$dn2['username'])'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
	echo '<img src="'.htmlentities($dn2['image']).'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
}
?><br /><a href="profile.php?id=<?php echo $dn2['userid'] ?>"><?php echo $dn2['username'] ?></a></td>
    	<td class="left"><div class="date">Sent: <?php echo date('m/d/Y H:i:s' ,$dn2['timestamp']); ?></div>
    	<?php echo $dn2['message'] ?></td>
    </tr>
<?php
}
//We display the reply form
?>
</table><br />
<h2>Reply</h2>
<div class="center">
    <form action="read_pm.php?id=<?php echo $id; ?>" method="post">
    	<label for="message" class="center">Message</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
</div>
<?php
}
}
else
{
	echo '<div class="message">You dont have the rights to access this page.</div>';
}
}
else
{
	echo '<div class="message">This discussion does not exists.</div>';
}
}
else
{
	echo '<div class="message">The discussion ID is not defined.</div>';
}
}
else
{
	echo '<div class="message">You must be logged to access this page.</div>';
}
?>
		<div class="foot"><a href="list_pm.php">Go to my personnal messages</a> </div>
	</body>
</html>