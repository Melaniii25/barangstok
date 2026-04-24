<?php
$masuk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_brgmasuk"));
$keluar = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_brgkeluar"));
?>

<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4 fw-bold text-primary">Dashboard Pimpinan</h2>

    <div class="row g-4">

        <!-- CARD BARANG MASUK -->
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    
                    <div>
                        <h6 class="text-muted">Laporan Barang Masuk</h6>
                        <h2 class="fw-bold text-success"><?= $masuk['total']; ?></h2>
                    </div>

                    <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                        <i class="fas fa-arrow-down fa-2x text-success"></i>
                    </div>

                </div>

                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="?page=laporan_masuk" class="btn btn-sm btn-success rounded-pill px-3">
                        Lihat Detail →
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD BARANG KELUAR -->
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    
                    <div>
                        <h6 class="text-muted">Laporan Barang Keluar</h6>
                        <h2 class="fw-bold text-danger"><?= $keluar['total']; ?></h2>
                    </div>

                    <div class="bg-danger bg-opacity-10 p-3 rounded-circle">
                        <i class="fas fa-arrow-up fa-2x text-danger"></i>
                    </div>

                </div>

                <div class="card-footer bg-transparent border-0 text-end">
                    <a href="?page=laporan_keluar" class="btn btn-sm btn-danger rounded-pill px-3">
                        Lihat Detail →
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>