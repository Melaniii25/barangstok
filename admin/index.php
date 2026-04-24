<?php
require '../config/koneksi.php';
require '../middleware/auth.php';
require '../controllers/laporan_masuk_controller.php';
require '../controllers/laporan_keluar_controller.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$page = $_GET['page'] ?? 'dashboard';
?>

<?php include '../views/layouts/header.php'; ?>
<?php include '../views/layouts/sidebar.php'; ?>

<div class="content">

<?php
switch ($page) {
    case 'dashboard' :
        include 'dashboard.php';
        break;

    case 'admin':
        $data_admin = mysqli_query($conn, "SELECT * FROM tb_admin");
        include '../views/admin.php';
        break;

    case 'barang':
         $data_barang = mysqli_query($conn, "SELECT * FROM tb_barang");
        include '../views/barang.php';
        break;

    case 'supplier':
        $data_supplier = mysqli_query($conn, "SELECT * FROM tb_supplier");
        include '../views/supplier.php';
        break;

    case 'barang_masuk':
        $data_masuk = mysqli_query($conn, "SELECT * FROM tb_brgmasuk");
        include '../views/barang_masuk.php';
        break;

    case 'barang_keluar':
        $data_keluar = mysqli_query($conn, "SELECT * FROM tb_brgkeluar");      
        include '../views/barang_keluar.php';
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

<?php include '../views/layouts/footer.php'; ?>