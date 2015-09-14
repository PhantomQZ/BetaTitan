<html>
 <title> Successfully Update Profile</title>
 <body>

 <?php
include("conn.php");
session_start();
$user_check = $_SESSION['login_user'];

		$cfname =$_POST["CusFirstName"];
		$clname =$_POST["CustLastName"];
		$cpass = $_POST["CustPass"];
		$cemail = $_POST["Custemail"];
		$ucontact = $_POST["Contact"];
		$caddress = $_POST["Address"];
		$state = $_POST["State"];
		$postcode = $_POST["Postcode"];
		$country = $_POST["Country"];
		
        mysqli_query($conn, "update user set User_pswrd='$cpass', User_Fname='$cfname', User_Lname='$clname', User_email='$cemail', User_contact='$ucontact', User_address='$caddress', User_state='$state', User_postcode='$postcode', User_country='$country' where User_usrname LIKE '$user_check' ");
		echo "<script language=\"javascript\">alert('Successfully update profile');
					window.location.href='edit_profile.php';
			 </script>";
		?>

 </body>
 </html>