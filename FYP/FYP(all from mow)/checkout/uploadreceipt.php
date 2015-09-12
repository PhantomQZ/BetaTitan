<?php
include("conn.php");
session_start();
$target_dir = "receipt/";
$target_file = $target_dir . basename($_FILES["resit"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//$maxheight = 500;
 
// Check if image file is a actual image or fake image
if(isset($_POST["btnsubmit"])) {
    $check = getimagesize($_FILES["resit"]["tmp_name"]);
	list($width, $height)=$check;
	
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["resit"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
		$user_check = $_SESSION['login_user'];
		$result = mysqli_query($conn, "select * from user where User_usrname='$user_check' ");
		$row = mysqli_fetch_assoc($result);
		$id = $row["User_ID"];
		$name=$row["User_Lname"].$row["User_Fname"];
		$picture="$target_dir/$name.jpeg";
		$date = date('Y-m-d');
    if (move_uploaded_file($_FILES["resit"]["tmp_name"], $picture)) {
        echo "The file ". basename( $_FILES["resit"]["name"]). " has been uploaded.";
		mysqli_query($conn, "update payment set  Receipt='$picture' Submit_Date='$date' where User_ID LIKE'$id' ");
?>
	<br>
	<a href="edit_profile.php"><h5>Return</h5></a>
<?php
	
    } else {
        echo "Sorry, there was an error uploading your file.";
?>
	<br>
	<a href="edit_profile.php"><h5>Return</h5></a>
<?php
    }
}
?>

