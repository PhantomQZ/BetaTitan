<?php

$db_username        = 'root'; //MySql database username
$db_password        = ''; //MySql dataabse password
$db_name            = 'game_store'; //MySql database name
$db_host            = 'localhost'; //MySql hostname or IP

$currency			= 'RM '; //currency symbol
$shipping_cost		= 1.50; //shipping cost
$taxes				= array( //List your Taxes percent here.
							'VAT' => 0, 
							'Service Tax' => 0,
							'Other Tax' => 0
							);

$conn = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
if ($conn->connect_error) {//Output any connection error
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>