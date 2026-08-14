<?php
// Mengakses data yang dikirim dengan metode POST
$nama = $_POST['nama'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Menampilkan data
echo "Nama: $nama<br>";
echo "Tanggal_lahir: $tanggal_lahir<br>";
?>

<!-- HTML Form POST Method -->
<form method="POST" action="post.php">
    Nama: <input type="text" name="nama">
    Tanggal_lahir: <input type="date" name="tanggal_lahir">
    <input type="submit" value="Submit">
</form>