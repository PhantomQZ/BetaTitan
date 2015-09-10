<?php
session_start(); //start session
include("conn.php"); //include config file
$result = mysqli_query($conn, "select * from game where Game_Register_ID='1'");
$row = mysqli_fetch_assoc($result);
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
$q = mysqli_query($conn, $a);
while($res=mysqli_fetch_assoc($q)){


$cname=$res['User_usrname'];
$cpwd=$res['User_pswrd'];
$uemail=$res['User_email'];
require 'PHPMailerAutoload.php';
require 'class.smtp.php';
require 'class.phpmailer.php';

$mail = new PHPMailer;
 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'titiangaming123@gmail.com';            // SMTP username
$mail->Password = 'Titiangaming.123';               		  // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 465;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('titiangaming123@gmail.com', 'Titan_Gaming');     //Set who the message is to be sent from
//$mail->addReplyTo('cdpcyb.test@gmail.com', 'Cdp Cyberjaya');  //Set an alternative reply-to address
$mail->AddAddress("$uemail");     // Add a recipient
//$mail->addAddress('mereka@example.com');              // Name is optional
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->addAttachment('c:/Attachment/head-xampp.gif');         // Add attachments
$mail->addAttachment('c:/Attachment/The PHP.docx', 'The Php'); // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Your Shopping Cart @ Titan Gaming";
$mail->AddEmbeddedImage('C:/xampp/htdocs/IT/images/BetaTitan.png', 'logoimg', 'BetaTitan.png');
$mail->Body    = "<html>
<body style=\"margin: 10px;\">
<div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 15px;\">
<div align=\"center\"><p><img src=\"cid:logoimg\" /></p></div><br>
<br>

Your Shopping Cart: <br>
Username : ' . $cname . ' <br>
Password : ' . $cpwd . ' <br><br>



<br> The game will be available / send to you after the Admin check the validity of the bank in receipt.
<br> Please bank in the receipt in the link below.
<br> www.google.com.my

<br />

</div>
</body>
</html>";
$mail->AltBody = "This is an email to help you remind your password.";
//$body             = file_get_contents('contents.html');
//$body             = preg_replace('/\\\\/','', $body);


if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message has been sent";
}
}
}
?>





