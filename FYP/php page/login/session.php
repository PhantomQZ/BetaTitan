<?php
include('conn.php');

session_start();
$user_check = $_SESSION['login_user'];

$ses_sql = mysql_query("select User_usrname from user where User_usrname='$user_check'",$conn);
$row = mysql_fetch_assoc($ses_sql);
$login_session = $row['User_usrname'];
if(!isset($login_session))
{
mysql_close($conn);
echo "<script>windows.location = 'loginpage.php';</script>";
}
?>