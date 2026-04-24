<?php require '../config/koneksi.php'; ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Laporan Barang Masuk</h1>
    <!-- FILTER -->
    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <input type="date" id="tgl_awal" name="tgl_awal"
                        class="form-control"
                        value="<?= $_GET['tgl_awal'] ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <input type="date" id="tgl_akhir" name="tgl_akhir"
                        class="form-control"
                        value="<?= $_GET['tgl_akhir'] ?? '' ?>">
                </div>
                 <input type="hidden" name="page" value="laporan_masuk">
                <div class="col-md-3">
                    <button class="btn btn-success w-100">
                        Filter
                    </button>
                </div>

                <div class="col-md-3">
                    <button type="button" class="btn btn-primary w-100" onclick="printLaporan()">
                        Cetak
                    </button>
                </div>

            </form>

        </div>
    </div>

    <!-- TABLE -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle" id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Kode Barang</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php while ($d = mysqli_fetch_assoc($data_masuk)) { ?>
                        <tr>
                            <td><?= $d['id_barangmasuk']; ?></td>
                            <td><?= $d['kd_barang']; ?></td>
                            <td><?= $d['nama_supplier']; ?></td>
                            <td><?= $d['nama_barang']; ?></td>
                            <td>Rp<?= number_format($d['harga'],0,',','.'); ?></td>
                            <td><?= $d['jumlahmasuk']; ?></td>
                            <td><?= date('d-m-Y', strtotime($d['tgl_masuk'])); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function printLaporan() {
    const tglAwal = document.getElementById("tgl_awal").value;
    const tglAkhir = document.getElementById("tgl_akhir").value;

    const style = `
        <style>
            body { font-family: sans-serif; font-size: 13px; margin: 40px; }
            .header { text-align: center; }
            .header h2 { margin: 0; }
            .header hr { border: 1px solid #000; margin: 10px 0; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { border: 1px solid #000; padding: 8px; text-align: center; }
            th { background: #f0f0f0; }
            .signature {
                width: 100%;
                margin-top: 50px;
                text-align: right;
            }
        </style>
    `;
    const header = `
        <div class="header">
        <h2>LAPORAN BARANG MASUK</h2>
            <h2> SISTEM PERSEDIAAN ALAT TULIS KANTOR </h2>
            <p>Jl. Raya Industri No.123, Surakarta, Jawa Tengah 57123</p>
            <p>Telp: (0271) 1234567 | Email: Sipatka@gmail.com </p>
            <p>Periode: ${tglAwal || '-'} s/d ${tglAkhir || '-'}</p>
            <hr>
        </div>
    `;
    const signature = `
        <div class="signature">
            <div>
                <p>Penanggung Jawab,</p>
                <br><br><br>
                <p><strong>ADMIN</strong></p>
            </div>
        </div>
    `;

    const table = document.getElementById("datatablesSimple").outerHTML;
    const win = window.open('', '', 'width=900,height=600');
    win.document.write(style + header + table + signature);
    win.document.close();
    win.print();
}
</script>