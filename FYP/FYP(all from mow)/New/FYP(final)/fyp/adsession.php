<?php
$conn = mysqli_connect("localhost","root","","game_store");

session_start();
$admin_check = $_SESSION['login_admin'];

$ses_sql = mysqli_query($conn,"select Admin_usrname from admin where Admin_usrname LIKE '$admin_check'");
if($ses_sql === FALSE) { 
    die(mysqli_error()); 
}
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['Admin_usrname'];
if(!isset($login_session))
{
mysqli_close($conn);
echo "<script>windows.location = 'admin.php';</script>";
}
?>