<?php
include 'koneksi.php';

if (isset($_POST['kd_buku'])) {
    $kd_buku         = $_POST['kd_buku'];
    $nama_peminjam   = $_POST['nama_peminjam'];
    $judul_buku      = $_POST['judul_buku'];
    $pengarang       = $_POST['pengarang'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $query = "INSERT INTO tbl_bukuku (kd_buku, nama_peminjam, judul_buku, pengarang, tanggal_kembali) VALUES ('$kd_buku', '$nama_peminjam', '$judul_buku', '$pengarang', '$tanggal_kembali')";
    
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location='index.php';
              </script>";
    } else {
        echo "<b>Gagal Menyimpan Data!</b><br>";
        echo "Pesan Error MySQL: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses dilarang!";
}
?>