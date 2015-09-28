<html>
 <title> Successfully Registered</title>
 <body>
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
	$image = "default.png";
	
	$result = mysqli_query($conn, "SELECT * FROM user WHERE User_usrname='".$cuname."'");
	$result2 = mysqli_query($conn, "SELECT * FROM user WHERE User_email='".$cemail."'");
	
	if (mysqli_num_rows($result)!=0) {
		echo "<script language=\"javascript\">alert('Username already exist');
					window.location.href='RegisterUser.php';
			 </script>";
    } 
	else if (mysqli_num_rows($result2)!=0) {
		echo "<script language=\"javascript\">alert('Email Address had been used, please use another one');
					window.location.href='RegisterUser.php';
			 </script>";
    } 
	else
	{
	mysqli_query($conn,"insert into user
				(image,User_usrname,User_pswrd,User_email,User_contact,User_secQ,User_secA,User_Fname,User_Lname,User_address,User_state,User_postcode, User_country) 
				values ('$image', '$cuname', '$cpass', '$cemail', '$ucontact', '$secQ', '$secA', '$cfname', '$clname', '$caddress', '$state', '$postcode', '$country')");
				
	echo "<script language=\"javascript\">alert('Successfully Registered.');
					window.location.href='loginpage.php';
			 </script>";
	}	
?>
 </body>
 </html>