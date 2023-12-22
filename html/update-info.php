<?php
require 'koneksi.php';

if(isset($_POST["submit"])){
    $fullname = $_POST["dt1"];
    $dob = $_POST["dt4"];
    $email = $_POST["dt2"];
    $last_education = $_POST["dt6"];
    $address = $_POST["dt5"];
    $phone_number= $_POST["dt3"];

    // Periksa apakah email sudah digunakan
    $duplicate = mysqli_query($conn, "SELECT * FROM user_student WHERE email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert ('Email sudah digunakan') </script>";
    } else {
        // Lakukan proses update data
        $query = "UPDATE user_student SET fullname='$fullname', dob='$dob', last_education='$last_education', address='$address', phone_number='$phone_number' WHERE email='$email'";
        if(mysqli_query($conn, $query)){
            echo "<script> alert ('Update berhasil') </script>";
        } else {
            echo "<script> alert ('Update gagal') </script>";
        }
    }
}
?>
