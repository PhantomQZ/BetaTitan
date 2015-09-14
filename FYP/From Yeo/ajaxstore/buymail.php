<?php
session_start(); //start session
include("conn.php"); //include config file
$orders = $_SESSION["order"];
//$result = mysqli_query($conn, "select * from order where Order_ID=orders");
//$row = mysqli_fetch_assoc($result);
?>
<?php
$user_check = $_SESSION['login_user'];    
$userid = mysqli_fetch_assoc(mysqli_query($conn,"select User_ID from user where User_usrname like '$user_check'"));
$uid = $userid['User_ID'];
$a = "select * from user where User_ID ='$uid'";
//$a = "select * from user where User_email='$mail' AND User_usrname='$usrname' ";
$q = mysqli_query($conn, $a);
while($res=mysqli_fetch_assoc($q)){

$cname=$res['User_usrname'];
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
<br>

<br> The game will be send to you after the Admin check the validity of the bank in receipt.
<br> If the payment have no been made for three days, the order will automatically be reject.
<br> Please bank in the receipt in the link below.
<a href='http://localhost/ajaxstore/d2.php' style='font-size=15pt;'>Make Your Payment Here</a>
<br/>

</div>
</body>
</html>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
$mail->AltBody = "This is an email to help you remind your password.";
//$body             = file_get_contents('contents.html');
//$body             = preg_replace('/\\\\/','', $body);


if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message has been sent";
}
}
?>