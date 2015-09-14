<?php
require 'conn.php';
session_start();
$result="select * from developer_group";
$r = mysqli_query($conn, $result);


?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
<TITLE>Game Register</TITLE>
</HEAD>
<style>
#header{
	background: #191919 url(/borderless/images/default/bg_header.png) repeat-x center top;
	height: 140px;
	margin-top: -10px;
	margin-left:-11px;
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
	background-color: #3E4957 ;
}
#MContentHeader
{
	background-color:red;
	padding-left:10px;
	font-size:20px;
}
#MContent
{
	background-color:white;
	padding:30px;
	margin-top:-25px;
}
#pagecontent
{
	width:800px;
	margin-left:150px;
}
</style>
<BODY style=background-color:#424242;>
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
<br><br>
<div id="pagecontent">
<div id="MContentHeader">
<h2 style=font-code:white;>Game Register</h2>
</div>
<div id="MContent">
Before submitting your game, please ensure you read all of the rules below. These rules exist to ensure a high-quality list of games being actively developed are maintained on Titan. Failure to adhere to any of these rules will result in your game being archived.
<ul>
<li>BRAND NEW games or JUST STORYLINES / IDEAS will not be accepted. The majority of your game must be developed and consequently
you must be able to show a significant amount of progress, e.g. screenshots of models and maps that you are working on, in-game videos MINIMUM.</li>
<li>The game is unique and original and not in violation of another's intellectual property.</li>
<li>The game is not a duplicate of another game listed on the site.</li>
<li>The game information provided must not violate the sites Terms of Service.</li>
<li>The game information provided is free of spelling and HTML formatting errors.</li>
<li>Submitting a game and then posting 'help wanted' requests does not constitute activity. 
Your game must BE IN ACTIVE DEVELOPMENT with either a team of people or yourself producing content.</li>
<li>Is this a game you want us to add mod support for? Then please don't add it to Titan, just contact us with the game name.</li>
</ul>
<br><br>
<form method="POST" action="successfulregister_game.php">
<b>Icon*</b>
<br>
<span style="font-color:silver;font-size:12px;">500kb max, square image, 64x64 or high recommended</span>
<br><input type="file" name="icon" value="Choose file"> 
<br><br>
<b>Boxshot</b>
<br><span style="font-color:silver;font-size:12px;">5000kb max, 480x660 or 960x1320 size, must include a clearly readable game logo.</span>
<br><input type="file" name="boxshot" value="Choose file"> 
<br><br>
<b>Preview Image*</b>
<br><span style="font-color:silver;font-size:12px;">2000kb max, 1024x768 size recommended<br>The preview image is shown when browsing the games listing.</span>
<br><input type="file" name="previewimage" value="Choose file"> 
<br><br>
<b>Profile Header Image</b>
<br><span style="font-color:silver;font-size:12px;">2000kb max, 940x370 minimum<br>Please upload an in-game screenshot here with no text as that will look best.</span>
<br><input type="file" name="PHeader" value="Choose file"> 
<br><br>
<b>Sequel</b>
<br><span style="font-color:silver;font-size:12px;">If this game is an sequel, type in the name of the first game in the series and select it 
(for example for SDO 3, you would select SDO 1). If the game cannot be found, we recommend you add it on the creators behalf.</span>
<br><input type="text" name="SequalName" size="30" maxlength="50">
<br><br>
<b>Expansion Pack</b>
<br><span style="font-color:silver;font-size:12px;">If this game is an expansion and requires another game to run, type in the games name and select it. 
If the game cannot be found, we recommend you add it on the creators behalf.</span>
<br><input type="text" name="ExpansionPack" size="30" maxlength="50">
<br><br>
<b>Developer*</b>
<br><span style="font-color:silver;font-size:12px;">Only development & publishing companies which allow you to add games are listed. If the developer is not listed here or on the developers page, 
we recommend you add it and then complete this form. Also, the developer and its members will be given control of the games profile.</span>
<br><select name="developer" width="250" style="width: 250px">
	<option value="0">Select Your Developer Group</option>
	<?php 
	while($row = mysqli_fetch_assoc($r))
	{
	?>
	<option value="<?php echo $row["Dev_Group_Name"]; ?>"><?php echo $row["Dev_Group_Name"]; ?></option>
	<?php
	}
	?>
	</select>
