<?php
session_start(); //start session
include("conn.php"); 

if (isset($_POST['rate']) && !empty($_POST['rate'])) {
	$gid = $_GET['gameid'];
	$usrid = $_SESSION['login_user'];
    $rate = $conn->real_escape_string($_POST['rate']);
// check if user has already rated
	$sql = "SELECT `id` FROM `tbl_rating` WHERE `user_id`='" . $usrid . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $sqltwo = "SELECT * FROM `tbl_rating` WHERE `user_id`=' = '" . $usrid . "' AND 'Game_Register_ID` = '" . $gid . "'";
    $resulttwo = $conn->query($sqltwo);
    $rowtwo = $resulttwo->fetch_assoc();
	//$userid = mysqli_fetch_assoc(mysqli_query($conn,"select * from tbl_rating where `user_id`=' = '" . $usrid . "' AND 'Game_Register_ID` = '" . $gid . "'"));
	//$uid = $userid['User_ID'];
   if ($resulttwo->num_rows > 0) {
        $sqltwo = "Update tbl_rating SET rate='" . $rate . "' where `user_id`=' = '" . $usrid . "' AND 'Game_Register_ID` = '" . $gid . "'";.
		if (mysqli_query($conn, $sql)) {
            echo "0";
        }
   } 
   else {
        $sql = "INSERT INTO `tbl_rating` ( `rate`, `user_id`, 'Game_Register_ID') VALUES ('" . $rate . "', '" . $usrid . "', '" . $gid . "'); ";
		if (mysqli_query($conn, $sql)) {
            echo "0";
        }
   }
}
$conn->close();
?>