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
	$conn = mysql_connect("localhost","root","");
	
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$db = mysql_select_db("game_store",$conn);
	
	$query = mysql_query("select * from user where User_pswrd = '$password' AND User_usrname='$username'",$conn);
	$rows = mysql_num_rows($query);
	
	if($rows == 1)
	{
	$_SESSION['login_user'] = $username;
	header("location:profile.php");
	}
	else
	{
	$error = "Username or Password is invalid";
	}
	mysql_close($conn);
}
}
?>