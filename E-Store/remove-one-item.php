<?php
// connect to database
require_once "config.php";
// get order_id from url
$order_id = $_GET['order_id'];
// remove data from database
mysqli_query($link,"delete from orders where order_id='$order_id'");
// redirect page to shopping-cart.php
header("location:shopping-cart.php");
?>