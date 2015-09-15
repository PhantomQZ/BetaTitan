<?php
$conn = mysqli_connect("localhost","root","","game_store");

session_start();
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($conn,"select * from user where User_usrname LIKE '$user_check'");


if($ses_sql === FALSE) { 
    die(mysqli_error()); 
}
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['User_usrname'];
if(!isset($login_session))
{
mysqli_close($conn);
echo "<script>windows.location = 'loginpage.php';</script>";
}
?>