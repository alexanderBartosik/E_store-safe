<?php
// Initialize the session
session_start();
// connect to database
require_once "config.php";
//get buyers id from session id
$buyers_id = $_SESSION["id"];
$same_order_id = 0;

// add the orders to the finished orders
$query = mysqli_query($link,"select * from orders INNER JOIN product on orders.product_id=product.id where orders.buyers_id='$buyers_id'") or die(mysql_error());
//select the latest number in the counter
$query2 = mysqli_query($link,"select * from same_order_counter ORDER BY same_order_counter DESC LIMIT 1") or die(mysql_error());
$data2 = mysqli_fetch_array($query2);

if(mysqli_num_rows($query) == 0) {
   echo '<tr style="background-color: #ff4d4d"><td colspan="8"><center>No items yet in your shopping cart</center></td></tr>';
   }
   else{
    $sql3 = "INSERT INTO same_order_counter() VALUES ()";
    mysqli_query($link, $sql3);
     while($data = mysqli_fetch_array($query)){
      $product_id =  $data['product_id'];
      $order_id =  $data['order_id'];
      //add same_order_id for all the products that needs to be in the same finished order
      $same_order_id = $data2['same_order_counter'];
      
      $sql = "INSERT INTO finished_orders (same_order_id, buyers_id, product_id) VALUES ($same_order_id, $buyers_id, $product_id)";
      $sql2 = "delete from orders where order_id='$order_id'";

      mysqli_query($link, $sql);
      mysqli_query($link, $sql2);

        //  if (mysqli_query($link, $sql) &&   mysqli_query($link, $sql2)) {
        //     echo "Product added to Shopping cart";
        //   } else {
        //     echo "Error: " . $sql . "<br>" . mysqli_error($link);
        //   }
        
     }
    }

// redirect page to shopping-cart.php
if ($same_order_id!= 0){
    header("location:receipt.php?same_order_id=$same_order_id");
}
else{
    header("location:shopping-cart.php");
}

?>