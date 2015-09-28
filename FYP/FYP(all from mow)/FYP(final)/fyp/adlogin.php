<?php
session_start();
$error='';
if(isset($_POST['submit']))
{
if(empty($_POST['admname'])||empty($_POST['admpswrd'])){
$error = "Username or Password is invalid";}
else
{
	$username = $_POST['admname'];
	$password = $_POST['admpswrd'];
	$conn = mysqli_connect("localhost","root","","game_store");
	
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);
	
	
	$query = "select * from admin where Admin_pswrd = '$password' AND Admin_usrname='$username'";
	$result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
	
	if($rows == 1)
	{
	$_SESSION['login_admin'] = $username;
	header("location:admin.php");
	}
	else
	{
	$error = "Username or Password is invalid";
	}
	mysqli_close($conn);
}
}
?>