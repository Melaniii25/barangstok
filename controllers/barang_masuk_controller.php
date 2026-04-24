<?php
require '../config/koneksi.php';

if (isset($_POST['tambah_masuk'])) {
    $id = $_POST['id_barangmasuk'];
    $kd = $_POST['kd_barang'];
    $supplier = $_POST['kd_supplier'];
    $nama = $_POST['nama_barang'];
    $tgl = $_POST['tgl_masuk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlahmasuk']; 
    // ambil data barang
    $barang = mysqli_fetch_assoc(mysqli_query($conn,
        "SELECT stock,harga FROM tb_barang WHERE kd_barang='$kd'"));
    if (!$barang) {
        die("Barang tidak ditemukan");
    }

    $stock_baru = $barang['stock'] + $jumlah;
    $total = $jumlah * $harga;

    // INSERT (pakai nama kolom!)
    $query = "INSERT INTO tb_brgmasuk 
    (id_barangmasuk, kd_barang, kd_supplier, nama_barang, harga, jumlahmasuk, total, tgl_masuk)
    VALUES ('$id','$kd','$supplier','$nama','$harga','$jumlah','$total','$tgl')";

    if(!mysqli_query($conn, $query)){
        die("Error: " . mysqli_error($conn));
    }
    // update stock
    mysqli_query($conn,"UPDATE tb_barang SET stock='$stock_baru' WHERE kd_barang='$kd'");

    header("Location: ../admin/index.php?page=barang_masuk");
    exit;
}

if (isset($_POST['konfirmasihapus'])) {
    $id = $_POST['id_barangmasuk'];
    $query = "DELETE FROM tb_brgmasuk WHERE id_barangmasuk='$id'";
    if(mysqli_query($conn, $query)){
        $_SESSION['message'] = "Data berhasil dihapus";
    } else {
        $_SESSION['message'] = "Gagal: " . mysqli_error($conn);
    }

    header("Location: ../admin/index.php?page=barang_masuk");
    exit;
}