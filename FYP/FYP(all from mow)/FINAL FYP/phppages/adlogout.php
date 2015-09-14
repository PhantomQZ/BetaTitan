<?php
session_start();
unset($_SESSION['login_admin']);
session_destroy();

header("Location: admin login.php"); 
exit;

?>