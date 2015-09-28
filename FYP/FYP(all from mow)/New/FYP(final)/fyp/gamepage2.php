<!doctype html>
<?php
session_start(); //start session
include("conn.php"); //include config file
$gameid = $_GET['gameid'];
$result = mysqli_query($conn, "select * from game where Game_Register_ID='$gameid'");
$row = mysqli_fetch_assoc($result);
$title = $row['Game_name'];
$locate = "$_SERVER[HTTP_REFERER]";
if(isset($_GET['delete_id']))
{
     $sql_query2="delete from picture where Pic_ID =".$_GET['delete_id'];
     mysqli_query($conn,$sql_query2);
     header("Location: $locate");
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script>
function delete_id(id)
	{
     if(confirm('Are you sure to delete this picture?'))
     {
        window.location.href='gamepage2.php?delete_id='+id;
     }
	}
	
function comments()
				{	
					<?php
						function test($data)
					{
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						return $data;
					}
						if(isset($_POST["btnsubmit"])){
							$comment = "";
						$comment = test($_POST['GSummary']);
						$user = $_SESSION['login_user'];
						$gname = $row['Game_name'];
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
							mysqli_query($conn,"Insert into comment (Comment_text, User_ursname, Game_name) value ('$comment', '$user', '$gname')");
							header("Location: $locate");
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
<title><?php echo $title; ?></title>
	<style>
		#header{
	background: #191919 url(/borderless/images/default/bg_header.png) repeat-x center top;
	height: 140px;
	margin-top: -17px;
	margin-left:-8px;
	width:1368px;
	color: #f35626;
    -webkit-animation: hue 30s infinite linear;
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
@-webkit-keyframes hue {
    from {
      -webkit-filter: hue-rotate(0deg);
    }

    to {
      -webkit-filter: hue-rotate(360deg);
    }
}


    </style>
	<style>
            /****** Rating Starts *****/
            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

            fieldset, label { margin: 0; padding: 0; }
            body{ margin: 20px; }
            h1 { font-size: 1.5em; margin: 10px; }

            .rating { 
                border: none;
                float: left;
            }

            .rating > input { display: none; } 
            .rating > label:before { 
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before { 
                content: "\f089";
                position: absolute;
            }

            .rating > label { 
                color: #ddd; 
                float: right; 
            }

            .rating > input:checked ~ label, 
            .rating:not(:checked) > label:hover,  
            .rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

            .rating > input:checked + label:hover, 
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label, 
            .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }     


            /* Downloaded from http://devzone.co.in/ */
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
							$link5 = 'list_pm.php';
							$link6 = 'user_profile.php';
							if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
							{
							//We count the number of new messages the user has
							$nb_new_pm = mysqli_fetch_array(mysqli_query($conn,'select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
							//The number of new messages is in the variable $nb_new_pm
							$nb_new_pm = $nb_new_pm['nb_new_pm'];
							//We display the links
								echo "Welcome &nbsp;";
								echo "<a href= '".$link6."'>".$_SESSION['login_user']."</a>";
								echo "&nbsp;/&nbsp;";
								echo "<a href = '".$link5."'>inbox ".$nb_new_pm."</a>";
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
if(isset($_SESSION["products"])){
	echo count($_SESSION["products"]); 
}
else{
	echo 0;

}

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
			<div id="topDivBackg" style="background-image:url(<?php echo $row['Game_image']; ?>);">
			<div id="topdivDescrip">
			<?php
				$firstsql = "select * from game where Game_Register_ID = '$gameid'";
				$first = mysqli_fetch_assoc(mysqli_query($conn,$firstsql));
				$genre = $first['Game_style'];
				$theme = $first['Game_theme'];
				$type = $first['Game_type'];
				$Developer = $first['Dev_Group_Name'];
				$op = $first['Game_homepage'];
				$secondsql = "select * from developer_group where Dev_Group_Name = '$Developer'";
				$second = mysqli_fetch_assoc(mysqli_query($conn,$secondsql));
				$devid = $second['Dev_ID'];
				$gid = $first['Game_Register_ID'];
				
			?>
			<form name="GRating">
			<table width="105%" border="0" cellpadding="6">
				<tr>
					<td>Genre</td>
					<td>
					<?php
					switch($genre)
					{
						case "FPS":
							echo "First Person Shooter";
							break;
						case "TPS":
							echo "Third Person Shooter";
							break;
						case "TTS":
							echo "Tactical Shooter";
							break;
						case "Fighting":
							echo "Fighting";
							break;
						case "Arcacde":
							echo "Arcade";
							break;
						case "Stealth":
							echo "Stealth";
							break;
						case "Adventure":
							echo "Adventure";
							break;
						case "Platformer":
							echo "Platformer";
							break;
						case "PointAndClick":
							echo "Point And Click";
							break;
						case "VisualNovel":
							echo "Visual Novel";
							break;
						case "Racing":
							echo "Racing";
							break;
						case "CarC":
							echo "Car Combat";
							break;
						case "RP":
							echo "Role Playing";
							break;
						case "RL":
							echo "Rogue Like";
							break;
						case "HNS":
							echo "Hack n Slash";
							break;
						case "MM":
							echo "Massive Multiplayer";
							break;
						case "RTS":
							echo "Real Time Strategy";
							break;
						case "RTSS":
							echo "Real Time Shooter";
							break;
						case "RTT":
							echo "Real Time Tactics";
							break;
						case "TTS":
							echo "Turn Based Strategy";
							break;
						case "TTT":
							echo "Turn Based Tactics";
							break;
						case "TD":
							echo "Tower Defense";
							break;
						case "GD":
							echo "Grand Defense";
							break;
						case "4x":
							echo "4x";
							break;
						case "BB":
							echo "Baseball";
							break;
						case "MBA":
							echo "Basketball";
							break;
						case "FB":
							echo "Football";
							break;
						case "Golf":
							echo "Golf";
							break;
						case "Hockey":
							echo "Hockey";
							break;
						case "Soccer":
							echo "Soccer";
							break;
						case "Wrestling":
							echo "Wrestling";
							break;
						case "Alternative":
							echo "Alternative Sport";
							break;
						case "CombatSim":
							echo "Combat Simulation";
							break;
						case "FutureSim":
							echo "Futureistic Simulation";
							break;
						case "RealSim":
							echo "Realistic Simulation";
							break;
						case "Cinematic":
							echo "Cinematic";
							break;
						case "Educate":
							echo "Educational";
							break;
						case "Family":
							echo "Family";
							break;
						case "Party":
							echo "Party";
							break;
						case "Rhythm":
							echo "Rhythm";
							break;
						case "VL":
							echo "Virtual Life";
							break;
						case "PC":
							echo "Puzzle Compilation";
							break;
						default:
							echo "NULL";
							break;
					}
					?>
					</td>
				<tr>
					<td>Theme</td>
					<td>
					<?php
					switch ($theme)
					{
						case "Abstract":
							echo "Abstract";
							break;
						case "Anime":
							echo "Anime";
							break;
						case "Antiquity":
							echo "Antiquity";
							break;
						case "Comedy":
							echo "Comedy";
							break;
						case "Comic":
							echo "Comic";
							break;
						case "Educational":
							echo "Educational";
							break;
						case "Fantasy":
							echo "Fantasy";
							break;
						case "Fighter":
							echo "Fighter";
							break;
						case "History":
							echo "History";
							break;
						case "Horror":
							echo "Horror";
							break;
						case "Mafia":
							echo "Mafia";
							break;
						case "Medieval":
							echo "Medieval";
							break;
						case "Movie":
							echo "Movie";
							break;
						case "Nature":
							echo "Nature";
							break;
						case "Noire":
							echo "Noire";
							break;
						case "Realism":
							echo "Realism";
							break;
						case "SC":
							echo "Sci-Fi";
							break;
						case "Sport":
							echo "Sport";
							break;
						case "War":
							echo "War";
							break;
						case "Western":
							echo "Western";
							break;
						default:
							echo "NULL";
							break;
					}
					?>
					</td>
				<tr>
					<td>Type</td>
					<td>
					<?php
					switch($type)
					{
						case "SP":
							echo "Single Player";
							break;
						case "MP":
							echo "Multiplayer";
							break;
						case "CO":
							echo "Co-Operation";
							break;
						case "SP&MP":
							echo "Single & Multiplayer";
							break;
						case "SP&CO":
							echo "Single & Co-Operation";
							break;
						case "MP&CO":
							echo "Multiplayer & Co-Operation";
							break;
						case "SP&MP&CO":
							echo "Single & Multiplayer & Co-Operation";
							break;
						default:
						echo "NULL";
						break;
					}
					?>
					</td>
				<tr>
					<td>Developer
					<td><a href="DeveloperPage.php?dev=<?php echo $devid; ?>"target="_blank"title="GHomePage" style="color: white"><b><?php echo $row['Dev_Group_Name'] ?></b></a>
				<tr>
					<td>Official Page
					<td><a href="<?php echo $row['Game_homepage'] ?>"target="_blank"title="GHomePage" style="color: white"><b><?php echo $row['Game_homepage'] ?></b></a>
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
					<td>Your Rating
					<td><?php
					if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
							{
								$gameid = $_GET['gameid'];
								$user_check = $_SESSION['login_user'];   
								$result2 = mysqli_query($conn, "select * from user where User_usrname LIKE '$user_check' ");
								$third = mysqli_fetch_assoc($result2);
								$adcheck = $third['Dev_admin'];
								$did = $third['Dev_grouptag'];
					$takeratingtwo = mysqli_fetch_assoc(mysqli_query($conn,"select * from tbl_rating where user_id='$user_check' AND Game_Register_ID='$gameid'"));
					$getrate=$takeratingtwo['rate'];
					if($takeratingtwo!=NULL)
					{
					echo $getrate;
					}
					else
					{
					echo "You Havent Rate Yet";
					}
					?>
				<tr>
				<?php
					$_SESSION['gameid']=$gameid;
					$takeratings = mysqli_fetch_assoc(mysqli_query($conn,"select AVG(rate) AS value_sum from tbl_rating where Game_Register_ID = '$gameid'"));
					$sum = 0;
					if($takeratings!=NULL)
					{
					$sum = $takeratings['value_sum'];				
					}
					?>
					<td>Average Rating
					<td>
					<span><?php 
					if($sum!=0)
					{
					echo "$sum / 5.0"; 
					}
					else
					{
						echo "No Rating Yet";
					}
					}
					?></span>
				<tr>
					<td>Rate Here
					<td><div class="rating">
					<script>
                        $(document).ready(function () {
                            $("#demo1 .stars").click(function () {
                           
                                $.post('rating.php',{rate:$(this).val()},function(d){
                                    if(d>0)
                                    {
                                        alert('Thanks For Rating, You Must Refresh the page to view the Rating');
                                    }else{
                                        alert('Thanks For Rating, You Must Refresh the page to view the Rating');
                                    }
                                });
                                $(this).attr("checked");
                            });
                        });
                    </script>
                    <fieldset id='demo1' class="rating">
                        <input class="stars" type="radio" id="star5" name="rating" value="5" />
                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4" name="rating" value="4" />
                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3" name="rating" value="3" />
                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2" name="rating" value="2" />
                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1" name="rating" value="1" />
                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    </fieldset>
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
				<li><a href="gamepage.php?gameid=<?php echo $gameid; ?>">Summary</a></li> 
				<li><a href="gamepage1.php?gameid=<?php echo $gameid; ?>">Requirement</a></li> 
				<?php
				$secondsql = "select * from developer_group where Dev_Group_Name = '$Developer'";
								$second = mysqli_fetch_assoc(mysqli_query($conn,$secondsql));
								$Devid = $second['Dev_ID'];
				if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
							{
								$gameid = $_GET['gameid'];
								$user_check = $_SESSION['login_user'];   
								$result2 = mysqli_query($conn, "select * from user where User_usrname LIKE '$user_check' ");
								$third = mysqli_fetch_assoc($result2);
								$adcheck = $third['Dev_admin'];
								$did = $third['Dev_grouptag'];
				if($adcheck == '1' && $did == $Devid)
				{
					?>
						<li id="current"><a href="gamepage2.php?gameid=<?php echo $gameid; ?>">Edit Game</a></li> 
					<?php
				}
				}
				?>
				
			</ul>
			</div><!--Nav bar-->
			<div id="SummaryDescrip"><!--Edit Profile form -->
			<form name="personal" role="form" method = "POST" action=""><!--form start-->
		<div>
            <label>Game Name :</label>
            <div>
              <input type="text" name="GameName" size="25" value="<?php echo $first["Game_name"]; ?>">
			  <br>
            </div>
          </div>
		  
		  <div>
			  <label>Game Sequel :</label>
			  <div>
				<input type="text" name="Sequel" size="25" value="<?php echo $first['Game_prequel']; ?>">
				<br>
			  </div>
		  </div>
		  
			<div>
				<label>Expansion :</label>
				<div>
					<input type="text" name="Expansion" size="25" value = "<?php echo $first["Expansion"]; ?>">
				</div>
			</div>
			
			<div>
				<label>Style :</label>
				<div>
					<select name="GStyle" width="250" style="width: 250px">
					<option value="Null">
					<optgroup label="Action">
					<option value="FPS"<?php if($first["Game_style"] =="FPS") echo 'selected ="selected"';?>>First Person Shooter
					<option value="TPS"<?php if($first["Game_style"] =="TPS") echo 'selected ="selected"';?>>Third Person Shooter
					<option value="TTS"<?php if($first["Game_style"] =="TTS") echo 'selected ="selected"';?>>Tatical Shooter
					<option value="Fighting"<?php if($first["Game_style"] =="Fighting") echo 'selected ="selected"';?>>Fighting
					<option value="Arcade"<?php if($first["Game_style"] =="Arcade") echo 'selected ="selected"';?>>Arcade
					<option value="Stealth"<?php if($first["Game_style"] =="Stealth") echo 'selected ="selected"';?>>Stealth
					<optgroup label="Adventure">
					<option value="Adventure"<?php if($first["Game_style"] =="Adventure") echo 'selected ="selected"';?>>Adventure
					<option value="Platformer"<?php if($first["Game_style"] =="Platformer") echo 'selected ="selected"';?>>Platformer
					<option value="PointAndClick"<?php if($first["Game_style"] =="PointAndClick") echo 'selected ="selected"';?>>Point and Click
					<option value="VisualNovel"<?php if($first["Game_style"] =="VisualNovel") echo 'selected ="selected"';?>>Visual Novel
					<optgroup label="Driving"<?php if($first["Game_style"] =="Driving") echo 'selected ="selected"';?>>
					<option value="Racing"<?php if($first["Game_style"] =="Racing") echo 'selected ="selected"';?>>Racing
					<option value="CarC"<?php if($first["Game_style"] =="CarC") echo 'selected ="selected"';?>>Car Combat
					<optgroup label="RPG">
					<option value="RP"<?php if($first["Game_style"] =="RP") echo 'selected ="selected"';?>>Role Playing
					<option value="RL"<?php if($first["Game_style"] =="RL") echo 'selected ="selected"';?>>Rogue Like
					<option value="HNS"<?php if($first["Game_style"] =="HNS") echo 'selected ="selected"';?>>Hack 'n' Slash
					<optgroup label="MMO">
					<option value="MM"<?php if($first["Game_style"] =="MM") echo 'selected ="selected"';?>>Massive Multiplayer
					<optgroup label="Strategy">
					<option value="RTS"<?php if($first["Game_style"] =="RTS") echo 'selected ="selected"';?>>Real Time Strategy
					<option value="RTSS"<?php if($first["Game_style"] =="RTSS") echo 'selected ="selected"';?>>Real Time Shooter
					<option value="RTT"<?php if($first["Game_style"] =="RRT") echo 'selected ="selected"';?>>Real Time Tactics
					<option value="TTS"<?php if($first["Game_style"] =="TTS") echo 'selected ="selected"';?>>Turn Based Strategy
					<option value="TTT"<?php if($first["Game_style"] =="TTT") echo 'selected ="selected"';?>>Turn Based Tactics
					<option value="TD"<?php if($first["Game_style"] =="TD") echo 'selected ="selected"';?>>Tower Defense
					<option value="GD"<?php if($first["Game_style"] =="GD") echo 'selected ="selected"';?>>Grand Defense
					<option value="4x"<?php if($first["Game_style"] =="4x") echo 'selected ="selected"';?>>4x
					<optgroup label="Sport">
					<option value="BB"<?php if($first["Game_style"] =="BB") echo 'selected ="selected"';?>>Baseball
					<option value="MBA"<?php if($first["Game_style"] =="MBA") echo 'selected ="selected"';?>>Basketball
					<option value="FB"<?php if($first["Game_style"] =="FB") echo 'selected ="selected"';?>>Football
					<option value="Golf"<?php if($first["Game_style"] =="Golf") echo 'selected ="selected"';?>>Golf
					<option value="Hockey"<?php if($first["Game_style"] =="Hockey") echo 'selected ="selected"';?>>Hockey
					<option value="Soccer"<?php if($first["Game_style"] =="Soccer") echo 'selected ="selected"';?>>Soccer
					<option value="Wrestling"<?php if($first["Game_style"] =="Wrestling") echo 'selected ="selected"';?>>Wrestling
					<option value="Alternative"<?php if($first["Game_style"] =="Alternative") echo 'selected ="selected"';?>>Alternative Sport
					<optgroup label="Simulation">
					<option value="CombatSim"<?php if($first["Game_style"] =="CombatSim") echo 'selected ="selected"';?>>Combat Sim
					<option value="FutureSim"<?php if($first["Game_style"] =="FutureSim") echo 'selected ="selected"';?>>Futuristic Sim
					<option value="RealSim"<?php if($first["Game_style"] =="RealSim") echo 'selected ="selected"';?>>Realistic Sim
					<optgroup label="Puzzle">
					<option value="Cinematic"<?php if($first["Game_style"] =="Cinematic") echo 'selected ="selected"';?>>Cinematic
					<option value="Educate"<?php if($first["Game_style"] =="Educate") echo 'selected ="selected"';?>>Educational
					<option value="Family"<?php if($first["Game_style"] =="Family") echo 'selected ="selected"';?>>Family
					<option value="Party"<?php if($first["Game_style"] =="Party") echo 'selected ="selected"';?>>Party
					<option value="Rhythm"<?php if($first["Game_style"] =="Rhythm") echo 'selected ="selected"';?>>Rhythm
					<option value="VL"<?php if($first["Game_style"] =="VL") echo 'selected ="selected"';?>>Virtual Life
					<option value="PC"<?php if($first["Game_style"] =="PC") echo 'selected ="selected"';?>>Puzzle Compilation
					</select>
				</div>
			</div>
			
			<div>
				<label>Game Theme :</label>
				<div>
					<select name="GTheme" width="250" style="width: 250px">
					<option value="Null">
					<option value="Abstract"<?php if($first["Game_theme"] =="Abstract") echo 'selected ="selected"';?>>Abstract
					<option value="Anime"<?php if($first["Game_theme"] =="Anime") echo 'selected ="selected"';?>>Anime
					<option value="Antiquity"<?php if($first["Game_theme"] =="Antiquity") echo 'selected ="selected"';?>>Antiquity
					<option value="Comedy"<?php if($first["Game_theme"] =="Comedy") echo 'selected ="selected"';?>>Comedy
					<option value="Comic"<?php if($first["Game_theme"] =="Comic") echo 'selected ="selected"';?>>Comic
					<option value="Educate"<?php if($first["Game_theme"] =="Educate") echo 'selected ="selected"';?>>Educational
					<option value="Fantasy"<?php if($first["Game_theme"] =="Fantasy") echo 'selected ="selected"';?>>Fantasy
					<option value="Fighter"<?php if($first["Game_theme"] =="Fighter") echo 'selected ="selected"';?>>Fighter
					<option value="History"<?php if($first["Game_theme"] =="History") echo 'selected ="selected"';?>>History
					<option value="Horror"<?php if($first["Game_theme"] =="Horror") echo 'selected ="selected"';?>>Horror
					<option value="Mafia"<?php if($first["Game_theme"] =="Mafia") echo 'selected ="selected"';?>>Mafia
					<option value="Medieval"<?php if($first["Game_theme"] =="Medieval") echo 'selected ="selected"';?>>Medieval
					<option value="Movie"<?php if($first["Game_theme"] =="Movie") echo 'selected ="selected"';?>>Movie
					<option value="Nature"<?php if($first["Game_theme"] =="Nature") echo 'selected ="selected"';?>>Nature
					<option value="Noire"<?php if($first["Game_theme"] =="Noire") echo 'selected ="selected"';?>>Noire
					<option value="Realism"<?php if($first["Game_theme"] =="Realism") echo 'selected ="selected"';?>>Realism
					<option value="SC"<?php if($first["Game_theme"] =="SC") echo 'selected ="selected"';?>>Sci-Fi
					<option value="Sport"<?php if($first["Game_theme"] =="Sport") echo 'selected ="selected"';?>>Sport
					<option value="War"<?php if($first["Game_theme"] =="War") echo 'selected ="selected"';?>>War
					<option value="Western"<?php if($first["Game_theme"] =="Western") echo 'selected ="selected"';?>>Western
					</select>
				</div>
			</div>
			
			<div>
				<label>Game Type :</label>
				<div>
					<select name="GType" width="250" style="width: 250px">
					<option value="Null">
					<option value="SP"<?php if($first["Game_type"] =="SP") echo 'selected ="selected"';?>>Single Player
					<option value="MP"<?php if($first["Game_type"] =="MP") echo 'selected ="selected"';?>>Multiplayer
					<option value="CO"<?php if($first["Game_type"] =="CO") echo 'selected ="selected"';?>>Co-op
					<option value="SP&MP"<?php if($first["Game_type"] =="SP&MP") echo 'selected ="selected"';?>>Single & Multiplayer
					<option value="SP&CO"<?php if($first["Game_type"] =="SP&CO") echo 'selected ="selected"';?>>Single & Co-op
					<option value="MP&CO"<?php if($first["Game_type"] =="MP&CO") echo 'selected ="selected"';?>>Multiplayer & Co-op
					<option value="SP&MP&CO"<?php if($first["Game_type"] =="SP&MP&CO") echo 'selected ="selected"';?>>Single & Multiplayer & Co-op
					</select>
				</div>
			</div>
			
			<div>
				<label>Release Date :</label>
				<div>
					<input type="date" name="REDate" value="<?php echo $first['Release_date'];?>">
				</div>
			</div>
			
			<div>
				<label>Homepage :</label>
				<div>
					<input type="text" name="Homepage" size="50" value = "<?php echo $first["Game_homepage"]; ?>">
				</div>
			</div>

				<label>Article and Media</label>
				<div>
					<br><input type="checkbox" name="article" value="Articles"<?php if($first["Articles"]=='1') echo "checked='checked'";?>/>Articles 
					<br><input type="checkbox" name="media" value="Media"<?php if($first["Media"]=='1') echo "checked='checked'";?>/>Media 
				</div>
				
				<div>
				
				<label>Game Price :</label>
				<div>
					<input type="text" name="GPrice" size="50" value = "<?php echo $first["Game_price"]; ?>">
				</div>
				</div>
				
				<div>
				
				<label>Summary :</label>
				<div>
					<textarea name="Summary" cols="80" rows="5" maxlength="1000"><?php echo $first["Summary"]; ?></textarea>
				</div>
				</div>
				
				<div>
				
				<label>System Requirement :</label>
				<div>
					<textarea name="require" cols="80" rows="5" maxlength="1000"><?php echo $first["Requirement"]; ?></textarea>
				</div>
				</div>
				
				<div>
				
				<label>Game Icon Link :</label>
				<div>
					<input type="text" name="Gicon" size="50" value = "<?php echo $first["Game_icon"]; ?>">
				</div>
				</div>
				
				<div>
				
				<label>Game Background Image Link :</label>
				<div>
					<input type="text" name="Gback" size="50" value = "<?php echo $first["Game_image"]; ?>">
				</div>
				</div>
				
				<div>
				
				<label>Game Boxshot Image Link :</label>
				<div>
					<input type="text" name="Gbox" size="50" value = "<?php echo $first["Game_boxshot"]; ?>">
				</div>
				</div>
				
				<div>
				<br>
				<label>Game Video Link :</label>
				<div>
					<br>Upload Video to Our Google Drive: https://drive.google.com/open?id=0BxuV0GR0D1xGdGFGTnltaVQ0MUk
					<br>Ater Upload, click get link and copy only the id , eg: https://drive.google.com/open?id=0BxuV0GR0D1xGUEZTQ3JZYXF6eGM is 0BxuV0GR0D1xGUEZTQ3JZYXF6eGM
					<br>Paste it into the textbox after id= for the video to work
					<br>Do add https://drive.google.com/uc?export=download&id= before the id if this line doesn't show in the text box below
					<br><input type="text" name="Gvid" size="50" value = "<?php echo $first["Vid_link"]; ?>">
				</div>
				</div>
			
			<br>
              <input class="form-control" type="submit" name="submit1" value="Save Changes"/>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
          </form>
		  <br>
		  <form name="personal" role="form" method = "POST" action=""><!--form for upload image start-->
			<input type="text" name="imgbot" size="50">
			<br>
			<input type="submit" name="submit2" value="Save Changes"/>
		  </form><br>
		  <?php $x=0; ?>
		  <table border="2">
		  <tr>
			<th>Image link</th>
			<th>Delete Image</th>
		  </tr>
		  <?php
			$foursql = "select * from picture where Game_Register_ID = '$gameid'";
			$four = mysqli_query($conn,$foursql);
			while($five = mysqli_fetch_assoc($four))
			{
				echo "<tr>";
				$linke = $five['Link'];
				$idd = $five['Pic_ID'];
				?>
				<td><a href="<?php echo $linke; ?>" target="_blank">Link <?php echo ($x+1); ?></a></td>
				<td><a href="javascript:delete_id(<?php echo $idd;?>)">Delete</a></td>
				<?php
				echo "</tr>";
				$x++;
			}
		  ?>
		  </table>
		  </div><!-- close div contain form-->
		  <?php
			if(isset($_POST['submit1']))
			{
				
				$gname = $_POST['GameName'];
				$sequel = $_POST['Sequel'];
				$expansion = $_POST['Expansion'];
				$style = $_POST['GStyle'];
				$theme = $_POST['GTheme'];
				$gtype = $_POST['GType'];
				$date = $_POST['REDate'];
				$Homepage = $_POST['Homepage'];
				$summary = "<pre>";
				$summary .= $_POST['Summary'];
				$summary .= "</pre>";
				$requires = "<pre>";
				$requires .= $_POST['require'];
				$requires .= "</pre>";
				if(isset($_POST["article"]))
				{$Articles = "1";}
				else
				{$Articles = "0";}
				if(isset($_POST["media"]))
				{$Media = "1";}
				else
				{$Media = "0";}
				$gprice = $_POST['GPrice'];
				$gicon = $_POST['Gicon'];
				$gback = $_POST['Gback'];
				$gbox = $_POST['Gbox'];
				$vid = $_POST['Gvid'];
				
				mysqli_query($conn,"update game set Game_name ='$gname', Game_prequel='$sequel',Expansion='$expansion',Game_style='$style',Game_theme='$theme'
				,Game_type='$gtype',Release_date='$date',Game_homepage='$Homepage',Articles='$Articles',Media='$Media',Game_price='$gprice',Summary='$summary'
				,Requirement='$requires',Game_image='$gback',Game_icon='$gicon', Game_boxshot='$gbox',Vid_link='$vid' where Game_Register_ID = '$gid'");
				echo("<script>location.href='$locate'</script>");
			}
			if(isset($_POST['submit2']))
			{
				$imgbot = $_POST['imgbot'];
				mysqli_query($conn,"insert into picture (Game_Register_ID,Link) values ('$gameid','$imgbot')");
				echo("<script>location.href='$locate'</script>");
			}
		  ?>
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
				<?php 
					$sixsql = "select * from picture where Game_Register_ID = $gameid";
					$sixq = mysqli_query($conn,$sixsql);
				?>
				<div class="wrapper">
				<div class="scrolls">
				<div class="imageDiv">
				<?php
				if($first['Vid_link']!=NULL)
				{
					?>
					<video id="my-video" class="video-stream" width="320" height="150" controls><source src="<?php echo $first['Vid_link'];?>" type="video/mp4"></video>
					<?php
				}
				?>
				<?php
					while($six = mysqli_fetch_assoc($sixq))
					{
						?>
						<img class="fancybox" src="<?php echo $six['Link'];?>"/>
						<?php
					}
				?>
			</div><!--Image Division for scrolling-->
			</div><!--Scroll division-->
			</div><!--Wrapper division-->
		</body>
		</html>
		
			</div><!--img Division for margin-->
			<div id="CommentSec">
			<h1>Comments</h1>
			<div style="border:1px solid black;width:580px;height:200px;overflow:scroll;">
			<?php
			$name = $row['Game_name'];
			$cmt = mysqli_query($conn, "select * from comment where Game_name='$name'");
			while($getcmt = mysqli_fetch_assoc($cmt))
			{	$result = $getcmt['Comment_text'];
				//$name = $_SESSION['login_user'];
				if($result!=NULL){
				?>
				<br>
				<p style="color:#FA1C5F;"><b><u><?php echo $getcmt['User_ursname'];?></u></b></p>
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
			</div>
			
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