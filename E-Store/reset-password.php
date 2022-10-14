<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
require_once "csrf.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!isset($_POST["token"]) || !isset($_SESSION["token"])) { 
        header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
        exit(); 
    }
    
    if ($_POST["token"] == $_SESSION["token"]) {
 
    $blacklist = array("123Password!", "Password123!", "Pass1234!", "1234Pass!");
    $uppercase = preg_match('@[A-Z]@', $_POST["new_password"]);
    $lowercase = preg_match('@[a-z]@', $_POST["new_password"]);
    $number    = preg_match('@[0-9]@', $_POST["new_password"]);
    $specialChars = preg_match('@[^\w]@', $_POST["new_password"]);
    $siteName = array("estore", "e_store", "e-store", "Estore", "E_store", "E-store");
    $username_pw = preg_match('@'.$_SESSION["username"].'@', $_POST["new_password"]);

    // Validate password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter a password.";     
    } elseif (strlen(trim($_POST["new_password"])) < 8) {
        $new_password_err = "Password must have atleast 8 characters.";
    } elseif (in_array($_POST["new_password"], $blacklist)) {
        $new_password_err = "Password is too weak";
    } elseif (!$uppercase || !$lowercase || !$number || !$specialChars) {
        $new_password_err = "Password must contain at least upper case letter, one lower case letter, one number and one special character.";
    } elseif($username_pw) {
        $new_password_err = "Your password can't contain your username.";
    }
    else {
        foreach($siteName as $pw) {
            if (preg_match('@'.$pw.'@', $_POST["new_password"])) {
                $new_password_err = "Password cannot include site name.";
            }
        }
    }
    
    $new_password = trim($_POST["new_password"]);
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <input type="hidden" name="token" value="<?=$_SESSION["token"]?>"/>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>" <?php echo csrf_input_tag();?> >
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>