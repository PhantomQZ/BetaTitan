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
	
	
	$query = "select * from user where User_pswrd = '$password' AND User_usrname = '$username'";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	
	if($rows == 1)
	{
	$_SESSION['loggedin']=true;
	$_SESSION['login_user'] = $username;
	header("location:main.php");
	}
	else
	{
	$error = "Username or Password is invalid";
	}
	mysqli_close($conn);
}
}
?>