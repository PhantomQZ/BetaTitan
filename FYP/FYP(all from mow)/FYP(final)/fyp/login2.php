<?php
session_start();
$error='';
if(isset($_POST['submit']))
{
if(empty($_POST['username'])||empty($_POST['password'])){
$error = "Username or Password is invalid";}
else
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$conn = mysqli_connect("localhost","root","","game_store");
	
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);
	
	$torderid = $_GET['orderid']; //fetch order id according to given one by email
	$query = "select * from user where User_pswrd = '$password' AND User_usrname = '$username'"; //fetch count only from database if the login valid
	$result = mysqli_query($conn,$query); //connection
	$rows = mysqli_num_rows($result); //get the count result
	$foquery = mysqli_fetch_assoc(mysqli_query($conn,"select * from user where User_pswrd = '$password' AND User_usrname = '$username'")); //fetch real data from database if the login valid
	$checkuser = $foquery['User_ID']; //get the login result and set the User_ID he login to a variable
	$squery = "select * from payment where Order_ID = '$torderid' "; //fetch from payment database where order id is the one provided in email
	$sresult = mysqli_query($conn,$squery); //connection
	$srows = mysqli_fetch_assoc($sresult); //get the result
	$checkorder = $srows['Payment_ID'];  //get the result Payment ID then save into variable
	$tquery = "select * from payment where Payment_ID='$checkorder' AND User_ID='$checkuser' "; //find if payment got the 2 variable provided that is payment id and user id
	$tresult = mysqli_query($conn,$tquery); //connection
	$trows = mysqli_num_rows($tresult); //get the count of the result

	if($rows == 1) //if login valid move on
	{
		if($trows == 1) //if payment id and user id is the same as login one, move on
		{
			$_SESSION['loggedin']=true;
			$_SESSION['login_user'] = $username;
		}
		else // if payment id and user id is wrong
		{
			$error = "Error, the purchase is not made by you";
		}
	}
	else //if login invalid
	{
	$error = "Invalid username or password";
	}
	mysqli_close($conn);
}
}
?>