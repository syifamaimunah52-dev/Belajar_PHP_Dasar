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

// Query untuk menyisipkan data baru (Format tanggal wajib 'YYYY-MM-DD')
$sql = "INSERT INTO orang (id, nama, tanggal_lahir, alamat) VALUES 
        (null, 'Agus', '2000-02-15', 'korea_kulon'), 
        (null, 'Joko_tingkir', '1999-11-25', 'parapatan_ciamis')";

// Menjalankan query
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil ditambahkan<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>