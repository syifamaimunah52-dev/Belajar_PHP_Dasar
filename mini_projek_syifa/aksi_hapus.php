<?php
include 'koneksi.php';

$kd_buku = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM tbl_bukuku WHERE kd_buku = '$kd_buku'");

if ($hapus) {
    echo "<script>
            alert('Data peminjaman berhasil dihapus!');
            window.location='index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data peminjaman!');
            window.location='index.php';
          </script>";
}
?>