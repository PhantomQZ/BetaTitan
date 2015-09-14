<?php
session_start();
	$target_dir1 = "dev_grp_pic/preview/";
	//$target_dir2 = "dev_grp_pic/head/";
	$target_file1 = $target_dir1 . basename($_FILES["Gpreviewimage"]["name"]);
	//$target_file2 = $target_dir2 . basename($_FILES["GPHeader"]["name"]);
	$uploadOk1 = 1;
	//$uploadOk2 = 1;
	$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
	//$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	$check1 = getimagesize($_FILES["Gpreviewimage"]["tmp_name"]);
	//$check2 = getimagesize($_FILES["GPHeader"]["tmp_name"]);
	if($check1 !== false) {
		echo "File is an image - " . $check["mime"] . ".";
	$uploadOk1 = 1;
	} else {
			echo "File is not an image.";
		$uploadOk = 0;
	}
	//if($check2 !== false) {
	//	echo "File is an image - " . $check["mime"] . ".";
	//$uploadOk2 = 1;
	//} else {
	//		echo "File is not an image.";
	//	$uploadOk = 0;
	//}
	}
	// Check if file already exists
	if (file_exists($target_file1)) {
		echo "Sorry, file already exists.";
		$uploadOk1 = 0;
	}
	//if (file_exists($target_file2)) {
	//	echo "Sorry, file already exists.";
	//	$uploadOk2 = 0;
	//}
	// Check file size
	if ($_FILES["Gpreviewimage"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk1 = 0;
	}
	//if ($_FILES["GPHeader"]["size"] > 500000) {
	//	echo "Sorry, your file is too large.";
	//	$uploadOk2 = 0;
	//}
	// Allow certain file formats
	if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
	&& $imageFileType1 != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk1 = 0;
	}
	/*if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
	& $imageFileType2 != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk2 = 0;
	}*/
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk1 == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} 
	/*if ($uploadOk2 == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} */
	
else {
		include("conn.php");
		$name=$Dev_Group_Name;
		$picture1="$target_dir1/$name.jpeg";
		$picture2="$target_dir2/$name.jpeg";
		
		if (move_uploaded_file($_FILES["Gpreviewimage"]["tmp_name"], $picture1)) {
        echo "The file ". basename( $_FILES["Gpreviewimage"]["name"]). " has been uploaded.";
		mysqli_query($conn, "update developer_group set previewIMG='$picture1' where Dev_ID='1'");
?>
	<br>
	<a href="developer.php"><h5>Return</h5></a>
<?php
	
    } else {
        echo "Sorry, there was an error uploading your file.";
?>
	<br>
	<a href="DeveloperGroupRegister.php"><h5>Return</h5></a>
<?php
    }
}
?>
