<script type="text/javascript">
function alerts(){
alert("Your request had been submited");}
</script>
<?php
	session_start();
	include("conn.php");
	$user_check = $_SESSION['login_user'];    
	$result = mysqli_query($conn, "select * from user where User_usrname LIKE '$user_check' ");
	$row = mysqli_fetch_assoc($result);
	include ("conn.php");
	if(isset($_POST["submit"]))
	{
	$Dev_Group_Name = $_POST["GName"];
	$Privacy = $_POST["GPrivacy"];
	$Company = $_POST["CompanyAva"];
	$Com_name = $_POST["CName"];
	$Com_addr = $_POST["GCAddress"];
	$Com_state = $_POST["Com_state"];
	$Com_postcode = $_POST["Com_postcode"];
	$Com_country = $_POST["Com_country"];
	$Com_phone = $_POST["CPhone"];
	$Com_fax = $_POST["CFax"];
	$Group_email = $_POST["GEmail"];
	$Homepage = $_POST["GHomepage"];
	if(isset($_POST["article"]))
	{$Articles = "1";}
	else
	{$Articles = "0";}
	if(isset($_POST["media"]))
	{$Media = "1";}
	else
	{$Media = "0";}
	$text = $_POST["GSummary"];

	$sql = "insert into developer_group
	(Dev_Group_Name,Privacy,Company,Com_name,Com_addr,Com_state,Com_postcode,Com_country,Com_phone,Com_fax,Group_email,Homepage,Articles,Media,Summary)
	values ('$Dev_Group_Name','$Privacy','$Company','$Com_name','$Com_addr','$Com_state','$Com_postcode','$Com_country','$Com_phone','$Com_fax','$Group_email','$Homepage','$Articles','$Media','$text')";
	$test = mysqli_query($conn, $sql); 
	
	if (!$test) {
	  die('Invalid query: '.mysqli_error($conn));
	} else {
		$sql2 = "select * from developer_group where Dev_Group_Name LIKE '$Dev_Group_Name'";
		$fetch = mysqli_fetch_array(mysqli_query($conn,$sql2));
		$id = $fetch['Dev_ID'];
		$uid = $row['User_ID'];
		$sql3 = "update user set Dev_grouptag='$id',Dev_admin= 1 where User_ID = '$uid'";
		$value=mysqli_query($conn,$sql3);
		if(!$value)
		 {
		die('Invalid query: '.mysqli_error($conn));
		}
		else
		{	
			echo "Your Request had been submited";
			?><br>
			<a href="Developer.php">Return</a><?php
		}
	} 
    }
	
?>