<?php
    include("../connection.php");
    session_start();
    $db = new dbObj();
    $conn = $db->getConnString();
    $bukuid = intval($_POST["bukuid"]);
    $borrowdDate = $_POST["date"];
    $days = intval($_POST["days"]);
    $howmanyDays = strtotime("+". $days . " Days");
    $userid = intval($_SESSION["UserID"]);
    $returnDate =date('Y-m-d', $howmanyDays);
    $sql ="INSERT INTO tb_peminjaman VALUE('', '$userid', '$bukuid', '$borrowdDate','$returnDate', 'Dipinjam')";

    if (mysqli_query($conn, $sql)) {
        $sql = "INSERT INTO tb_koleksipribadi VALUE('', '$userid', '$bukuid')";
        if(mysqli_query($conn, $sql)){
            echo"
            <script>
                alert('pinjaman success');
                location.href = '../index.php';
            </script>
            ";
        }
        else{
            echo"
            <script>
                alert('pinjaman failed');
                location.href = '../book.php';
            </script>
            ";
        }

        
    }
    else{
        echo"
        <script>
            alert('pinjaman failed');
            location.href = '../book.php';
        </script>
        ";
    }