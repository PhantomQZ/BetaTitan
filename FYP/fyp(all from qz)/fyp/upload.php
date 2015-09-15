<?php
session_start();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$maxheight = 500;
 
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	list($width, $height)=$check;
	
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
       
        $uploadOk = 0;
    }
}
if($height>$maxheight)
	{
		$uploadOk = 0;
	}
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "<script language=\"javascript\">alert('Sorry, your file was not uploaded.');
					window.location.href='edit_profile.php';
			 </script>";
// if everything is ok, try to upload file
} 
else {
		include("conn.php");
		$user_check = $_SESSION['login_user'];
		$result = mysqli_query($conn, "select * from user where User_usrname LIKE '$user_check' ");
		$row = mysqli_fetch_assoc($result);
		$name=$row["User_Lname"].$row["User_Fname"];
		
		$picture="$target_dir/$name.jpeg";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $picture)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		mysqli_query($conn, "update user set image='$picture' where User_usrname LIKE '$user_check' ");
		echo "<script language=\"javascript\">alert('Successful upload profile image.');
					window.location.href='edit_profile.php';
			 </script>";


	
    } else {
		echo "<script language=\"javascript\">alert('Sorry, there was an error uploading your file.');
					window.location.href='edit_profile.php';
			 </script>";

    }
}
?>
