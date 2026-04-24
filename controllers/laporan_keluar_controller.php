<?php
require '../config/koneksi.php';

function getLaporanKeluar($conn, $tgl_awal = null, $tgl_akhir = null)
{
    $query = "SELECT * FROM tb_brgkeluar";

    if (!empty($tgl_awal) && !empty($tgl_akhir)) {
        $query .= " WHERE tgl_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir'";
    }

    $query .= " ORDER BY tgl_keluar DESC";

    return mysqli_query($conn, $query);
}