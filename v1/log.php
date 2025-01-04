<?php
 include("../connection.php");

    $db = new dbObj();
    $connection = $db->getConnString();
    $request_method=$_SERVER["REQUEST_METHOD"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query="SELECT * FROM tb_user where Username = '$username'";
    $queryResult = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($queryResult);
    
    
        if ($result != 0){

            if (password_verify($password, $result['Password'])) {
                echo "Login successful!";
                // Start session and store username
                session_start();
                $_SESSION['Username'] = $username;
                $_SESSION['Status'] = $result['Status'];
                $_SESSION['UserID'] = $result['UserID'];
                echo $status;
                header("Location: ../index.php"); // Redirect to dashboard or home page
            } else
             {
                echo "
                <script>
                    alert('Wrong Password or Username');
                    location.href = '../login.php';
                </script>
            ";
            }
           
        }
        else{
            echo "
                <script>
                    alert('FAILED');
                    location.href = '../login.php';
                </script>
            ";
        }
    

   
       
