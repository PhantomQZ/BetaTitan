<?php
session_start(); //start session
include("conn.php"); //include config file
$result = mysqli_query($conn, "select * from game where Game_Register_ID='1'");
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script>
function comments()
				{	
					<?php
						if(isset($_POST["btnsubmit"])){
						$comment = $_POST['GSummary'];
						$user = $_SESSION['login_user'];
						$gname = $row['Game_name'];
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
							mysqli_query($conn,"Insert into comment (Comment_text, User_ursname, Game_name) value ('$comment', '$user', '$gname')");
							header('Location: d2.php');
							}
							else{
							header('Location: loginpage.php');
							}
						}
					?>
				}

$(document).ready(function(){	
		$(".form-item").submit(function(e){
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Adding...'); //Loading button text 

			$.ajax({ //make ajax request to cart_process.php
				url: "cart_process.php",
				type: "POST",
				dataType:"json", //expect json value from server
				data: form_data
			}).done(function(data){ //on Ajax success
				$("#cart-info").html(data.items); //total items in cart-info element
				button_content.html('Add to Cart'); //reset button text to original text
				alert("Item added to Cart!"); //alert user
				if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
					$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				}
			})
			e.preventDefault();
		});

	//Show Items in Cart
	$( ".cart-box").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn(); //display cart box
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
		$("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
	});
	
	//Close Cart
	$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //close cart-box
	});
	
	//Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //get product code
		$(this).parent().fadeOut(); //remove item element from box
		$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
			$("#cart-info").html(data.items); //update Item count in cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
		});
	});

});
</script>
<html>
<head>
<meta charset="utf-8">
<link href="d2.css" rel="stylesheet" type="text/css"><ul></ul>
<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
<title>Dota 2</title>
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

 a.fancybox img {
        border: none;
        box-shadow: 0 1px 7px rgba(0,0,0,0.6);
        -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
    } 
 a.fancybox:hover img {
        position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
    }


    </style>
</head>

<body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
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
	<?php
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{	?>
		<a href="#" class="cart-box" id="cart-info" title="View Cart">
		<?php
		}
		?>

<?php 
if(isset($_SESSION["products"])){
	echo count($_SESSION["products"]); 
}else{
	echo 0; 
}
?>
</a>
<div class="shopping-cart-box">
<a href="#" class="close-shopping-cart-box" >Close</a>
<h3>Your Shopping Cart</h3>
    <div id="shopping-cart-results">
    </div>
</div>

<div id="contentlock">
	<div id="topdiv">
		<div id="topdivHeader">
        	<div id="Hicon">
			<img src="<?php echo $row['Game_icon'] ?>" "height="50"width="64"margin-left="20px"/>
            </div>
            <div id="settitle">
			<div id="locktitle">
			<span id="titlecss"><b><?php echo $row["Game_name"] ?></b></span></div>
		
			<?php
