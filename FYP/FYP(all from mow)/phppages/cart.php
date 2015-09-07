<?php
require 'item.php';
require 'conn.php';
?>
<?php
if(isset($_GET['Game_Register_ID'])){
	$result = mysqli_query($conn, 'select * from game where Game_Register_ID='.$_GET['Game_Register_ID']);
	$game = mysqli_fetch_object($result);
	$item = new Item();
	$item->id = $game->Game_Register_ID;
	$item->name = $game->Game_name;
	$item->price = $game->Game_price;
	$item->quantity = 1;
	$item->total;
	// Check product is existing in cart
	$index = -1;
	
	$cart = unserialize(serialize($_SESSION['cart']));
	for($i=0; $i<count($cart); $i++)
			if($cart[$i]->id==$_GET['Game_Register_ID'])
			{ 
				$index = $i;
				break;
			}
	$item->no=$i;
	$query ="Insert into cart(Order_ID, Game_name, Game_price, Quantity, code) values ('1', '$item->name', '$item->price', '$item->quantity', '$item->no') ";
	
	mysqli_query($conn,$query);
	
	
	if($index==-1)
		$_SESSION['cart'][] = $item;
	else{
		$cart['index']->quantity++;
		$_SESSION['cart'] = $cart;
		}

}

// Delete product in cart
if(isset($_GET['index'])){
	$no=$_GET['no'];
	$cart = unserialize(serialize($_SESSION['cart']));
	$dete ="Delete from cart where Order_ID='1' AND code='$no'";
	mysqli_query($conn,$dete);
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
	
}





?>


	

	
	
	