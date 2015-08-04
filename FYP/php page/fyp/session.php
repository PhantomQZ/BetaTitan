<?php
include('conn.php');

session_start();
$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query("select username from login where username='$user_check'",$connection);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
if(!isset($login_session))
{
mysqli_close($connection);
header('Location:loginpage.php')
}
?>