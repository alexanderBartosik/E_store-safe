<style> <?php include 'style-shopping-cart.css'; ?> </style>


<?php


// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>


<body>
<?php require_once "navbar.php"; 
$currentPrice = $nrOfItems = 0;
$buyers_id = $_SESSION["id"];
$home_adress = $_SESSION["home_adress"];
$same_order_id = $_GET['same_order_id'];

?>
<div class="w3-container">
    <div class="CartContainer">
        <div class="Header">
            <h3 class="Heading">Receipt</h3>
        </div>
        <h2 class="Heading">Your items will be shipped to <?php echo $home_adress; ?></h2>
    <?php
        require_once "config.php";
        $query = mysqli_query($link,"select * from finished_orders INNER JOIN product on finished_orders.product_id=product.id where finished_orders.same_order_id='$same_order_id'") or die(mysql_error());
      
        if(mysqli_num_rows($query) == 0) {
           echo '<tr style="background-color: #ff4d4d"><td colspan="8"><center>No items yet in your shopping cart</center></td></tr>';
           }
           else{
             while($data = mysqli_fetch_array($query)){
        ?>
        <div class="Cart-Items">
            <div class="image-box">
                <img src=product-pictures/<?php echo $data['imgSource']; ?> style={{ height="120px" }} />
            </div>
            <div class="about">
            <h4 class="title"><?php echo $data['name']; ?></h4>
                <h3 class="subtitle"><?php echo $data['brand']; ?></h3>
                
            </div>
            <div class="prices">
            <!-- Updating current price -->
                <div class="amount"><?php echo $data['price']; ?> kr</div> 
                <?php
                $currentPrice = $currentPrice + $data['price'];
                $nrOfItems = $nrOfItems + 1; 
                 ?>
                <a class="product-information" href="product-page.php?id=<?php echo $data['id'];?>">Product information </a>
            </div>
        </div>
        <hr> 
    <?php
            }
            }
    ?>

        <hr> 
        <div class="checkout">
        <div class="total">
            <div>
                <div class="Subtotal">Sub-Total</div>
                <?php
                if ($nrOfItems == 1){
                 echo '<div class="items">'.$nrOfItems.' item</div>';
                }
                else {
                 echo '<div class="items">'.$nrOfItems.' items</div>';
                }
    ?>
               
                
            </div>
            <div class="total-amount"> <?php echo $currentPrice ?> kr</div>
        </div>
    </div>
   </div>
</body>
</html>

 
