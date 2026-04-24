<?php
session_start();
require '../config/koneksi.php';

if (isset($_POST['tambah_admin'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_admin']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = strtolower(trim($_POST['role']));

    $allowed_roles = ['admin', 'gudang', 'pimpinan'];
    if (!in_array($role, $allowed_roles)) {
        $_SESSION['message'] = "Role tidak valid!";
        header("Location: ../admin/index.php?page=admin");
        exit;
    }

    $query = "INSERT INTO tb_admin (nama_admin, username, password, role)
              VALUES ('$nama','$username','$password','$role')";

    if(mysqli_query($conn, $query)){
        $_SESSION['message'] = "User berhasil ditambahkan";
    } else {
        $_SESSION['message'] = "Gagal: " . mysqli_error($conn);
    }

    header("Location: ../admin/index.php?page=admin");
    exit;
}



if (isset($_POST['hapus'])) {
    $id = $_POST['id_admin'];

    $query = "DELETE FROM tb_admin WHERE id_admin='$id'";

    if(mysqli_query($conn, $query)){
        $_SESSION['message'] = "User berhasil dihapus";
    } else {
        $_SESSION['message'] = "Gagal: " . mysqli_error($conn);
    }

    header("Location: ../admin/index.php?page=admin");
    exit;
}