<?php require '../config/koneksi.php'; ?>

<!-- SWEET ALERT CDN (cukup 1x di atas) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container-fluid px-4">
    <h1 class="mt-4">Data Barang</h1>

    <!-- SWEET ALERT NOTIF -->
    <?php if (isset($_SESSION['message'])): ?>
    <script>
    Swal.fire({
        title: "Sukses!",
        text: "<?= htmlspecialchars($_SESSION['message']); ?>",
        icon: "success",
        timer: 2000,
        showConfirmButton: false
    });
    </script>
    <?php unset($_SESSION['message']); endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Barang</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Barang
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Stock</th>
                            <th>Harga</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($b = mysqli_fetch_assoc($data_barang)) { 
                        $id = htmlspecialchars($b['kd_barang']);
                    ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= htmlspecialchars($b['nama_barang']) ?></td>
                        <td><?= htmlspecialchars($b['jenis']) ?></td>
                        <td><?= $b['stock'] ?></td>
                        <td>Rp <?= number_format($b['harga'],0,',','.') ?></td>
                        <td>
                            <!-- EDIT -->
                            <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#edit<?= $id ?>">
                              <i class="fas fa-pen"></i> Edit 
                            </button>
                            <!-- HAPUS -->
                            <button class="btn btn-danger btn-sm"
                                onclick="hapus('<?= $id ?>')">
                                <i class="fas fa-trash"></i> Hapus 
                            </button>
                            <form id="hapus<?= $id ?>"
                                method="post"
                                action="../controllers/barang_controller.php">
                                <input type="hidden" name="kd_barang" value="<?= $id ?>">
                                <input type="hidden" name="hapus">
                            </form>
                        </td>
                    </tr>
                    <!-- MODAL EDIT -->
                    <div class="modal fade" id="edit<?= $id ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="../controllers/barang_controller.php">
                                    <div class="modal-header">
                                        <h5>Edit Barang</h5>
                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="kd_barang" value="<?= $id ?>">
                                        <label>Nama</label>
                                        <input name="nama_barang" class="form-control mb-2"
                                            value="<?= htmlspecialchars($b['nama_barang']) ?>" required>
                                        <label>Jenis</label>
                                        <input name="jenis" class="form-control mb-2"
                                            value="<?= htmlspecialchars($b['jenis']) ?>" required>
                                        <label>Harga</label>
                                        <input name="harga" type="number" class="form-control mb-2"
                                            value="<?= $b['harga'] ?>" required>
                                        <label>Stock</label>
                                        <input name="stock" type="number" class="form-control mb-2"
                                            value="<?= $b['stock'] ?>" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button name="update_barang" class="btn btn-warning">Simpan</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" action="../controllers/barang_controller.php">
                <div class="modal-header">
                    <h5>Tambah Barang</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Kode</label>
                    <input name="kd_barang" class="form-control mb-2" required>
                    <label>Nama</label>
                    <input name="nama_barang" class="form-control mb-2"  required>
                    <label>Jenis</label>    
                    <input name="jenis" class="form-control mb-2"  required>
                    <label>Stock</label>
                    <input name="stock" type="number" class="form-control mb-2" required>
                    <label>Harga</label>
                    <input name="harga" type="number" class="form-control mb-2"  required>
                </div>
                <div class="modal-footer">
                    <button name="tambah_barang" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- KONFIRMASI HAPUS -->
<script>
function hapus(id){
    Swal.fire({
        title: "Yakin?",
        text: "Barang akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("hapus"+id).submit();
        }
    });
}
</script>