<?php
session_start(); //start session
include("conn.php"); //include config file
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Titan Gaming</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script>
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
</head>
<body>
<div align="center">
<h3>Ajax Shopping Cart Example</h3>
</div>

<a href="#" class="cart-box" id="cart-info" title="View Cart">
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

<?php
//List products from database
$results = $conn->query("SELECT Game_name, Game_prequel, Game_Register_ID, Game_theme, Game_price FROM game");
//Display fetched records as you please

$game =  '<ul class="products-wrp">';

while($row = $results->fetch_assoc()) {
$game .= <<<EOT
<li>
<form class="form-item">
<h4>{$row["Game_name"]}</h4>
<div><img src="images/{$row["Game_theme"]}"></div>
<div>Price : {$currency} {$row["Game_price"]}<div>
<div class="item-box">
    <div>
	Color :
    <select name="product_color">
    <option value="Red">Red</option>
    <option value="Blue">Blue</option>
    <option value="Orange">Orange</option>
    </select>
	</div>
	
	<div>
    Qty :
    <select name="product_qty">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
	</div>
	
	<div>
    Size :
    <select name="product_size">
	<option value="M">M</option>
    <option value="XL">XL</option>
    <option value="XXL">XLL</option>
    </select>
	</div>
	
    <input name="Game_Register_ID" type="hidden" value="{$row["Game_Register_ID"]}">
    <button type="submit">Add to Cart</button>
</div>
</form>
</li>
EOT;

}
$game .= '</ul></div>';

echo $game;
?>
</body>
</html>