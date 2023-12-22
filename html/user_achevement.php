<?php
function tambah_data(){
    require 'koneksi.php';

    $event_name = $_POST['event_name'];
    $time = $_POST['time'];
    $place = $_POST['place'];
    $organizer = $_POST['organizer'];
    $certificate = $_POST['certificate'];

    $query = "INSERT INTO user_achevement VALUES (null,'$event_name','$time','$place','$organizer','$certificate')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
if(isset($_POST['submit'])){
    if(tambah_data($_POST)>0){
        echo "<script>alert('Data berhasil ditambah'); window.location.href = 'user_profile.php';</script>";
    }else{
        echo "<script>alert('gagal menambahkan data, silahkan coba lagi')</script>";
    }
}
?>