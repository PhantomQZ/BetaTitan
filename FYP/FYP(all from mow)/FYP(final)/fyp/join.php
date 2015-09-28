<?php
include("conn.php");
session_start();

$user_check = $_SESSION['login_user'];    
$userid = mysqli_fetch_assoc(mysqli_query($conn,"select User_ID from user where User_usrname like '$user_check'"));
$uid = $userid['User_ID'];

$devid = $_GET['did'];
$sql = "insert into developer_join_request (User_ID,Dev_ID,Request)values ('$uid','$devid','1')";
$insert =  mysqli_query($conn,$sql);
if(!$insert)
{
	die('Invalid query: '.mysqli_error($conn));
}
else
{
	echo "table is updated";
	header("location: searchgrp.php");
}

?>