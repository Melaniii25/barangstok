<?php require '../config/koneksi.php'; ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Data Supplier</h1>
  <!-- SWEET ALERT (NOTIFIKASI) -->
    <?php if (isset($_SESSION['message'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    Swal.fire({
        title: "Sukses!",
        text: "<?= $_SESSION['message']; ?>",
        icon: "success",
        confirmButtonText: "OK"
    });
    </script>
    <?php unset($_SESSION['message']); endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5>Daftar Supplier</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $data = mysqli_query($conn, "SELECT * FROM tb_supplier");
                while($d = mysqli_fetch_array($data)){
                ?>
                    <tr>
                        <td><?= $d['kd_supplier']; ?></td>
                        <td><?= $d['nama_supplier']; ?></td>
                        <td><?= $d['alamat']; ?></td>
                        <td><?= $d['no_telepon']; ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $d['kd_supplier']; ?>">
                              <i class="fas fa-pen"></i> Edit 
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="hapus('<?= $d['kd_supplier']; ?>')">
                                <i class="fas fa-trash"></i> Hapus 
                            </button>
                            <form id="hapus<?= $d['kd_supplier']; ?>" method="post" action="../controllers/supplier_controller.php">
                                <input type="hidden" name="kd_supplier" value="<?= $d['kd_supplier']; ?>">
                                <input type="hidden" name="hapus">
                            </form>
                        </td>
                    </tr>
                    <!-- MODAL EDIT -->
                    <div class="modal fade" id="edit<?= $d['kd_supplier']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="../controllers/supplier_controller.php">
                                    <div class="modal-header">
                                        <h5>Edit Supplier</h5>
                                        <button class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label>Kode Supplier</label>
                                        <input type="text" name="kd_supplier" value="<?= $d['kd_supplier']; ?>" readonly class="form-control">
                                        <label class="mt-2">Nama Supplier</label>
                                        <input type="text" name="nama_supplier" value="<?= $d['nama_supplier']; ?>" class="form-control mt-2">
                                        <label class="mt-2">Alamat</label>
                                        <input type="text" name="alamat" value="<?= $d['alamat']; ?>" class="form-control mt-2">
                                        <label class="mt-2">Telepon</label>
                                        <input type="text" name="no_telepon" value="<?= $d['no_telepon']; ?>" class="form-control mt-2">
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" name="update_supplier">Simpan</button>
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


<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="../controllers/supplier_controller.php">
                <div class="modal-header">
                    <h5>Tambah Supplier</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Kode Supplier</label>
                    <input type="text" name="kd_supplier"  class="form-control">
                    <label class="mt-2">Nama Supplier</label>
                    <input type="text" name="nama_supplier"  class="form-control mt-2">
                    <label class="mt-2">Alamat</label>
                    <input type="text" name="alamat"  class="form-control mt-2">
                    <label class="mt-2">Telepon</label>
                    <input type="text" name="no_telepon"  class="form-control mt-2">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" name="tambah_supplier">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- JS HAPUS -->
 <!-- SWEET ALERT CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- KONFIRMASI HAPUS -->
<script>
function hapus(kd){
    Swal.fire({
        title: "Yakin?",
        text: "User akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("hapus"+kd).submit();
        }
    });
}
</script>
