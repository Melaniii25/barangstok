<?php
require '../config/koneksi.php';
require_once '../config/helper.php';


if (isset($_POST['tambah_barang'])) {
    $kd = $_POST['kd_barang'];
    $nama = $_POST['nama_barang'];
    $jenis = $_POST['jenis'];
    $stock = $_POST['stock'];
    $harga = $_POST['harga'];

    mysqli_query($conn,"INSERT INTO tb_barang 
        VALUES ('$kd','$nama','$jenis','$stock','$harga')");

    header("Location: ../admin/index.php?page=barang");
    exit;
}


if (isset($_POST['update_barang'])) {
    $kd = $_POST['kd_barang'];
    $nama = $_POST['nama_barang'];
    $jenis = $_POST['jenis'];
    $stock = $_POST['stock'];

    mysqli_query($conn,"UPDATE tb_barang SET 
        nama_barang='$nama',
        jenis='$jenis',
        stock='$stock'
        WHERE kd_barang='$kd'");

    header("Location: ../admin/index.php?page=barang");
    exit;
}

if (isset($_POST['hapus'])) {
    $kd = $_POST['kd_barang'];
    mysqli_query($conn,"DELETE FROM tb_barang WHERE kd_barang='$kd'");
    header("Location: ../admin/index.php?page=barang");
    exit;
}


$data_barang = mysqli_query($conn,"SELECT * FROM tb_barang");


require '../views/barang.php';