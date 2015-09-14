<?php    
include("conn.php");
session_start();
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
		<li><a href="#">Games</a></li>
		<li><a href="#">Community</a></li>
		<li><a href="AboutUs.php">About Us</a></li>
		<li><a href="#">Support</a></li>
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
    <h1>Your Profile</h1>
  	<hr>
	</div>
	<fieldset style="margin-left:150px;margin-right:300px;background-color:white;" >
	<div style="float:left;margin-left:70px;margin-top:50px;">
      <div>
        <div>
			<img src="<?php echo $row["image"]?>" height="300" width="300" class="avatar img-circle" alt="avatar" value="image">
        </div>
      </div>
	</div>
	
	<div style="float:left; margin-top:30px; margin-left:20px;">
        <h2>Personal info</h2>
		
        <fieldset style="width:300px;">
		<div>
            <label style="font-size:20px;">First name :</label>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="font-size:20px;">Last name :</label>
            <div>
              <?php echo $row["User_Fname"]; ?>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  <?php echo $row["User_Lname"]; ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label" style="font-size:20px;">Email :</label>
            <div class="col-lg-8">
              <?php echo $row["User_email"]; ?>
			 
            </div>
          </div>
		  <div class="form-group">
		   <label style="font-size:20px;">Contact number :</label>
		   <div class="col-md-8">
		    <?php echo $row["User_contact"]; ?>
			</div>
		  </div>
		  <div>
		   <label style="font-size:20px;">Address :</label>
		   <div>
		    <?php echo $row["User_address"]; ?>
		   </div>
		  </div>
		  <div>
		   <label style="font-size:20px;">Postcode :</label>
		    <div>
			 <?php echo $row["User_postcode"]; ?>
			</div>
		  </div>
		  <div>
		   <label style="font-size:20px;">Country :</label>
		    <div>
			<?php echo $row["User_country"];?>
			</div>
		  </div>
		  <div>
		   <label style="font-size:20px;">State :</label>
		    <div>
	       <?php echo $row["User_state"];?>
			</div>
		  </div>
		  <br>
	</fieldset>

		<div style="float:right;">
			<h2>Purchase History</h2>
			<fieldset style="width:300px;">
			<?php 
			$uid = $row['User_ID'];
			$firstsql = "select * from payment where User_ID = '$uid'";
			$firstget = mysqli_query($conn,$firstsql);
			while($first = mysqli_fetch_assoc($firstget))
			{
				?>
				<div>
					<label style="font-size:20px;">Order ID :</label>
					<div>
				<?php echo $first['Order_ID'];?>
					</div>
				</div>
				
				<div>
					<label style="font-size:20px;">Payment Date :</label>
					<div>
				<?php echo $first['Payment_date'];?>
					</div>
				</div>
				
				<div>
					<label style="font-size:20px;">Total Price :</label>
					<div>
				<?php echo $first['Price'];?>
					</div>
				</div>
				
				<div>
					<label style="font-size:20px;">Receipt Submit Date :</label>
					<div>
				<?php 
					if($first['Submit_Date']==NULL)
					{
					echo "Not Submit";
					}
					else
					{
					echo $first['Submit_Date'];
					}
				?>
					</div>
				</div>
				
				<div>
					<label style="font-size:20px;">Receipt :</label>
					<div>
					<?php 
						if($first['Receipt']==NULL)
						{
						echo "Not Submit";
						}
						else
						{
							?>
						<a href="<?php echo $first['Receipt']; ?>" target="_blank">Link</a>
							<?php
						}
					?>
					</div>
				</div>
				<?php
			}
			?>
			</fieldset>
		</div>
		</fieldset>
</div>
</div>

</body>
</html>

	