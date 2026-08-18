<?php
session_start();
include 'koneksi.php';

// Mengecek apakah tombol 'login' pada form sudah ditekan
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    // Mengambil data dari database berdasarkan username
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username = '$username'");
    $user = mysqli_fetch_assoc($query);

    // Memeriksa apakah user ditemukan dan password-nya cocok
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        
        // Jika berhasil, arahkan ke halaman utama index.php
        header("Location: index.php");
        exit;
    } else {
        // Jika gagal, tampilkan alert lalu kembalikan ke halaman login
        echo "<script>
                alert('Login Gagal! Username atau Password salah.'); 
                window.location='login.php';
              </script>";
        exit;
    }
} else {
    // Jika file diakses langsung tanpa form POST, tendang kembali ke login.php
    header("Location: login.php");
    exit;
}
?>