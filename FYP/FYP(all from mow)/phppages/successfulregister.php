<html>
 <title> Successfully Registered</title>
 <body>
 <fieldset>
<?php
include("conn.php");

	$cfname = $_POST["CusFirstName"];
	$clname = $_POST["CustLastName"];
	$cuname = $_POST["CustUsername"];
	$cpass = $_POST["CustPass"];
	$cemail = $_POST["Custemail"];
	$ucontact = $_POST["phone"];
	$caddress = $_POST["address"];
	$state = $_POST["state"];
	$postcode = $_POST["zip"];
	$country = $_POST["country"];
	$secQ = $_POST["SQuestion"];
	$secA = $_POST["SecretAns"];
	
	
	mysqli_query($conn,"insert into user
				(User_usrname,User_pswrd,User_email,User_contact,User_secQ,User_secA,User_Fname,User_Lname,User_address,User_state,User_postcode, User_country) 
				values ('$cuname', '$cpass', '$cemail', '$ucontact', '$secQ', '$secA', '$cfname', '$clname', '$caddress', '$state', '$postcode', '$country')");
				


?>
 
 <p>Register successful...</p><a href="login.php"> Login </a>
 </fieldset>
 </body>
 </html>