//List products from database
//Display fetched records as you please

	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{	
$game =  '<ul class="products-wrp">';
$game .= <<<EOT
<li>
<form class="form-item">
<div class="item-box">
    <input name="Game_Register_ID" type="hidden" value="1">
    <button type="submit">Add to Cart</button>
</div>
</form>
</li>
EOT;

$game .= '</ul></div>';

echo $game;
	}
	else{
$game =  '<ul class="products-wrp">';
$game .= <<<EOT
<li>
<form class="form-item">
<div class="item-box">
    <input name="Game_Register_ID" type="hidden" value="1">
	<button type="button" onclick="alert('You must login to purchase')">Add to Cart</button>
</div>
</form>
</li>
EOT;

$game .= '</ul></div>';

echo $game;
		}
			?>
			<div id="titleExB">
			<br><div id="gameprice"><b>RM <?php echo $row["Game_price"]; ?></b></div></div>
		
			</div><!--End of header title division-->

			</div><!--Title Blue Line-->
			<div id="topDivBackg">
			<div id="topdivDescrip">
			<form name="GRating">
			<table width="105%" border="0" cellpadding="6">
				<tr>
					<td>Genre
					<td>Real Time Strategy
				<tr>
					<td>Theme
					<td>War
				<tr>
					<td>Type
					<td>Single & Multiplayer
				<tr>
					<td>Developer
					<td><a href="#"target="_blank"title="GHomePage" style="color: white"><b><?php echo $row['Dev_Group_Name'] ?></b></a>
				<tr>
					<td>Official Page
					<td><a href="<?php echo $row['Game_homepage'] ?>"target="_blank"title="GHomePage" style="color: white"><b><?php echo $row['Game_homepage'] ?></b></a>
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
			Dota 2</a> is a multiplayer online battle arena game in a three-dimensional environment, presented from an oblique high-angle perspective. 
			<br>The player commands one of 109 controllable character "Heroes." 
			<br>Each Hero begins the match at level one and becomes more powerful by accumulating experience points through combat, thereby leveling up to the maximum level of twenty-five. 
			<br>With every level gained the player either selects a new ability for their Hero to learn or enhance their general statistics. 
			<br>Each Hero's method of combat is influenced by its primary property: Strength, Agility, or Intelligence.
			<br><br>Dota 2 features items, which the player stores in an inventory. 
			<br>These items are acquired predominantly through purchase with gold, the in-game currency. Items vary in function: some enhance the statistics of a Hero, while others grant additional abilities. 
			<br><br>The player automatically receives small increments of gold continuously, though they can obtain more by destroying enemies. 
			<br>Killing non-player characters grants gold only to the player who lands the final blow, whereas killing enemy Heroes grants gold to the player's nearby allies as well. 
			<br>Destroying Towers or killing Roshan gives gold to all players on the team. 
			<br>"Denying" is a feature of the game where players inhibit the enemy's ability to accumulate gold and experience by killing an allied unit or destroying an allied structure before the enemy can do so.
			<br><br>Each match of Dota 2 takes place on a functionally symmetrical map that features the strongholds of two warring factions, the Radiant and the Dire. 
			<br>The Radiant is based at the southwest corner of the map, while the Dire is based at the northeast corner; the two sides are divided by a river that runs perpendicular to the central lane.
			<br>These factions are defended by up to five players. 
			<br>In each stronghold is a critical structure called the "Ancient", a fountain that provide health and lesser structures. 
			<br>These bases are connected by three paths, referred to as "lanes"—two run alongside the edges of the map, while one runs directly between the two bases. 
			<br>The lanes are guarded by defensive Towers, as well as autonomous characters called "creeps", which periodically spawn in groups and travel along the lanes, attacking enemies they encounter.
			<br>Featured across the map are hostile characters referred to as "neutrals", which are not aligned to either faction and are primarily located in the forests. 
			<br>Located in a tarn on the northeast side of the river is a "boss" called "Roshan", who typically requires multiple team members to kill and drops powerful items.
			<br><br>Dota 2 features seasonal events, which provide players with the option of playing the game with special game modes that alter the aesthetics and objectives.
			<br>With the seasonal event game modes, the central focus of the game shifts away from the standard battle composition, in order to focus on new objectives central to the seasonal events. 
			<br>So far, there have been three seasonal events: the Halloween-themed Diretide event, the Christmas-themed Frostivus event, and the New Bloom Festival, which celebrates the coming of spring.
<br>
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
				<video id="my-video" class="video" width="320" height="150" controls><source src="DotA 2 Trailer 2.mp4"></video>
				<img class="fancybox" src="pic1.jpg"/>
				<img class="fancybox" src="pic2.png"/>
				<img class="fancybox" src="pic3.jpg"/>
				<img class="fancybox" src="pic4.jpg"/>
				<img class="fancybox" src="pic5.jpg"/>
				<img class="fancybox" src="pet.jpeg"/>
				<img class="fancybox" src="pic7.jpg"/>
				<img class="fancybox" src="pic8.jpg"/>
				<img class="fancybox" src="pic9.jpg"/>
			</div><!--Image Division for scrolling-->
			</div><!--Scroll division-->
			</div><!--Wrapper division-->
		</body>
		</html>
		
			</div><!--img Division for margin-->
			<div id="CommentSec">
			<h1>Comments</h1>
			<?php
			$name = $row['Game_name'];
			$cmt = mysqli_query($conn, "select * from comment where Game_name='$name'");
			while($getcmt = mysqli_fetch_assoc($cmt))
			{	$result = $getcmt['Comment_text'];
				//$name = $_SESSION['login_user'];
				if($result!=NULL){
				?>
				<br>
				<b><u><?php echo $getcmt['User_ursname'];?></u></b>
				<br>
				<?php
				echo $getcmt['Comment_text'];
				?>
				<br>
				<?php
				}
				else{
				
				}
				
			
			}
			
			?>
			
			<div id="hidContent">
			<?php
			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			?>
			<form name="comment" method="POST">
			<br><textarea name="GSummary" cols="80" rows="5" maxlength="1000"></textarea>
			<br><br><input type="submit" name="btnsubmit" value="Comment" onclick="comments();"/>
			</form>
			<?php
			}
			else{
			?>
				<br><br>
				<b><u><a href="loginpage.php"><?php echo "You must login to comment.";?></a></u></b>
			<?php
			}
			?>
			
			</div>
			</div><!--Comment div-->
			</div><!--Summary division-->
			</div><!--Header division-->
			</div><<!--Top division-->


</div><!--Content Lock-->
</div><!--Body-->