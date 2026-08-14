<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_dasar";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil<br>";

// Query untuk memperbarui data (Nama dan tanggal dibungkus kutip, perbaiki nama kolom tanggal_lahir)
$sql = "UPDATE orang SET nama='Agua', tanggal_lahir='2000-02-15', alamat='korea_wetan' WHERE id=1";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil diperbarui<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>