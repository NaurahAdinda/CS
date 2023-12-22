<?php
require 'koneksi.php';

$id_achievement = isset($_GET['id_achievement']) ? (int)$_GET['id_achievement'] : 0;
function select($query)
{
    require 'koneksi.php';
    if ($result = mysqli_query($conn, $query)) {
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
    return null;
}

$achievement = select("SELECT * FROM user_achevement WHERE id_achievement = '$id_achievement'")[0];

function update_barang($data)
{
    require 'koneksi.php';
    $id_achievement = $data['id_achievement'];
    $event_name = $data['event_name'];
    $time = $data['time'];
    $place = $data['place'];
    $organizer = $data['organizer'];
    $certificate = $data['certificate'];

    $query = "UPDATE user_achevement SET event_name = '$event_name', date = '$time', place = '$place', organizer='$organizer', certificate ='$certificate'WHERE id_achievement='$id_achievement'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

if (isset($_POST['submit'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>alert('Data berhasil diubah'); window.location.href = 'user_profile.php';</script>" ;
    } else {
        echo "<script>alert('Gagal mengubah data, silahkan coba lagi')</script>";
    }
}
?>