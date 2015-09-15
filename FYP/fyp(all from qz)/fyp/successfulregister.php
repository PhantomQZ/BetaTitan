<html>
 <title> Successfully Registered</title>
 <body>
<?php
	function test($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
include("conn.php");
	$cfname = $test($_POST["CusFirstName"]);
	$clname = $test($_POST["CustLastName"]);
	$cuname = $test($_POST["CustUsername"]);
	$cpass = $test($_POST["CustPass"]);
	$cemail = $test($_POST["Custemail"]);
	$ucontact = $test($_POST["phone"]);
	$caddress = $test($_POST["address"]);
	$state = $test($_POST["state"]);
	$postcode = $test($_POST["zip"]);
	$country = $test($_POST["country"]);
	$secQ = $test($_POST["SQuestion"]);
	$secA = $test($_POST["SecretAns"]);
	$image = "default.png";
	
	
	mysqli_query($conn,"insert into user
				(image,User_usrname,User_pswrd,User_email,User_contact,User_secQ,User_secA,User_Fname,User_Lname,User_address,User_state,User_postcode, User_country) 
				values ('$image', '$cuname', '$cpass', '$cemail', '$ucontact', '$secQ', '$secA', '$cfname', '$clname', '$caddress', '$state', '$postcode', '$country')");
				
	echo "<script language=\"javascript\">alert('Successfully Registered.');
					window.location.href='loginpage.php';
			 </script>";


?>
 </body>
 </html>