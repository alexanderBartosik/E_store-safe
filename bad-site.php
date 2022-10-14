<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
<div class="text-center">
<img src="Estore_logo.png" class="rounded" alt="...">
    </div>
        <!-- Safe version -->
        <form action="http://localhost/e_store-safe/e-store/login.php" method="POST">
        <!-- Unsafe version -->
        <!-- <form action="http://localhost/e-store/login.php" method="POST">  -->
        <input type="submit" value="Attack"/>
        </form>
    </div>
</body>
</html>