<?php
require '../middleware/auth.php';
require '../config/koneksi.php';
require '../controllers/laporan_masuk_controller.php';
require '../controllers/laporan_keluar_controller.php';

// cek role
if ($_SESSION['role'] != 'pimpinan') {
    header("Location: ../auth/login.php");
    exit;
}

$page = $_GET['page'] ?? 'dashboard';
?>

<?php include '../views/layouts/header.php'; ?>
<?php include '../views/layouts/sidebar.php'; ?>

<div class="container-fluid px-4">

<?php
switch ($page) {

    case 'dashboard':
        include '../pimpinan/dashboard.php';
        break;

  case 'laporan_masuk':
    $data_masuk = getLaporanMasuk(
        $conn,
        $_GET['tgl_awal'] ?? null,
        $_GET['tgl_akhir'] ?? null
    );
    include '../views/laporan/laporan_masuk.php';
    break;

    # 📤 LAPORAN BARANG KELUAR
    case 'laporan_keluar':
        $data_keluar = getLaporanKeluar(
            $conn,
            $_GET['tgl_awal'] ?? null,
            $_GET['tgl_akhir'] ?? null
        );
        include '../views/laporan/laporan_keluar.php';
        break;

    default:
        echo "Halaman tidak ditemukan";
}
?>

</div>
</main>

<?php include '../views/layouts/footer.php'; ?>