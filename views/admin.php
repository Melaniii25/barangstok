<?php require '../config/koneksi.php'; ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Data User</h1>

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
            <h5>Daftar User</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah
            </button>
        </div>

        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php while ($a = mysqli_fetch_assoc($data_admin)) { ?>
                    <tr>
                        <td><?= $a['id_admin'] ?></td>
                        <td><?= $a['nama_admin'] ?></td>
                        <td><?= $a['username'] ?></td>
                        <td><?= $a['role'] ?></td>
                        <td>
                            <button class="btn btn-danger btn-sm"
                                onclick="hapus('<?= $a['id_admin'] ?>')">
                             <i class="fas fa-trash"></i> Hapus 
                            </button>
                            <form id="hapus<?= $a['id_admin'] ?>"
                                  method="post"
                                  action="../controllers/admin_controller.php">
                                <input type="hidden" name="id_admin" value="<?= $a['id_admin'] ?>">
                                <input type="hidden" name="hapus">
                            </form>
                        </td>
                    </tr>
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

            <form method="post" action="../controllers/admin_controller.php">
                <div class="modal-header">
                    <h5>Tambah User</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label class="mt-2">Nama </label>
                    <input type="text" name="nama_admin"  class="form-control" required>
                    <label class="mt-2">Username</label>
                    <input type="text" name="username"  class="form-control mt-2" required>
                    <label class="mt-2">Password</label>
                    <input type="text" name="password" class="form-control mt-2" required>
                    <label class="mt-2">Role</label>
                    <select name="role" class="form-control mt-2">
                        <option value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="gudang">Gudang</option>
                        <option value="pimpinan">Pimpinan</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" name="tambah_admin">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- SWEET ALERT CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- KONFIRMASI HAPUS -->
<script>
function hapus(id){
    Swal.fire({
        title: "Yakin?",
        text: "User akan dihapus!",
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