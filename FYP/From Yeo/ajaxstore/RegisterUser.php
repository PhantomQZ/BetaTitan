<?php include("conn.php");  ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Titan Gaming</title>
	<style>
		#header{
	background: #191919 url(/borderless/images/default/bg_header.png) repeat-x center top;
	height: 140px;
	margin-top: -10px;
	margin-left:-11px;
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
#regisbackg{
	background-image: url(Registerb.jpg);
	background-repeat: no-repeat;
	background-size:1120px 750px;
	text-align: left;
	width:1352px;
	margin-left:100px;
	height:760px;
	margin-top:80px;
}
#regisform
{
	 background-color:rgba(255,255,255,0.6);
	 margin-top: 80px; 
	 margin-left:320px;
	 
}
#titlep
{
background-color:red;
width:1120px;
margin-top:-58px;
}
#body{display:block;}
    </style>
</head>

<body style="background-color:#424242;">
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
						Welcome&nbsp;/&nbsp;
						<a href="RegisterUser.php">Register</a>
						&nbsp;/&nbsp;
						<a href="login.php">Login</a>
					</span>
				</div>
			</div>
		</div>
	</div>
	        <div id="regisbackg">
<h1 align="center">&nbsp;</h1>
<div id="titlep"><h1 style="margin-left:460px"><u>Register Page</u></h1></div>
<div id="regisform" style="width:450px;">
<form name="register" method="post" action="successfulregister.php">
<table width="105%" border="0" cellpadding="6">
  <tbody text-align: left;">
	<tr>
      <td><label for="CusFirstName">First Name :</label></td>
      <td style="text-align: left"><input name="CusFirstName" type="text" required id="CusFirstName" placeholder="First Name" size="25" maxlength="20"></td>
    </tr>
	<tr>
      <td><label for="CustLastName">Last Name :</label></td>
      <td style="text-align: left"><input name="CustLastName" type="text" required id="CustLastName" placeholder="Last Name" size="25" maxlength="20"></td>
    </tr>
	<tr>
      <td><label for="CustUsername">Username :</label></td>
      <td style="text-align: left"><input name="CustUsername" type="text" required id="CustUsername" placeholder="Username" size="25" maxlength="16"></td>
    </tr>
    <tr>
      <td><label for="CustPass">Choose a Password :</label></td>
      <td style="text-align: left"><input name="CustPass" type="password" required id="CustPass" placeholder="Password" size="25" maxlength="20"></td>
    </tr>
	<tr>
      <td><label for="ConfirmPass">Re-enter Password :</label></td>
      <td style="text-align: left"><input name="ConfPass" type="password" required id="ConfPass" placeholder="Re-enter Password" size="25" maxlength="20"></td>
    </tr>
	<tr>
      <td><label for="Custemail">Email :</label></td>
      <td style="text-align: left"><input name="Custemail" type="email" required id="Custemail" placeholder="Email Address" size="25" maxlength="35"></td>
    </tr>
    <tr>
    <tr>
    <td><label for="phone">Hp_Number: </label></td>
	<td><input type="number" name="phone" data-type="expression" required placeholder="HP number" size="25" maxlength="11" data-message="Not a valid phone number"></td>
</tr>
<tr>
    <td><label for="address">Address: </label></td>
	<td><input type="text" name="address" id="address" data-type="string" size="25" maxlength="50" data-message="This field may not be empty" /></td>
</tr>
<tr>
    <td><label for="zip">ZIP Code: </label></td>
	<td><input type="text" name="zip" id="zip" data-type="string" size="25" data-message="This field may not be empty" /></td>
</tr>
	<tr>
    <td><label for="city">City: </label></td>
	<td><input type="text" name="city" id="city" data-type="string" size="25" data-message="This field may not be empty" /></td>
</tr>

<tr>
    <td><label for="state">State: </label></td>
	<td><select name="state"style="width:173px;">
	        <option value="">Select</option>
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
	  </select></td>
	<tr>
	<tr>
    <td><label for="country">Country: </label></td>
	<td><select name="country" id="country" style="width:173px;" data-type="string" data-message="This field may not be empty">
			<option value="">Select</option>
			<option value="MYS">Malaysia</option>
		</select></td>
</tr>
      <td>Choose a Question :</td>
      <td style="text-align: left"><select required name="SQuestion" width="250" style="width: 250px">
									<option value="1">What is the name of your school?</option>
									<option value="2">What is your favorite team?</option>
									<option value="3">What is your mother's maiden name?</option>
									<option value="4">What is the name of your pet?</option>
									<option value="5">Who was your childhood hero?</option>
									<option value="6">What city were you born in?</option>
	  </td>					
    </tr>
	<tr>
      <td>Secret Answer :</td>
      <td style="text-align: left"><input name="SecretAns" type="text" required id="SecretAns" placeholder="Secret Answer You Will Remember" size="25" maxlength="30" required></td>
    </tr>
    <tr>
      <td>Agreements</td>
      <td style="text-align: left"><input type="checkbox" name="checkbox" id="checkbox">
        <a href="AboutUs.html" target="_blank"> <b>Terms & Condition</b></a></td>
    </tr>
	
    <tr>
      <td></td>
      <td style="text-align: left"> <input type="reset" name="reset" id="reset" value="Reset">        <input type="submit" name="submit" id="submit" value="Submit"></td>
    </tr>
    <tr>
    	<th colspan="2"> Already have an account?<a href="AboutUs.html"> Back to Homepage</a><a href="AboutUs.html"> </a></th>
    </tr>

  </tbody>
</table>
</form>
</div>
</div>
<script>
	var password = document.getElementById("CustPass"), confirm_password = document.getElementById("ConfPass");
	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} 
		else {
			confirm_password.setCustomValidity('');
		}
}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
	
</script>
</body>
</html>
