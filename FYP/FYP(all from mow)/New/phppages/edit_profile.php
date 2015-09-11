<?php    
include("conn.php");
$user_check = $_SESSION['login_user'];    
$result = mysqli_query($conn, "select * from user where User_usrname LIKE '$user_check' ");
$row = mysqli_fetch_assoc($result);
 
?>
<html>

<head>
      <title></title>
<link href="iwp.css" rel="stylesheet" type="text/css"><ul></ul>
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
		<li><a href="game.php">Games</a></li>
		<li><a href="#">Community</a></li>
		<li><a href="AboutUs.php">About Us</a></li>
		<li><a href="support.php">Support</a></li>
        <li><a href="developer.php">Developer</a></li>
		</ul>
			</div>
		</div>
	<div id="content">
		<div class="container">
			<div id="member">
				<div id="login">
					<span>
						<?php
							$link1 = 'RegisterUser.php';
							$link2 = 'loginpage.php';
							$link3 = 'logout.php';
							$link4 = 'edit_profile.php';
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
							{
								
								echo "Welcome &nbsp;";
								echo $_SESSION['login_user'];
								echo "&nbsp;/&nbsp;";
								echo "<a href = '".$link4."'>Edit Profile</a>";
								echo "&nbsp;/&nbsp;";
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
				</div>
			</div>
		</div>
	</div>
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
			<img src="<?php echo $row["image"]?>" height="300" width="300" class="avatar img-circle" alt="avatar" value="image">
				<form action="upload.php" method="post" enctype="multipart/form-data">
				<h5>Select image to upload: </h5>
				<input type="file" name="fileToUpload" id="fileToUpload"><br><br>
				<input type="submit" value="Upload Image" name="submit">
			</form>
        </div>
      </div>
	</div>
	<div style="float:right; margin-right:100px;">
        <h2>Personal info</h2>
		
        <fieldset style="width:300px;">
        <form name="personal" role="form" method = "POST" action="successfulupdate.php">
		<div>
            <label>First name :</label>
            <div>
              <input type="text" name="CusFirstName" size="25" value="<?php echo $row["User_Fname"]; ?>">
			  <br>
            </div>
          </div>
          <div>
            <label>Last name :</label>
            <div>
              <input type="text" name="CustLastName" size="25" value="<?php echo $row["User_Lname"]; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email :</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="Custemail" id="Custemail" size="25" value="<?php echo $row["User_email"]; ?>"><br>
			 
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Re-enter Email :</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" name="Confemail" id="Confemail" size="25" value="<?php echo $row["User_email"]; ?>"><br>
			 
            </div>
          </div>
          <div class="form-group">
            <label>Password :</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="CustPass" id="CustPass" size="25" value="<?php echo $row["User_pswrd"]; ?>"><br>
			
            </div>
          </div>
		  <div class="form-group">
            <label>Re-enter Password :</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="ConfPass" id="ConfPass" size="25" value="<?php echo $row["User_pswrd"]; ?>"><br>
			 
            </div>
          </div>
		  <div class="form-group">
		   <label>Contact number :</label>
		   <div class="col-md-8">
		    <input class="form-control" type="text" name="Contact" size="25" value="<?php echo $row["User_contact"]; ?>">
			</div>
		  </div>
		  <div>
		   <label>Address:</label>
		   <div>
		    <input type="text" name="Address" size="25" value="<?php echo $row["User_address"]; ?>">
		   </div>
		  </div>
		  <div>
		   <label>Postcode</label>
		    <div>
			 <input type="text" name="Postcode" size="25" value="<?php echo $row["User_postcode"]; ?>">
			</div>
		  </div>
		  <div>
		   <label>Country</label>
		    <div>
			<select name="Country" size="1">
			<option value="<?php echo $row["User_country"];?>"selected><?php echo $row["User_country"]; ?></option>
			<option value="Malaysia">Malaysia</option>
			<option value="Singapore">Singapore</option>
			<option value="Thailand">Thailand</option>
			<option value="Indonesia">Indonesia</option>
			<option value="Philippines">Philippines</option>
			</select>
			</div>
		  </div>
		  <div>
		   <label>State</label>
		    <div>
			 <select name="State" style="width:173px;">
	        <option value="<?php echo $row["User_state"];?>"selected><?php echo $row["User_state"]; ?></option>
			<option value="Johor">Johor</option>
			<option value="Kedah">Kedah</option>
			<option value="Kelantan">Kelantan</option>
			<option value="Malacca">Malacca</option>
			<option value="Negeri Sembilan">Negeri Sembilan</option>
			<option value="Pahang">Pahang</option>
			<option value="Perak">Perak</option>
			<option value="Perlis">Perlis</option>
			<option value="Penang">Penang</option>
			<option value="Sabah">Sabah</option>
			<option value="Sarawak">Sarawak</option>
			<option value="Selangor">Selangor</option>
			<option value="Terengganu">Terengganu</option>
			<option value="wilayah persekutuan">Wilayah Persekutuan</option>
	         </select>
			</div>
		  </div>
		  <br>
              <input class="form-control" type="submit" name="submit" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
          </form>
	</fieldset>
</fieldset>
</div>
<script>
	var password = document.getElementById("CustPass"), confirm_password = document.getElementById("ConfPass"), email = document.getElementById("Custemail"), confirm_email = document.getElementById("Confemail");;
	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} 
		else {
			confirm_password.setCustomValidity('');
		}
}
	function validateEmail(){
		if(email.value != confirm_email.value) {
			confirm_email.setCustomValidity("Email Don't Match");
		} 
		else {
			confirm_email.setCustomValidity('');
		}
}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
	email.onchange = validateEmail;
	confirm_email.onkeyup = validateEmail;
</script>
</div>

</body>
</html>

	