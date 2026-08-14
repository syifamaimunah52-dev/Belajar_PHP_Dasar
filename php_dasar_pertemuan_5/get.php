<?php

// Mengakses data yang dikirim dengan metode GET
$nama = $_GET['nama'];
$tanggal_lahir = $_GET['tanggal_lahir'];

// Menampilkan data
echo "Nama: $nama<br>";
echo "Tanggal_lahir: $tanggal_lahir<br>";
?>

<!-- HTML Form GET Method -->
<form method="GET" action="get.php">
    Nama: <input type="text" name="nama">
    Umur: <input type="date" name="tanggal_lahir">
    <input type="submit" value="Submit">
</form>