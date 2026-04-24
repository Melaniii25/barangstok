<?php
require '../config/koneksi.php';

if(isset($_POST['register'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    
    $cek = mysqli_query($conn,
    "SELECT * FROM tb_admin WHERE username='$username'");
    
    if(mysqli_num_rows($cek)>0){
        echo "
        <script>
        alert('Username sudah digunakan');
        window.location='registrasi.php';
        </script> ";
exit;
}

    $query = mysqli_query($conn,"
    INSERT INTO tb_admin(nama,username,password,role)
    VALUES( '$nama', '$username', '$password', '$role')"
    );

    if($query){
        echo "
        <script>
        alert('Registrasi berhasil');
        window.location='login.php';
        </script>";
        }else{
        echo "Gagal register";
            }
}
?>