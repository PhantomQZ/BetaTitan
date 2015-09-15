<?php
session_start();
include("conn.php");
$devid = $_GET['dev'];
$target_dir = "dev_grp_pic/preview/";
$target_dir1 = "dev_grp_pic/head/";
$target_file = $target_dir . basename($_FILES["Gpreviewimage"]["name"]);
$target_file1 = $target_dir1 . basename($_FILES["GPHeader"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["Gpreviewimage"]["tmp_name"]);
	$check1 = getimagesize($_FILES["GPHeader"]["tmp_name"]);
    if($check !== false && $check1 !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if (file_exists($target_file1)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["Gpreviewimage"]["size"] > 500000 && $_FILES["GPHeader"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
&& $imageFileType1 != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
		
		//$user_check = $_SESSION['login_user'];
		$query = "select * from developer_group where Dev_ID='$devid' ";
		$result = mysqli_query($conn,$query);
		//$row = mysqli_fetch_array($result);
		while($row = mysqli_fetch_array($result))
		{
		$name=$row['Dev_Group_Name'];
		$picture="$target_dir/$name.jpeg";
		$picture1="$target_dir1/$name.jpeg";
    if (move_uploaded_file($_FILES["Gpreviewimage"]["tmp_name"], $picture)) {
        echo "The file ". basename( $_FILES["Gpreviewimage"]["name"]). " has been uploaded.";
		mysqli_query($conn, "update developer_group set previewIMG='$picture' where Dev_ID= $devid");
?>
	<br>
	<a href="edit_grprofile.php?dev=<?php echo $devid; ?>"><h5>Return</h5></a>
<?php
	
    } else {
        echo "Sorry, there was an error uploading your file.";
?>
	<br>
	<a href="edit_grprofile.php?dev=<?php echo $devid; ?>"><h5>Return</h5></a>
<?php
    }	
	if (move_uploaded_file($_FILES["GPHeader"]["tmp_name"], $picture1)) {
        echo "The file ". basename( $_FILES["GPHeader"]["name"]). " has been uploaded.";
		mysqli_query($conn, "update developer_group set headerIMG='$picture1' where Dev_ID=$devid ");
			
?>
	<br>
	<a href="edit_grprofile.php?dev=<?php echo $devid; ?>"><h5>Return</h5></a>
<?php
	
    } else {
        echo "Sorry, there was an error uploading your file.";
?>
	<br>
	<a href="edit_grprofile.php?dev=<?php echo $devid; ?>"><h5>Return</h5></a>
	<a href="edit_grprofile.php?dev=<?php echo $devid; ?>"><h5>Return</h5></a>
<?php
    }
}
}
?>
