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
    <title>Product Page</title>
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
        $id = $_GET['id'];
        $query = mysqli_query($link,"select * from product where id='$id'") or die(mysql_error());;
        # If there is no data then there will be a statement
        if(mysqli_num_rows($query) == 0) {
           echo '<tr style="background-color: #ff4d4d"><td colspan="8"><center>No Data in Database!</center></td></tr>';
           }
           else{
             while($data = mysqli_fetch_array($query)){
        ?>
<!-- 
               <td>
                  <a href="update.php?id=<?php echo $data['id']; ?>">EDIT</a>&nbsp;&nbsp;
                  <a href="delete.php?id=<?php echo $data['id']; ?>" onclick="return checkDelete()">DELETE</a>
               </td> -->
               <div class="col d-flex justify-content-center">
                <div class="card" style="width:400px">
                    <img class="card-img-top" src=product-pictures/<?php echo $data['imgSource']; ?> alt="Card image">
                    <div class="card-body">
                    <h4><b><?php echo $data['name']; ?></b></h4>
                    <h5><b><?php echo $data['brand']; ?></b></h5>
                    <h6><b><?php echo $data['price']; ?>kr</b></h6>
                        <a href="#" class="btn btn-primary">Add to basket</a>
                    </div>
                </div>
                </div>
        <?php
            }
            }
        ?>
    </div>



    

</body>
</html>

 

