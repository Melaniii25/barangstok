<?php
session_start();
require '../config/koneksi.php';

if (isset($_POST['tambah_supplier'])) {
    $kd = mysqli_real_escape_string($conn, $_POST['kd_supplier']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama_supplier']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($conn, $_POST['no_telepon']);
    
    $query = "INSERT INTO tb_supplier 
        (kd_supplier, nama_supplier, alamat, no_telepon)
        VALUES ('$kd','$nama','$alamat','$telepon')";

    if(mysqli_query($conn, $query)){
        $_SESSION['message'] = "Data berhasil ditambahkan";
    } else {
        $_SESSION['message'] = "Gagal: " . mysqli_error($conn);
    }
    header("Location: ../admin/index.php?page=supplier");
    exit;
}


if (isset($_POST['update_supplier'])) {
    $kd = $_POST['kd_supplier'];
    $nama = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['no_telepon'];
    $query = "UPDATE tb_supplier SET 
        nama_supplier='$nama',
        alamat='$alamat',
        no_telepon='$telepon'
        WHERE kd_supplier='$kd'";

    if(mysqli_query($conn, $query)){
        $_SESSION['message'] = "Data berhasil diubah";
    } else {
        $_SESSION['message'] = "Gagal: " . mysqli_error($conn);
    }
    header("Location: ../admin/index.php?page=supplier");
    exit;
}


if (isset($_POST['hapus'])) {
    $kd = $_POST['kd_supplier'];
    $query = "DELETE FROM tb_supplier WHERE kd_supplier='$kd'";
    if(mysqli_query($conn, $query)){
        $_SESSION['message'] = "Data berhasil dihapus";
    } else {
        $_SESSION['message'] = "Gagal: " . mysqli_error($conn);
    }
    header("Location: ../admin/index.php?page=supplier");
    exit;
}