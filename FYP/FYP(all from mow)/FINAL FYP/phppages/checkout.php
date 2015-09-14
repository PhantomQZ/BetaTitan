<?php
session_start(); //start session
include("conn.php"); //include config file
$lastno = mysqli_query($conn, "SELECT * FROM cart ORDER BY Order_ID DESC LIMIT 1");
$rows = mysqli_fetch_assoc($lastno);
?>
<?php
	if (isset($_GET['process'])){
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<ul class="view-cart">';
	$lastnum=0;
	
	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_name = $product["Game_name"];
		$product_price = $product["Game_price"];
		$product_code = $product["Game_Register_ID"];
		
		$item_price 	= sprintf("%01.2f",($product_price));  // price x qty = total item price
		
		$cart_box 		.=  "<li> $product_code &ndash;  $product_name <span> $currency. $item_price </span></li>";
		
		$subtotal 		= ($product_price ); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
		if ($rows['Order_ID']!=NULL)
		{
		$lastnum=$rows['Order_ID']+1;
		$query ="Insert into cart(Order_ID, Game_name, Game_price) values ('$lastnum', '$product_name', '$product_price') ";
		mysqli_query($conn,$query);
		}
		else
		{
		$lastnum=1;
		$query ="Insert into cart(Order_ID, Game_name, Game_price) values ('$lastnum', '$product_name', '$product_price') ";
		mysqli_query($conn,$query);	
		}
	}
		$grand_total = $total + $shipping_cost; //grand total
		$user_check = $_SESSION['login_user'];    
		$userid = mysqli_fetch_assoc(mysqli_query($conn,"select User_ID from user where User_usrname like '$user_check'"));
		$uid = $userid['User_ID'];
		$date = date('Y-m-d');
		$query ="Insert into payment(Order_ID, User_ID, Price, Payment_date) values ('$lastnum', '$uid', '$grand_total', '$date') ";
		mysqli_query($conn,$query);	
			unset($_SESSION["products"]);		 
	}
?>
<?php
$user_check = $_SESSION['login_user'];    
$userid = mysqli_fetch_assoc(mysqli_query($conn,"select * from user where User_usrname like '$user_check'"));
$uid = $userid['User_ID'];
$ufname= $userid['User_Fname'];
$ulname= $userid['User_Lname'];
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

Hello, $ulname $ufname <br><br>

<br> The game will be send to you after the Admin check the validity of the bank in receipt.
<br> If the payment have no been made for three days, the order will automatically be reject.
<br> Please bank in the receipt in the link below.
<a href='http://localhost/phppages/receipt.php?orderid=$lastnum' style='font-size=15pt;'>Make Your Payment Here</a>
<br/>

</div>
</body>
</html>";
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message has been sent";
}
}
echo "<script language=\"javascript\">alert('An email has been sent to your inbox for payment. Redirecting you to main page.');
					window.location.href='d2.php';
			 </script>";		
?>