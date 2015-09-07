<?php
require 'conn.php';
?>
<html>
<head>
<meta charset="utf-8">
<link rel ="stylesheet" type="text/css" href="forgot.css"/>
<title>Forgot Password</title>
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

input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:lightblue;
  text-align:center;
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
						Welcome&nbsp;/&nbsp;
						<a href="RegisterUser.php">Register</a>
						&nbsp;/&nbsp;
						<a href="login.php">Login</a>
					</span>
				</div>
			</div>
		</div>
  </div>
<div>
<h1>Forgot Password<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td><b>User name :</b></td><td><input type='text' name='username'/></td></tr>
<tr><td><b>Email :</b></td><td><input type='email' name='mail'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>

<?php
if(isset($_POST['submit']))
{ 
$usrname=$_POST['username'];
 $mail=$_POST['mail'];
$a = "select * from user where User_email='$mail' AND User_usrname='$usrname' ";
$q = mysql_query($a);

if($q!=0){
$res=mysql_fetch_assoc($q);
$cname=$res['User_usrname'];
$cpwd=$res['User_pswrd'];
require("PHPMailer-master/PHPMailerAutoload.php"); //or select the proper destination for this file if your page is in some   //other folder
ini_set("SMTP","ssl://smtp.gmail.com"); 
ini_set("smtp_port","465"); //No further need to edit your configuration files.
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug=1;
$mail->SMTPSecure = "ssl";
$mail->Username = "titiangaming123@gmail.com"; //account with which you want to send mail. Or use this account. i dont care :-P
$mail->Password = "Titiangaming.123"; //this account's password.
$mail->Port = "465";
$mail->isSMTP();  // telling the class to use SMTP
$rec1='xiao.mow1994@gmail.com'; //receiver. email addresses to which u want to send the mail.
$mail->AddAddress($rec1);
$mail->Subject  = "Remind Password";
$mail->Body     = "Hello hi, testing";
$mail->WordWrap = 200;
if(!$mail->Send()) {
echo 'Message was not sent!.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo  //Fill in the document.location thing
'<script type="text/javascript">
                        if(confirm("Your mail has been sent"))
                        document.location = "/";
        </script>';
}
}
}
?>





