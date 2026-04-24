<?php
require '../middleware/auth.php';
require '../config/koneksi.php';
// cek role
if ($_SESSION['role'] != 'gudang') {
    header("Location: ../auth/login.php");
    exit;
}
$page = $_GET['page'] ?? 'dashboard';
?>

<?php include '../views/layouts/header.php'; ?>
<?php include '../views/layouts/sidebar.php'; ?>

<div class="container-fluid">

<?php
switch ($page) {

    case 'dashboard':
        include '../gudang/dashboard.php';
        break;

    case 'barang_masuk':
        $data_masuk = mysqli_query($conn, "SELECT * FROM tb_brgmasuk");
        include '../views/barang_masuk.php';
        break;

    case 'barang_keluar':
        $data_keluar = mysqli_query($conn, "SELECT * FROM tb_brgkeluar");
        include '../views/barang_keluar.php';
        break;

    default:
        echo "Halaman tidak ditemukan";
}
?>

</div>

<?php include '../views/layouts/footer.php'; ?>