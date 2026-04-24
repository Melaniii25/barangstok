<?php
require '../config/koneksi.php';

function getLaporanMasuk($conn, $tgl_awal = null, $tgl_akhir = null)
{
    $where = "";
    if ($tgl_awal && $tgl_akhir) {
        $where = "WHERE bm.tgl_masuk BETWEEN '$tgl_awal' AND '$tgl_akhir'";
    }
    $query = "
        SELECT bm.*, b.kd_barang, b.nama_barang, s.nama_supplier
        FROM tb_brgmasuk bm
        JOIN tb_barang b ON bm.kd_barang = b.kd_barang
        JOIN tb_supplier s ON bm.kd_supplier = s.kd_supplier
        $where
    ";

    return mysqli_query($conn, $query);
}

// ambil dari GET
$tgl_awal = $_GET['tgl_awal'] ?? null;
$tgl_akhir = $_GET['tgl_akhir'] ?? null;

// panggil function
$data_masuk = getLaporanMasuk($conn, $tgl_awal, $tgl_akhir);