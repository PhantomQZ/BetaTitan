<?php 
require 'conn.php';
session_start();
$uname=$_SESSION['login_user'];
function test($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
if(isset($_POST['btnsubmit'])){
	$sequel = test($_POST["SequalName"]);
	$epack = test($_POST["ExpansionPack"]);
	if(isset($_POST["developer"])){
		$devname=$_POST["developer"];
		$dev=mysqli_query($conn, "select Dev_ID from developer_group where Dev_Group_Name LIKE '$devname'");
		$user=mysqli_query($conn, "select * from user where User_usrname = '$uname'");
		$row=mysqli_fetch_assoc($dev);
		$bow=mysqli_fetch_assoc($user);
		$id=$row['Dev_ID'];
		$dev_tag=$bow['Dev_grouptag'];
		
		if($id!=$dev_tag){
			echo "<script language=\"javascript\">alert('An email has been sent to your inbox for payment. Redirecting you to main page.');
					window.location.href='RegisterGame.php';
			 </script>";
				
		}
		else{
			
			$gstyle = test($_POST["GStyle"]);
			$gtheme = test($_POST["GTheme"]);
			$gtype = test($_POST["GType"]);
			$date = test($_POST["REDate"]);
			$homepage = test($_POST["Homepage"]);
			$gname = test($_POST["GName"]);
			$gprice = test($_POST["Gprice"]);
			$summ = test($_POST["GSummary"]);
			if(isset($_POST["Articles"])){
				$art='1';
			}
			else{
				$art='0';
			}
			if(isset($_POST["Media"])){
				$media='1';
			}
			else{
				$media='0';
			}
			if(isset($_POST["Mods"])){
				$mods='1';
			}
			else{
				$mods='0';
			}

			
			mysqli_query($conn,"insert into game
						(Dev_Group_Name,Game_name,Game_prequel,Expansion,Game_style,Game_theme,Game_type,Release_date,Game_homepage,summary, Articles,Media, Mods, Game_price) 
						values ('$devname', '$gname', '$sequel', '$epack', '$gstyle', '$gtheme', '$gtype', '$date', '$homepage', '$summ', '$art', '$media', '$mods', '$gprice')");
			echo "<script language=\"javascript\">alert('Please wait for admin approve. Thank you.');
					window.location.href='main.php';
			 </script>";
			
		}		
			
			
			
			
}
				

	
	
}
?>