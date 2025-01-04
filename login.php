<?php
session_start();
$_SESSION['Status'] = "pengguna";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Document</title>
</head>
<body>
    <div class="form-container">
        <h3 class="form-judul">Login</h3>
        <form action="v1/log.php" method="POST">
            <div class="input-container">
                <label for="username" class="input-label">Username</label>
                <input type="text" name="username" class="input">
            </div>
            <div class="input-container">
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" class="input">
            </div>
            <input type="submit" value="Login" class="button">
    </form>
    <p class="register">Tidak punya akun ?<a href="registration.php">Register</a></p>
    </div>
    
</body>
</html>