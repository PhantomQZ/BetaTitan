<?php
session_start(); //start session
include("conn.php"); //include config file
$result = mysqli_query($conn, "select * from game where Game_Register_ID='1'");
$row = mysqli_fetch_assoc($result);
$lastno = mysqli_query($conn, "SELECT * FROM cart ORDER BY Order_ID DESC LIMIT 1");
$rows = mysqli_fetch_assoc($lastno);
?>
<?php
	if (isset($_GET['process'])){
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<ul class="view-cart">';
	$lastnum=0;
	
	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_name = $product["Game_name"];
		$product_price = $product["Game_price"];
		$product_code = $product["Game_Register_ID"];
		
		$item_price 	= sprintf("%01.2f",($product_price));  // price x qty = total item price
		
		$cart_box 		.=  "<li> $product_code &ndash;  $product_name <span> $currency. $item_price </span></li>";
		
		$subtotal 		= ($product_price ); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
		if ($rows['Order_ID']!=NULL)
		{
		$lastnum=$rows['Order_ID']+1;
		$query ="Insert into cart(Order_ID, Game_name, Game_price) values ('$lastnum', '$product_name', '$product_price') ";
		mysqli_query($conn,$query);
		}
		else
		{
		$lastnum=1;
		$query ="Insert into cart(Order_ID, Game_name, Game_price) values ('$lastnum', '$product_name', '$product_price') ";
		mysqli_query($conn,$query);	
		}
	}
			 echo "<script language=\"javascript\">alert('An email has been sent to your inbox for payment. Redirecting you to main page.');
					window.location.href='d2.php';
			 </script>";	 
	}
?>