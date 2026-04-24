<?php
$total_barang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_barang"));
$masuk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_brgmasuk"));
$keluar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_brgkeluar"));
?>

<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4 fw-bold text-primary">Dashboard Gudang</h2>
    <div class="row g-4">
        <!-- TOTAL BARANG -->
        <div class="col-md-4">
            <div class="card  h-100 shadow border-0 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Total Barang</h6>
                        <h2 class="fw-bold"><?= $total_barang['total']; ?></h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                        <i class="fas fa-box fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- BARANG MASUK -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Barang Masuk</h6>
                        <h2 class="fw-bold text-success"><?= $masuk['total']; ?></h2>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                        <i class="fas fa-arrow-down fa-2x text-success"></i>
                    </div>
                </div>

                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="?page=barang_masuk" class="btn btn-sm btn-success rounded-pill">
                        Input →
                    </a>
                </div>
            </div>
        </div>

        <!-- BARANG KELUAR -->
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Barang Keluar</h6>
                        <h2 class="fw-bold text-danger"><?= $keluar['total']; ?></h2>
                    </div>
                    <div class="bg-danger bg-opacity-10 p-3 rounded-circle">
                        <i class="fas fa-arrow-up fa-2x text-danger"></i>
                    </div>
                </div>

                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="?page=barang_keluar" class="btn btn-sm btn-danger rounded-pill">
                        Input →
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- TABEL BARANG TERBARU -->
    <div class="card mt-4 shadow border-0 rounded-4">
        <div class="card-header fw-bold">
            Barang Terbaru
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $data_barang = mysqli_query($conn, "SELECT * FROM tb_barang ORDER BY kd_barang DESC LIMIT 5");
                    while($row = mysqli_fetch_assoc($data_barang)) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= $row['stock']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>