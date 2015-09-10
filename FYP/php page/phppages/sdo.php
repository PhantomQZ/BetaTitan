<!doctype html>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
				//  Check Radio-box
				$(".rating input:radio").attr("checked", false);
				$('.rating input').click(function () {
				$(".rating span").removeClass('checked');
				$(this).parent().addClass('checked');
				});

				$('input:radio').change(
				function(){
				var userRating = this.value;
				alert(userRating);
				}); 
				});
</script>
<html>
<head>
<meta charset="utf-8">
<link href="sdo.css" rel="stylesheet" type="text/css"><ul></ul>
<title>SDO S3</title>
	<style>
		#header{
	background: #191919 url(/borderless/images/default/bg_header.png) repeat-x center top;
	height: 140px;
	margin-top: -17px;
	margin-left:-8px;
	width:1368px;
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
#body{
	display: block;
}
body{	background-image:url(background.jpg);}
#About{
	text-align: center;
	background-image:url(background03.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	color: white;
}
#About a{color:green;
text-decoration:none;}
#About a:visited{color:white;}
#About a:hover{font-size:18px;color:red;}
#Point1{
	width: 500px;
	float: left;
	background-image: url(asd.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	color: white;
	padding-top: 15px;
	padding-right: 15px;
	padding-bottom: 15px;
	padding-left: 15px;
}
#Point2{
	width: 500px;
	float: right;
	background-image: url(asd.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	color: white;
	padding-right: 15px;
	padding-left: 15px;
	padding-top: 15px;
	padding-bottom: 15px;
}
#Point3{
	width: 500px;
	float: left;
	background-image: url(asd.jpg);
	background-size: cover;
	background-repeat: no-repeat;
	color: white;
	padding-top: 15px;
	padding-left: 15px;
	padding-bottom: 15px;
	padding-right: 15px;
}
#Headerp{
	background-color: rgba(55,55,55,1.06);
	margin-top: -20px;
}
#ContectLock{
	height: 491px;
	width: 1000px;
	margin-left: 147px;
	background-image: url(background02.jpg);
	background-repeat: no-repeat;
	background-size:cover;
}

    </style>
</head>

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
						Welcome&nbsp;/&nbsp;
						<a href="RegisterUser.php">Register</a>
						&nbsp;/&nbsp;
						<a href="login.php">Login</a>
					</span>
				</div>
			</div>
		</div>
	</div>
