<?php
 include("../connection.php");

    $db = new dbObj();
    $connection = $db->getConnString();
    $request_method=$_SERVER["REQUEST_METHOD"];
    
   
        global $connection;
        $judul = $_POST["judul"];
        $penulis = $_POST["penulis"];
        $penerbit = $_POST["penerbit"];
        $tahun = $_POST["tahun"];
        $katagori = intval($_POST["katagori"]);
        $id = intval($_POST["id"]);
        $sql ="UPDATE tb_buku
               SET Judul = '$judul', Penulis = '$penulis', Penerbit = '$penerbit', TahunTerbit ='$tahun'
               WHERE BukuID ='$id';";
        if(mysqli_query($connection, $sql)) {
            $sql = "UPDATE tb_kategoribuku_relasi
                    SET KatergoriID = '$katagori'
                    WHERE BukuID ='$id'";
                 if(mysqli_query($connection, $sql)){
                    echo"
                    <script>
                    alert('registration success');
                    location.href = '../index.php';
                    </script>"
                    ;
                 }
                 else{
                
                echo"
                <script>
                    alert('registration failed');
                    location.href = '../index.php';
                </script>
                ";
                 }
            echo"

                <script>
                    alert('registration success');
                    location.href = '../index.php';
                </script>
                ";
        }
        else {
            echo"
                <script>
                    alert('registration faileds');
                    location.href = '../index.php';
                </script>
            ";
        }

        

    
    
    