<?php
include("conn.php");
session_start();
$target_dir = "receipt/";
$target_file = $target_dir . basename($_FILES["resit"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
// Check if image file is a actual image or fake image
if(isset($_POST["btnsubmit"])) {
    $check = getimagesize($_FILES["resit"]["tmp_name"]);
	list($width, $height)=$check;
	
    if($check !== false) {
        $uploadOk = 1;
    } else {
		
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
	echo "<script language=\"javascript\">alert('Sorry, file already exists.');
			 </script>";

}
// Check file size
if ($_FILES["resit"]["size"] > 500000) {
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	echo "<script language=\"javascript\">alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
			 </script>";
   
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	$oid = $_GET['orderid'];
	$_SESSION['orders']=$oid;
	echo "<script language=\"javascript\">alert('Sorry, your file was not uploaded.');
					window.location.href='receipt2.php';
			 </script>";
// if everything is ok, try to upload file
} 
else {
		$oid = $_GET['orderid'];
		$user_check = $_SESSION['login_user'];
		$result = mysqli_query($conn, "select * from user where User_usrname='$user_check' ");
		$row = mysqli_fetch_assoc($result);
		$sresult = mysqli_query($conn, "SELECT * FROM payment where Order_ID='$oid'");
		$srow = mysqli_fetch_assoc($sresult);
		$payid= $srow["Payment_ID"];
		$name="Payment ID".$srow["Payment_ID"];
		$picture="$target_dir/$name.jpeg";
		$date = date('Y-m-d');
    if (move_uploaded_file($_FILES["resit"]["tmp_name"], $picture)) {
		mysqli_query($conn, "update payment set Receipt='$picture', Submit_Date='$date' where Payment_ID ='$payid'");	
echo "<script language=\"javascript\">alert('Receipt has been successfully uploaded. Redirecting you to main page.');
					window.location.href='main.php';
			 </script>";
	
    } else {
		unset($_SESSION["orders"]);
        echo "<script language=\"javascript\">alert('Receipt has been failed. Please upload again.');
					window.location.href='receipt2.php';
			 </script>";

    }
}
?>

