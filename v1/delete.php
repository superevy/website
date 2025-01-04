<?php
    include("../connection.php");
    $db = new dbObj();
    $connection = $db->getConnString();
    $id = $_GET["id"];
    $sql = "DELETE FROM tb_buku WHERE BukuID = '$id'";
    
    if(mysqli_query($connection, $sql)) {
        echo"
            <script>
                alert('Delete success');
                location.href = '../index.php';
            </script>
            ";
    }
    else {
        echo"
            <script>
                alert('faileds');saaaaaaaaaaaadsdsdsdsdsddsdsdsdsddsddsddsdddsddsddsddsddsddsddsddsddsddsdsdsdsdsdsdsds
                location.href = '../index.php';
            </script>
        ";
    }