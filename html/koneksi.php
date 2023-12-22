<?php
    $servername = "localhost";
    $database = "db_project";
    $username = "root";
    $passwords = '';

    $conn = mysqli_connect($servername,$username,$passwords,$database);

    if(!$conn){
        die("koneksi gagal : ". mysqli_connect_error());
    }
?>