<?php    include("conn.php");    
$result = mysqli_query($conn, "select * from user");
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
			<a href="#" class="logo" title="Home"><img src="BetaTitan.png" height="140"/></a>
			<ul id="menu">
			<li><a href="#">Games</a></li>
			<li><a href="#">Community</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Support</a></li>
            <li><a href="#">Developer</a></li>
		</ul>
			</div>
		</div>
	<div id="content">
		<div class="container">
			<div id="member">
				<div id="login">
					<span>
						Welcome&nbsp;/&nbsp;
						<a href="#">Register</a>
						&nbsp;/&nbsp;
						<a href="#">Login</a>
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
	<fieldset style="margin-left:150px;margin-right:300px;background-color:white;">
	<div style="float:left;margin-left:70px;margin-top:50px;">
      <div>
        <div>
          <img src="//placehold.it/300" class="avatar img-circle" alt="avatar" value="image">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control" value="image" >
        </div>
      </div>
	</div>
	<div>
        <h2>Personal info</h2>
		
        <fieldset style="width:300px;">
        <form name="personal" role="form" method = "POST">
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
              <input class="form-control" type="text" name="Custemail" size="25" value="<?php echo $row["User_email"]; ?>"><br>
			  <input type="button" value="Change email address"><br><br>
            </div>
          </div>
          <div class="form-group">
            <label>Password :</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="CustPass" size="25" value="<?php echo $row["User_pswrd"]; ?>"><br>
			  <input type="button" value="Change password"><br><br>
			 
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
			<option value="" disabled selected><?php echo $row["User_country"]; ?></option>
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
	        <option value="" disabled selected><?php echo $row["User_state"]; ?></option>
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

</div>
<?php
if (isset($_POST["submit"]))
    {	
		$cfname =$_POST["CusFirstName"];
		$clname =$_POST["CustLastName"];
		$cpass = $_POST["CustPass"];
		$cemail = $_POST["Custemail"];
		$ucontact = $_POST["Contact"];
		$caddress = $_POST["Address"];
		$state = $_POST["State"];
		$postcode = $_POST["Postcode"];
		$country = $_POST["Country"];
        mysqli_query($conn, "update user set User_pswrd='$cpass', User_Fname='$cfname', User_Lname='$clname', User_email='$cemail', User_contact='$ucontact', User_address='$caddress', User_state='$state', User_postcode='$postcode', User_country='$country' where User_ID='1' ");
    }
?>
</body>
</html>

	