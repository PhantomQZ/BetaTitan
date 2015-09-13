<?php    
include("conn.php");
session_start();
?>
<html>

<head>
      <title>Edit Group Profile</title>
<link href="iwp.css" rel="stylesheet" type="text/css"><ul></ul>
<script type ="text/javascript">
function toggle() {
var e = document.getElementById("selectList");
var strMortgageType = e.options[e.selectedIndex].value;
var divToHide = document.getElementById("hidContent");
if(strMortgageType == "No")
{
divToHide.style.display = "none";
}
else
{
divToHide.style.display = "block";
}
} 
</script>
</head>
<style>
	#header{
	background: #191919 url(/borderless/images/default/bg_header.png) repeat-x center top;
	height: 140px;
	margin-top: -20px;
	margin-left: -11px;
	width:1352px;
}
		#header a.logo{no-repeat 5px top;
	display: block;
	float: left;
	height: 137px;
	width: 80px
}
		#header h1{display:none}
		#menu{
	float: left;
	list-style: none;
	margin-top: 48px;
	margin-right: 0;
	margin-left: 358px;
	margin-bottom: 0;
	margin-left: 317px
}
		#menu li{display:block;float:left;height:60px}
		#menu li a{display:block;color:#7BD2DC;float:left;font-size:19px;font-weight:bold;height:60px;line-height:60px;padding:0 8px;text-align:center;text-decoration:none}
		#menu:hover li.on a:hover,
		#menu li a:hover,
		#menu li.on a{background:url(/borderless/images/default/bg_header_menu.png) no-repeat center bottom;_background:none;color:#00FFF3}
		#menu li.platforms a:hover{background:none}
		#menu:hover li.on a{background:none}
		#menu li a.menutooltip{background:#080808;color:#fff;line-height:1;padding:6px;text-indent:0;width:auto;z-index:2}
		#login{float:right;padding-right:10px;text-align:right;width:370px;color:#FFFFFF}
		#login a{color:#FFFFFF;text-decoration:none}
	body{background-color:black;}
	</style>
<body>
<div id="body">
  <div id="header">
			<div class="container">
			<h1>Titan Games</h1>
			<a href="main.php" class="logo" title="Home"><img src="BetaTitan.png" height="140"/></a>
		<ul id="menu">
		<li><a href="#">Games</a></li>
		<li><a href="#">Community</a></li>
		<li><a href="AboutUs.php">About Us</a></li>
		<li><a href="#">Support</a></li>
        <li><a href="developer.php">Developer</a></li>
		</ul>
			</div><!--div container-->
		</div><!--div header-->
	<div id="content">
		<div class="container">
			<div id="member">
				<div id="login">
					<span>
						<?php
							$user_check = $_SESSION['login_user'];   
							$result = mysqli_query($conn, "select * from user where User_usrname LIKE '$user_check' ");
							$rows = mysqli_fetch_assoc($result);
							$devid = $_GET['dev'];
							
							$adcheck = $rows['Dev_admin'];
							$link1 = 'RegisterUser.php';
							$link2 = 'loginpage.php';
							$link3 = 'logout.php';
							$link4 = 'edit_profile.php';
							$link5 = 'edit_grprofile.php';
							$result2 =mysqli_query($conn, "select * from developer_group where Dev_ID = '$devid'");
							$row = mysqli_fetch_assoc($result2);
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
							{
								
								echo "Welcome &nbsp;";
								echo $_SESSION['login_user'];
								echo "&nbsp;/&nbsp;";
								echo "<a href = '".$link4."'>Edit Profile</a>";
								echo "&nbsp;/&nbsp;";
								if($adcheck == '1')
								{echo "<a href = '".$link5."?dev=".$devid."'>Edit Group Profile</a>";
								 echo "&nbsp;/&nbsp;";}
								echo "<a href = '".$link3."'>Log Out</a>";
							}
							else
								{
								echo "Welcome &nbsp;/&nbsp; </i>";
								echo "<a href='".$link1."'>Register</a>&nbsp;/&nbsp;";
								echo "<a href='".$link2."'>Login</a>";
								}
							?>
					</span>
				</div><!--div login-->
			</div><!--div member-->
		</div><!--div container-->
	</div><!--div content-->
		<br>