<div id="contentlock">
	<div id="topdiv">
		<div id="topdivHeader">
        	<div id="Hicon">
			<img src="675105.png""height="50"width="64"margin-left="20px"/>
            </div>
            <div id="settitle">
			<div id="locktitle">
			<span id="titlecss"><b>Super Dancer Online Season 3</b></span></div>
			<div id="lockpurchase"><a href="#"target="_blank"title="Purchase"><img Src="shop2.png"height="80"width="80"/></a></span>
			<span id="purc"><a href="#"target="_blank"title="Purchase"><b>Add to Cart</b></a></span>
			<br><div id="gameprice"><b>RM 90.00</b></div></div>
			</div><!--End of header title division-->
			
			<div id="titleExB">
			</div><!--Title Blue Line-->
			<div id="topDivBackg">
			<div id="topdivDescrip">
			<form name="GRating">
			<table width="105%" border="0" cellpadding="6">
				<tr>
					<td>Genre
					<td>Alternative Sport
				<tr>
					<td>Theme
					<td>Anime
				<tr>
					<td>Type
					<td>Multiplayer
				<tr>
					<td>Developer
					<td><a href="#"target="_blank"title="GHomePage" style="color: white"><b>Group 3</b></a>
				<tr>
					<td>Official Page
					<td><a href="#"target="_blank"title="GHomePage" style="color: white"><b>SDO.com</b></a>
				<tr>
					<td>Contact
					<td><a href="#"target="_blank"title="DevContact" style="color: white"><b>Send Message</b></a>
				<tr>
					<td>
					<td>
				<tr>
					<td>
					<td>
				<tr>
					<td>
					<td>
				<tr>
					<td>
					<td>
				<tr>
					<td>
					<td>
				<tr>
					<td>
					<td>
				<tr>
					<td>Total Rating
					<td><div class="rating">
					<span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
					<span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
					<span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
					<span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
					<span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
					</div>
				<tr>
					<td>Your Rating
					<td><div class="rating">
					<span><input type="radio" name="Urating" id="str5" value="5"><label for="str5"></label></span>
					<span><input type="radio" name="Urating" id="str4" value="4"><label for="str4"></label></span>
					<span><input type="radio" name="Urating" id="str3" value="3"><label for="str3"></label></span>
					<span><input type="radio" name="Urating" id="str2" value="2"><label for="str2"></label></span>
					<span><input type="radio" name="Urating" id="str1" value="1"><label for="str1"></label></span>
					</div>
				</table>
			</form>
				</div><!--Top division game description division-->
				</div><!--top division description there background-->


				<br>
				<br>
			<div id="SummaryDivision">
			<div id="SumNavBar">
			<ul class="tablist"> 
				<li id="current"><a href="#">Summary</a></li> 
				<li><a href="#">Tabs 2</a></li> 
				<li><a href="#">Tabs 3</a></li> 
				<li><a href="#">Tabs 4</a></li> 
			</ul>
			</div><!--Nav bar-->
			<div id="SummaryDescrip">
			DANCE! Online was a downloadable massively multiplayer online music video game produced by David Perry and published by Acclaim in North America. 
			<br>It is a free-to-download PC title that largely resembles a combination of Audition Online and Dance Dance Revolution series. 
			<br>It is based on the Chinese game Super Dancer Online created by 9you.Its open beta period began in March 2007.
			<br><br>Players must dance against other players with songs by pressing each of the four available directional buttons when prompted. 
			<br>By default, players use either the Directional Arrows or WASD keys (or a combination of both) to do this, but dance mats are also supported as an input device. 
			<br><br>There is currently no set list of compatible dance mats, although Acclaim are asking dance mat owners to supply photographs 
			and manufacturer information so that as many dance mats as possible will be compatible with the final release.
			</div><!--Summary Description-->
			<div id="imgDiv">
			    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
				<title>Untitled Document</title>
		</head>

		<body>
				<div class="wrapper">
				<div class="scrolls">
				<div class="imageDiv">
				<img src="sc1.jpg"/>
				<img src="sc2.jpg"/>
				<img src="sc3.png"/>
				<img src="sc4.png"/>
				<img src="sc5.png"/>
				<img src="sc6.jpg"/>
				<img src="sc7.jpg"/>
				<img src="sc8.jpg"/>
				<img src="sc9.jpg"/>
			</div><!--Image Division for scrolling-->
			</div><!--Scroll division-->
			</div><!--Wrapper division-->
		</body>
		</html>
			</div><!--img Division for margin-->
			<div id="CommentSec">
			<h1>Comments</h1>
			<p><span style="color:red">Mow</span>
			<br>I think this game is worth buying</p>
			<br>
			<p><span style="color:red">Philips</span><br>
			Take a break from other game and come to enjoy this beautiful game</p>
			<br>
			<p><span style="color:red">Yeo</span>
			<br>Dance! Dance! Dance! all the way to the sky!</p>
			<br>
			<p><span style="color:red">Terra</span><br>
			Best game ever, keyboard warrior typical =D</p>
			<form name="comment">
			<br><textarea name="GSummary" cols="80" rows="5" maxlength="1000"></textarea>
			<br><br><input type="submit" name="btnsubmit" value="Comment"/>
			</form>
			</div><!--Comment div-->
			</div><!--Summary division-->
			</div><!--Header division-->
			</div><<!--Top division-->


</div><!--Content Lock-->
</div><!--Body-->