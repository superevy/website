
<?php
 
 include("../connection.php");
 
    $db = new dbObj();
    $conn= $db->getConnString();
    $request_method=$_SERVER["REQUEST_METHOD"];
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    $kategori= intval($_POST["katagori"]);
    global $conn;
        $sql ="INSERT INTO tb_buku VALUE('', '$judul', '$penulis', '$penerbit','$tahun')";
        if(mysqli_query($conn, $sql)) {
            $sql = "SELECT BukuID FROM tb_buku WHERE Judul = '$judul'";
            $result = mysqli_query($conn, $sql);
            $id = mysqli_fetch_assoc($result);
                    
            $sql = "INSERT INTO tb_kategoribuku_relasi VALUE('', '$id[BukuID]','$kategori')";
                 if(mysqli_query($conn, $sql)){
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
            }
        else {
            echo"
                <script>
                    alert('registration faileds');
                    location.href = '../index.php';
                </script>
            ";
        }
    