<div>
    <div style="background-color:red;margin-left:150px;margin-right:300px;padding-left:50px;">
    <h1>Edit Profile</h1>
  	<hr>
	</div>
	<fieldset style="margin-left:150px;margin-right:300px;background-color:white;" >
	<div style="float:left;margin-left:70px;margin-top:50px;">
      <div>
        <div>
			<img src="<?php echo $row["headerIMG"]?>" height="300" width="300" class="avatar img-circle" alt="avatar" value="image">
				<form action="grpupload.php?dev=<?php echo $devid ?>" method="post" enctype="multipart/form-data"><!--img upload form-->
				<h5>Select image to upload: </h5>
				<label>Header Image</label><br>
				<input type="file" name="GPHeader" id="GPHeader"><br><br>
        </div>
		<div>
			<img src="<?php echo $row["previewIMG"]?>" height="300" width="300" class="avatar img-circle" alt="avatar" value="image">
				<h5>Select image to upload: </h5>
				<label>Preview Image</label><br>
				<input type="file" name="Gpreviewimage" id="Gpreviewimage"><br><br>
				<input type="submit" value="Upload Image" name="submit">
			</form>
        </div>
      </div>
	</div>
	<div style="float:right;margin-right:300px;">
        <h2>Group info</h2>
		
        <fieldset style="width:300px;">
        <form name="personal" role="form" method = "POST" action=""><!--form start-->
		<div>
            <label>Group Name :</label>
            <div>
              <input type="text" name="GroupName" size="25" value="<?php echo $row["Dev_Group_Name"]; ?>">
			  <br>
            </div>
          </div>
		  
		  <div>
			  <label>Group Privacy :</label>
			  <div>
				<select name="privacy">
					<option value="1"<?php if($row["Privacy"] =='1') echo 'selected ="selected"';?>>Public - everyone can view the group</option>
					<option value="2"<?php if($row["Privacy"] =='2') echo 'selected ="selected"';?>>Private - only members can view the group</option>
				</select>
			  </div>
		  </div>
		  
          <div class="form-group">
            <label class="col-lg-3 control-label">Group Email :</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="grpemail" id="Custemail" size="25" value="<?php echo $row["Group_email"]; ?>"><br>
			</div>
          </div>
		  
		  <div class="form-group">
            <label class="col-lg-3 control-label">Re-enter Email :</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="Confemail" id="Confemail" size="25" value="<?php echo $row["Group_email"]; ?>"><br>
            </div>
          </div>
		  
		  <div>
		   <label>Company</label>
		    <select id="selectList" name="Company" onchange="toggle()">
			<option value="No"<?php if($row["Company"] =="No") echo 'selected ="selected"';?>>No</option>
			<option value="Yes"<?php if($row["Company"] =='Yes') echo 'selected ="selected"';?>>Yes</option>
			</select>
		  </div>
		  
		  <div id="hidContent">
			<div>
				<label>Company Name</label>
				<div>
					<input type="text" name="CName" size="20" value = "<?php echo $row["Com_name"]; ?>">
				</div>
			</div>
			
			<div>
				<label>Company Address</label>
				<div>
					<input type="text" name="CAddress" size="20" value = "<?php echo $row["Com_addr"]; ?>">
				</div>
			</div>
			
			<div>
				<label>State</label>
				<div>
					<input type="text" name="State" size="20" value = "<?php echo $row["Com_state"]; ?>">
				</div>
			</div>
			
			<div>
				<label>Postcode</label>
				<div>
					<input type="text" name="Postcode" size="20" value = "<?php echo $row["Com_postcode"]; ?>">
				</div>
			</div>
			
			<div>
				<label>Country</label>
				<div>
					<input type="text" name="Country" size="20" value = "<?php echo $row["Com_country"]; ?>">
				</div>
			</div>
			
			<div>
				<label>Company Phone</label>
				<div>
					<input type="text" name="CPhone" size="20" value = "<?php echo $row["Com_phone"]; ?>">
				</div>
			</div>
			
			<div>
				<label>Company Fax</label>
				<div>
					<input type="text" name="CFax" size="20" value = "<?php echo $row["Com_fax"]; ?>">
				</div>
			</div>
		  </div><!--hidContent-->
		  
			<div>
				<label>Homepage</label>
				<div>
					<input type="text" name="homepage" size="20" value = "<?php echo $row["Homepage"]; ?>">
				</div>
			</div>
			
			<div>
				<label>Summary</label>
				<br>Please remove pre upon when edit
				<div>
					<textarea name="Summary" cols="80" rows="5" maxlength="1000"><?php echo $row["Summary"]; ?></textarea>
				</div>
			</div>
		  
			<div>
				<label>Article and Media</label>
				<div>
					<br><input type="checkbox" name="article" value="Articles"<?php if($row["Articles"]=='1') echo "checked='checked'";?>/>Articles 
					<br><input type="checkbox" name="media" value="Media"<?php if($row["Media"]=='1') echo "checked='checked'";?>/>Media 
				</div>
			</div>
		  
		  <br>
              <input class="form-control" type="submit" name="submit1" value="Save Changes"/>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
          </form>
	</fieldset>
</fieldset>
</div>
<script>
	var email = document.getElementById("Custemail"), confirm_email = document.getElementById("Confemail");;
	function validateEmail(){
		if(email.value != confirm_email.value) {
			confirm_email.setCustomValidity("Email Don't Match");
		} 
		else {
			confirm_email.setCustomValidity('');
		}
}

	
	email.onchange = validateEmail;
	confirm_email.onkeyup = validateEmail;
</script>
</div>
<?php 
	if(isset($_POST['submit1']))
	{
		$gname = $_POST['GroupName'];
		$privacy = $_POST['privacy'];
		$gemail = $_POST['grpemail'];
		$company = $_POST['Company'];
		$cname = $_POST['CName'];
		$cadd = $_POST['CAddress'];
		$state = $_POST['State'];
		$postcode = $_POST['Postcode'];
		$country = $_POST['Country'];
		$phone = $_POST['CPhone'];
		$fax = $_POST['CFax'];
		$homepage = $_POST['homepage'];
		$summary = "<pre>";
		$summary .= $_POST['Summary'];
		$summary .= "</pre>";
		if(isset($_POST["article"]))
		{$Articles = "1";}
		else
		{$Articles = "0";}
		if(isset($_POST["media"]))
		{$Media = "1";}
		else
		{$Media = "0";}
	
	mysqli_query($conn,"update developer_group set Dev_Group_Name='$gname',Privacy='$privacy',Company='$company',Com_name='$cname',Com_addr='$cadd',Com_state='$state'
	,Com_postcode ='$postcode',Com_country='$country',Com_Phone='$phone',Com_fax='$fax',Group_email='$gemail',Homepage='$homepage',Articles='$Articles',Media='$Media'
	,Summary='$summary' where Dev_ID = '$devid'");
	}
?>
</body>
</html>

	