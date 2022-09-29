<?php
// Initialize the session
session_start();
// connect to database
require_once "config.php";
//get buyers id from session id
$buyers_id = $_SESSION["id"];
// remove data from database
mysqli_query($link,"delete from orders where buyers_id ='$buyers_id'");
// redirect page to shopping-cart.php
header("location:shopping-cart.php");
?>