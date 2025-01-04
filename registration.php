<?php
    session_start();
    $userStatus = $_SESSION['Status'];

    switch ($userStatus) {
        case 'Admin':
           $hidden = "";
            break;
        
        default:
           $hidden = "hidden";
            break;
    }
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
        <h3 class="form-judul">Register</h3>
        <form action="v1/registerUser.php" method="POST">
            <div class="input-container">
                <label for="username" class="input-label">Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-container">
                <label for="password" class="input-label">Password :</label>
                <input type="password" name="password" class="input">
            </div>
            <div class="input-container">
                <label for="email" class="input-label">Email :</label>
                <input type="email" name="email" class="input">
            </div>
            <div class="input-container">
                <label for="namalengkal" class="input-label">Nama Lengkap</label>
                <input type="text" name="namalengkap" class="input">
            </div>
            <div class="input-container">
                <label for="alamat" class="input-label">Alamat :</label>
                <input type="text" name="alamat" class="input">
            </div>
            <div class="input-container">
                <label for="status" class="input-label" <?php echo $hidden ?>>Status :</label >
                <select name="status" class="input" <?php echo $hidden ?>>
                    <option value="Petugas">Petugas</option>
                    <option value="Admin">Admin</option>
                    <option value="Peminjam" selected="selected">Peminjam</option>
                </select>
            </div>
            <input type="submit" value="Submit" class="button">
        </form>
    </div>
</body>
</html>