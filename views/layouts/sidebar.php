<?php
 $role = $_SESSION['role']; ?>

<div id="layoutSidenav">
<div id="layoutSidenav_nav">
<nav class="sb-sidenav accordion sb-sidenav-dark">
<div class="sb-sidenav-menu">
<div class="nav">
<!-- DASHBOARD -->
<a class="nav-link" href="index.php">
    <i class="fas fa-home me-2"></i> Dashboard
</a>
<!-- ADMIN -->
<?php if ($role == 'admin') { ?>
    <a class="nav-link" href="index.php?page=admin">
        <i class="fas fa-user-cog me-2"></i> Admin
    </a>
    <a class="nav-link" href="index.php?page=barang">
        <i class="fas fa-box me-2"></i> Data Barang
    </a>
    <a class="nav-link" href="index.php?page=supplier">
        <i class="fas fa-truck me-2"></i> Supplier
    </a>
<?php } ?>
<!-- ADMIN + GUDANG -->
<?php if ($role == 'admin' || $role == 'gudang') { ?>
    <a class="nav-link" href="index.php?page=barang_masuk">
        <i class="fas fa-arrow-down me-2 text-success"></i> Barang Masuk
    </a>

    <a class="nav-link" href="index.php?page=barang_keluar">
        <i class="fas fa-arrow-up me-2 text-danger"></i> Barang Keluar
    </a>
<?php } ?>

<!-- ADMIN + PIMPINAN -->
<?php if ($role == 'admin' || $role == 'pimpinan') { ?>
    <a class="nav-link d-flex justify-content-between collapsed" href="#" data-bs-toggle="collapse" 
        data-bs-target="#collapseLaporan " aria-expanded="false">
        <span>
 <i class="fas fa-file-alt me-2"></i> Laporan
        </span>
        <i class="fas fa-angle-down"></i>
    </a>
    <div class="collapse" id="collapseLaporan">
        <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="index.php?page=laporan_masuk">
                <i class="fas fa-arrow-down me-2 text-success"></i> Barang Masuk
            </a>
            <a class="nav-link" href="index.php?page=laporan_keluar">
                <i class="fas fa-arrow-up me-2 text-danger"></i> Barang Keluar
            </a>
        </nav>
    </div>
<?php } ?>

</div>
</div>

<div class="sb-sidenav-footer">
    <div class="small">Login sebagai:</div>
    <?= ucfirst($role); ?>
</div>

</nav>
</div>

<div id="layoutSidenav_content">