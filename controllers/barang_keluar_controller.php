<?php
require '../config/koneksi.php';

if (isset($_POST['keluargudang'])) {
    $id = $_POST['id_barangkeluar'];
    $kd = $_POST['kd_barang'];
    $nama = $_POST['nama_barang'];
    $tgl = $_POST['tgl_keluar'];
    $jumlah = $_POST['jumlahkeluar'];

    // ambil data barang
    $barang = mysqli_fetch_assoc(mysqli_query($conn,
        "SELECT stock, harga FROM tb_barang WHERE kd_barang='$kd'"));

    if (!$barang) {
        die("Barang tidak ditemukan");
    }

    $stok = $barang['stock'];
    $harga = $barang['harga'];

    if ($jumlah > $stok) {
        die("Stok tidak cukup!");
    }

    $stok_baru = $stok - $jumlah;
    $total = $jumlah * $harga;
    // update stok
    mysqli_query($conn,"UPDATE tb_barang SET stock='$stok_baru' WHERE kd_barang='$kd'");
    // INSERT (pakai kolom!)
    $query = "INSERT INTO tb_brgkeluar 
    (id_barangkeluar, kd_barang, nama_barang, harga, jumlahkeluar, total, tgl_keluar)
    VALUES ('$id','$kd','$nama','$harga','$jumlah','$total','$tgl')";

    if(!mysqli_query($conn, $query)){
        die("Error: " . mysqli_error($conn));
    }

    header("Location: ../admin/index.php?page=barang_keluar");
    exit;
}


/* ================= DELETE ================= */
if (isset($_POST['hapusbarangkeluar'])) {
    $id = $_POST['id_barangkeluar'];
    $data = mysqli_fetch_assoc(mysqli_query($conn,
        "SELECT kd_barang, jumlahkeluar FROM tb_brgkeluar WHERE id_barangkeluar='$id'"));
    if ($data) {
        mysqli_query($conn,"UPDATE tb_barang 
            SET stock = stock + {$data['jumlahkeluar']}
            WHERE kd_barang='{$data['kd_barang']}'");
        mysqli_query($conn,"DELETE FROM tb_brgkeluar WHERE id_barangkeluar='$id'");
        $_SESSION['message'] = "Data berhasil dihapus";
    } else {
        $_SESSION['message'] = "Data tidak ditemukan";
    }

    header("Location: ../admin/index.php?page=barang_keluar");
    exit;
}