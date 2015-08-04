<?php
include('conn.php');
session_start();
$error=";
if(isset($_POST['submit']))
{
if(empty($_POST['userid'])||empty($_POST['userpswrd']))
{$error = "Username or Password is invalid";}
}
else
{
	Susername=$_POST['userid'];
	$password=$_POST['userpswrd'];
	
	$username = stripslashes($username);
	$password = stripslahes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	$query = mysqli_query("select * from user where User_pswrd = '$password' AND User_usrname='$username'",$conn);
	$rows = mysqli_num_rows($query);
	
	if($rows == 1)
	{
	$_SESSION['login_user'] = $username;
	header("location:homepage.php");
	}
	else
	{
	$error = "Username or Password is invalid";
	}
	mysqli_close($conn);
}
?>