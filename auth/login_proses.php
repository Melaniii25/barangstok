<?php
session_start();
require '../config/koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(strlen($password) < 5){
    echo "<script>alert('Password minimal 5 karakter!');history.back();</script>";
    exit;
}

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        // jika pakai password_hash
        if (password_verify($password, $data['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            // redirect sesuai role
            if ($data['role'] == 'admin') {
                header("Location: ../admin/index.php");
            } elseif ($data['role'] == 'gudang') {
                header("Location: ../gudang/index.php");
            } elseif ($data['role'] == 'pimpinan') {
                header("Location: ../pimpinan/index.php");
            }

            exit;
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}