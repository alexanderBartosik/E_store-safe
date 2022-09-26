<style> <?php include 'style.css'; ?> </style>
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
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<?php require_once "navbar.php"; ?>


<main class="main-area">
        
        <div class="centered">

            <section class="cards">
        <?php
        require_once "config.php";
        $no = 1;
        #Query database to display data
        #change query and adapt
        $query = mysqli_query($link,"select * from product") or die(mysql_error());;
        # If there is no data then there will be a statement
        if(mysqli_num_rows($query) == 0) {
           echo '<tr style="background-color: #ff4d4d"><td colspan="8"><center>No Data in Database!</center></td></tr>';
           }
           else{
             while($data = mysqli_fetch_array($query)){
        ?>

               <article class="card">
                    <a href="product-page.php?id=<?php echo $data['id']; ?>">
                      <div class="card-content">
                        <picture class="thumbnail">
                          <img src=product-pictures/<?php echo $data['imgSource']; ?> alt="Avatar" style="width:100%">
                        </picture>
                            <h4><b><?php echo $data['name']; ?></b></h4>
                            <h5><b><?php echo $data['brand']; ?></b></h5>
                            <h6><b><?php echo $data['price']; ?>kr</b></h6>
                    </a>
                </article>
        <?php
            }
            }
        ?>
    </div>



    

</body>
</html>

 

