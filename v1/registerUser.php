<?php
 include("../connection.php");

    $db = new dbObj();
    $connection = $db->getConnString();
    $request_method=$_SERVER["REQUEST_METHOD"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST["email"];
    $namaLengkap = $_POST["namalengkap"];
    $alamat = $_POST["alamat"];
    $status = $_POST["status"];
    $query="SELECT * FROM tb_user where Username = '$username'";
    $queryResult = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($queryResult);
    
    
        if ($result != 0){
            echo "
                <script>
                    alert('Registration failed :Multipel instance of this username');
                    location.href = '../registration.php';
                </script>
            ";
        }
        else{
            $query="INSERT INTO tb_user VALUE('', '$username', '$password', '$email','$namaLengkap','$alamat','$status')";
            if(mysqli_query($connection, $query)) {
                $query="SELECT * FROM tb_user where Username = '$username'";
                $queryResult = mysqli_query($connection, $query);
                $result = mysqli_fetch_assoc($queryResult);
                session_start();
                if ($_SESSION["Status"] == "Admin") {
                    echo"
                    <script>
                        alert('registration success');
                        location.href = '../index.php';
                    </script>
                    ";
                }
                else{
               
                $_SESSION['Username'] = $username;
                $_SESSION['Status'] = $status;
                $_SESSION['UserID'] = $result['UserID'];
                echo"
                    <script>
                        alert('registration success');
                        location.href = '../index.php';
                    </script>
                ";
                }
            }
            else {
                echo"
                <script>
                    alert('registration faileds');
                    location.href = '../registration.php';
                </script>
            ";
            }
        }
        
    

    
    
    