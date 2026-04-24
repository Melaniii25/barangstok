<?php require '../config/koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login SIPATKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-4">
        <div class="card shadow-lg  border-0  rounded-4 login-card">
            <div class="card-body text-center">
                <img src="../assets/img/logo.png" class="img-fluid d-block mx-auto mb-3" width="150" alt="Logo SIPATKA">
                <h2 class="fs-4 text-center text-bold">Sistem Persediaan Barang</h2>
                <p class="text-muted mb-4">Silakan login ke akun Anda</p>
                <form action="login_proses.php" method="POST">
                    <div class="mb-3 text-start">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" id="password" name="password"
                                   class="form-control" placeholder="Masukkan password" required>
                            <span class="input-group-text" onclick="togglePassword()" style="cursor:pointer;">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <span class="text-muted"> Belum punya akun? <a href="registrasi.php" class="fw-semibold text-decoration-none ms-1">
                            Daftar sekarang </a>
                        </span>
                    </div>
                    
                    <div class="d-grid mt-4">
                    <button class="btn btn-primary w-100 fw-bold rounded-3" name="login">
                        Login
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    let input = document.getElementById("password");
    input.type = input.type === "password" ? "text" : "password";
}
</script>

</body>
</html>