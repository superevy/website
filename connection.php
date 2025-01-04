<?php
    class dbObj{
        var $servername = "localhost";
        var $username = "root";
        var $password = "";
        var $database = "db_perpustakaan";
        var $conn;

        function getConnString(){
            $con = mysqli_connect($this->servername, $this->username, $this->password, $this->database) or
            die ("connection failed : " . mysqli_connect_error());
            if (mysqli_connect_errno()){
                printf("connection faild : " . mysqli_connect_error());
            } else {
                $this->conn = $con;
            }
            return $this->conn;
        }
    }
?>