<?php
		include ("conn.php");
		session_start();
		$uid = $_SESSION['uid'];
		$sqlr = "update user set Dev_grouptag = '' where User_ID = '$uid'";
		
		$why = mysqli_query($conn, $sqlr);
		if(!$why)
		{die(mysqli_error($conn));}
		header("location: main.php")
?>