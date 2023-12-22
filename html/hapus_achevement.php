<?php
    require 'koneksi.php';
    $id_achievement = isset($_GET['id_achievement']) ? (int)$_GET['id_achievement'] : 0;
    function hapus_barang($id_achievement){
        require 'koneksi.php';

        $query = "DELETE FROM user_achevement WHERE id_achievement = '$id_achievement'";

        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }
    if (hapus_barang($id_achievement) > 0) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href = 'user_profile.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data, silahkan coba lagi')</script>";
    }
?>