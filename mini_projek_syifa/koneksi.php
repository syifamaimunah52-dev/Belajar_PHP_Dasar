<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "projek_kasirku";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

class Produk {
    public function tampil_data() {
        global $koneksi;
        $data = mysqli_query($koneksi, "SELECT * FROM tbl_bukuku");
        $rows = [];
        while ($row = mysqli_fetch_assoc($data)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
?>