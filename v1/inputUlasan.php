
<?php
        session_start();
        include("../connection.php");
        $db = new dbObj();
        $conn = $db->getConnString();
        $bukuid = $_POST["bukuid"];
        $userid = $_SESSION["UserID"];
        $ulasan = $_POST["ulasan"];
        $rating = $_POST["bintang"];

        $sql = "INSERT INTO tb_ulasanbuku VALUE('', '$userid', '$bukuid', '$ulasan', '$rating')";

        if (mysqli_query($conn, $sql)) {
            echo "
                <script>
                    location.href = '../book.php?id=$bukuid?>';
                </script>";
        }
        else{
            echo "
            <script>
                alert('Ulasan Gagal Dimasukan');
                location.href = '../book.php';
            </script>";
        }


?>