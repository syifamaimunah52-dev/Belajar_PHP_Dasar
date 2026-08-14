<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_dasar";

// Pastikan variabel $conn dibuat di sini agar bisa digunakan di file lain
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>