<br><br>
<b>Style*</b>
<br><select name="GStyle" width="250" style="width: 250px">
	<option value="Null">
	<optgroup label="Action">
	<option value="FPS">First Person Shooter
	<option value="TPS">Third Person Shooter
	<option value="TTS">Tatical Shooter
	<option value="Fighting">Fighting
	<option value="Arcade">Arcade
	<option value="Stealth">Stealth
	<optgroup label="Adventure">
	<option value="Adventure">Adventure
	<option value="Platformer">Platformer
	<option value="PointAndClick">Point and Click
	<option value="VisualNovel">Visual Novel
	<optgroup label="Driving">
	<option value="Racing">Racing
	<option value="CarC">Car Combat
	<optgroup label="RPG">
	<option value="RP">Role Playing
	<option value="RL">Rogue Like
	<option value="HNS">Hack 'n' Slash
	<optgroup label="MMO">
	<option value="MM">Massive Multiplayer
	<optgroup label="Strategy">
	<option value="RTS">Real Time Strategy
	<option value="RTSS">Real Time Shooter
	<option value="RTT">Real Time Tactics
	<option value="TTS">Turn Based Strategy
	<option value="TTT">Turn Based Tactics
	<option value="TD">Tower Defense
	<option value="GD">Grand Defense
	<option value="4x">4x
	<optgroup label="Sport">
	<option value="BB">Baseball
	<option value="MBA">Basketball
	<option value="FB">Football
	<option value="Golf">Golf
	<option value="Hockey">Hockey
	<option value="Soccer">Soccer
	<option value="Wrestling">Wrestling
	<option value="Alternative">Alternative Sport
	<optgroup label="Simulation">
	<option value="CombatSim">Combat Sim
	<option value="FutureSim">Futuristic Sim
	<option value="RealSim">Realistic Sim
	<optgroup label="Puzzle">
	<option value="Cinematic">Cinematic
	<option value="Educate">Educational
	<option value="Family">Family
	<option value="Party">Party
	<option value="Rhythm">Rhythm
	<option value="VL">Virtual Life
	<option value="PC">Puzzle Compilation
	</select>
<br><br>
<b>Theme*</b>
<br><select name="GTheme" width="250" style="width: 250px">
	<option value="Null">
	<option value="Abstract">Abstract
	<option value="Anime">Anime
	<option value="Antiquity">Antiquity
	<option value="Comedy">Comedy
	<option value="Comic">Comic
	<option value="Educate">Educational
	<option value="Fantasy">Fantasy
	<option value="Fighter">Fighter
	<option value="History">History
	<option value="Horror">Horror
	<option value="Mafia">Mafia
	<option value="Medieval">Medieval
	<option value="Movie">Movie
	<option value="Nature">Nature
	<option value="Noire">Noire
	<option value="Realism">Realism
	<option value="SC">Sci-Fi
	<option value="Sport">Sport
	<option value="War">War
	<option value="Western">Western
	</select>
<br><br>
<b>Type*</b>
<br><select name="GType" width="250" style="width: 250px">
	<option value="Null">
	<option value="SP">Single Player
	<option value="MP">Multiplayer
	<option value="CO">Co-op
	<option value="SP&MP">Single & Multiplayer
	<option value="SP&CO">Single & Co-op
	<option value="MP&CO">Multiplayer & Co-op
	<option value="SP&MP&CO">Single & Multiplayer & Co-op
	</select>
<br><br>
<b>Release estimate*</b>
<br><span style="font-color:silver;font-size:12px;">Select the date your game was (or you estimate it will be) first released. 
Select TBD (to be decided) if you do not yet know the date.</span>
<br><br><select name="RE">
	<option value"date">-->
	<option value="TBD">TBD
	</select>
	<input type="date" name="REDate">
<br><br>
<b>Homepage</b>
<br><input type="text" name="Homepage" size="50">
<br><br>
<b>Game Name*</b>
<br><input type="text" name="GName" size="50" maxlength="50">
<br><br>
<b>Game Price*</b>
<br><input type="number" name="Gprice" size="50" maxlength="50">
<br><br>
<b>Summary*</b>
<br><span style="font-color:silver;font-size:12px;">Text Only</span>
<br><textarea name="GSummary" cols="80" rows="5" maxlength="1000"></textarea>
<br><br>
<b>Allow the community to add content in these areas to your games profile::<b>
<br><input type="checkbox" name="Articles" value="1"/>Articles 
<br><input type="checkbox" name="Media" value="1"/>Media 
<br><input type="checkbox" name="Mods" value="1"/>Mods
<br>
<br><br>
<span style="float:right;"><input type="submit" name="btnsubmit" value="SendGame"/><span>
</form>
</div>
</div>
</BODY>
</HTML>
