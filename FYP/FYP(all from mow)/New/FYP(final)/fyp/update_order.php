<?php
$total=$_GET['total'];
$date = date('Y-m-d H:i:s');
$query ="INSERT into orders (Order_ID, Order_date, total_price) values ('1', '$date', '$total')";
mysqli_query($conn, $query);
?>