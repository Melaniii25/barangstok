<?php require '../config/koneksi.php'; ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Data Barang Keluar</h1>
    <!-- ALERT -->
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

    <!-- CARD -->
    <div class="card shadow">
        <!-- HEADER -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Barang Keluar</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah
            </button>
        </div>
        <!-- TABLE -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th>Tanggal</th>
                            <th>ID</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $data = mysqli_query($conn, "SELECT * FROM tb_brgkeluar ORDER BY tgl_keluar DESC");
                        while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?= date('d-m-Y', strtotime($d['tgl_keluar'])); ?></td>
                            <td><?= $d['id_barangkeluar']; ?></td>
                            <td><?= $d['kd_barang']; ?></td>
                            <td><?= $d['nama_barang']; ?></td>
                            <td>Rp<?= number_format($d['harga'],0,',','.'); ?></td>
                            <td><?= $d['jumlahkeluar']; ?></td>
                            <td>Rp<?= number_format($d['total'],0,',','.'); ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                    onclick="hapus('<?= $d['id_barangkeluar']; ?>')">
                                   <i class="fas fa-trash"></i> Hapus 
                                </button>
                                <form id="hapus-form<?= $d['id_barangkeluar']; ?>" method="post" action="../controllers/barang_keluar_controller.php">
                                    <input type="hidden" name="id_barangkeluar" value="<?= $d['id_barangkeluar']; ?>">
                                    <input type="hidden" name="hapusbarangkeluar">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang Keluar</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post"  action="../controllers/barang_keluar_controller.php">
                <div class="modal-body">
                    <label>Tanggal Keluar</label>
                    <input type="date" name="tgl_keluar" class="form-control" required>
                    <label class="mt-2">ID Barang Keluar</label>
                    <input type="text" name="id_barangkeluar" class="form-control" required>
                    <label class="mt-2">Kode Barang</label>
                    <select name="kd_barang" id="kd_barang" class="form-control" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php
                        $barang = mysqli_query($conn, "SELECT kd_barang, nama_barang, harga FROM tb_barang");
                        while ($b = mysqli_fetch_assoc($barang)) {
                        ?>
                            <option value="<?= $b['kd_barang']; ?>"
                                data-nama="<?= $b['nama_barang']; ?>"
                                data-harga="<?= $b['harga']; ?>">
                                <?= $b['kd_barang']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <label class="mt-2">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" class="form-control" readonly>
                    <label class="mt-2">Harga</label>
                    <input type="number" id="harga" name="harga" class="form-control" readonly>
                    <label class="mt-2">Jumlah Keluar</label>
                    <input type="number" id="jumlahkeluar" name="jumlahkeluar" class="form-control" oninput="calculateTotal()" required>
                    <label class="mt-2">Total</label>
                    <input type="number" id="total" name="total" class="form-control" readonly>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" name="keluargudang">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS -->
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
            document.getElementById("hapus-form"+id).submit();
        }
    });
}
</script>
<script>
document.getElementById("kd_barang").addEventListener("change", function () {
    let nama = this.options[this.selectedIndex].getAttribute("data-nama");
    let harga = this.options[this.selectedIndex].getAttribute("data-harga");

    document.getElementById("nama_barang").value = nama ?? "";
    document.getElementById("harga").value = harga ?? 0;
});

function calculateTotal() {
    let harga = document.getElementById("harga").value || 0;
    let jumlah = document.getElementById("jumlahkeluar").value || 0;

    document.getElementById("total").value = harga * jumlah;
}
</script>