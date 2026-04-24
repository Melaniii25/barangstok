<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register SIPATKA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
</head>

<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <div class="text-center mb-3">
                    <img src="../assets/img/logo.png" class="img-fluid mb-3" width="100" alt="Logo SIPATKA">
                    <h4 class="fw-bold mb-1">Registrasi User</h4>
                    <p class="text-muted mb-2">Buat akun baru untuk mengakses sistem</p>
                </div>
                <form action="proses_registrasi.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold mb-1">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold mb-1">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold mb-1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold mb-1">Role</label>
                        <select name="role" class="form-select" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="gudang">Gudang</option>
                            <option value="pimpinan">Pimpinan</option>
                        </select>
                    </div>
                    <div class="d-grid mb-2 mt-2">
                        <button type="submit" name="register" class="btn btn-primary btn-lg fw-bold rounded-3">
                            Register
                        </button>
                    </div>
                </form>
                <div class="text-center mt-2">
                    <p class="text-muted mb-0">
                        Sudah punya akun?
                        <a href="login.php" class="fw-semibold text-decoration-none ms-1">
                            Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>