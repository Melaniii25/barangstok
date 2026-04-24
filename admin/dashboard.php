<?php
$total_admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_admin"));
$total_barang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_barang"));
$masuk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_brgmasuk"));
$keluar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_brgkeluar"));
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row g-4">
        <!-- TOTAL ADMIN -->
        <div class="col-md-3">
            <div class="card h-100 shadow border-0 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total User</h6>
                        <h3 class="fw-bold"><?= $total_admin['total']; ?></h3>
                    </div>
                    <div class="bg-dark bg-opacity-10 p-3 rounded-circle">
                        <i class="fas fa-users fa-lg text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- TOTAL BARANG -->
        <div class="col-md-3">
            <div class="card h-100 shadow border-0 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total Barang</h6>
                        <h3 class="fw-bold"><?= $total_barang['total']; ?></h3>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                        <i class="fas fa-box fa-lg text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- BARANG MASUK -->
        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Barang Masuk</h6>
                        <h3 class="fw-bold text-success"><?= $masuk['total']; ?></h3>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                        <i class="fas fa-arrow-down fa-lg text-success"></i>
                    </div>
                </div>
                <div class="card-footer text-end bg-transparent border-0">
                    <a href="?page=barang_masuk" class="btn btn-sm btn-success">Detail</a>
                </div>
            </div>
        </div>

        <!-- BARANG KELUAR -->
        <div class="col-md-3">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Barang Keluar</h6>
                        <h3 class="fw-bold text-danger"><?= $keluar['total']; ?></h3>
                    </div>
                    <div class="bg-danger bg-opacity-10 p-3 rounded-circle">
                        <i class="fas fa-arrow-up fa-lg text-danger"></i>
                    </div>
                </div>
                <div class="card-footer text-end bg-transparent border-0">
                    <a href="?page=barang_keluar" class="btn btn-sm btn-danger">Detail</a>
                </div>
            </div>
        </div>

    </div>
    <!-- STOK MENIPIS -->
    <div class="card mt-4 shadow border-0 rounded-4">
        <div class="card-header fw-bold text-danger">
            STOCK MINIPIS
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                </tr>
                <?php
                $no = 1;
                $stock = mysqli_query($conn, "SELECT * FROM tb_barang WHERE stock <= 10");
                while($row = mysqli_fetch_assoc($stock)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td class="text-danger fw-bold"><?= $row['stock']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</div>