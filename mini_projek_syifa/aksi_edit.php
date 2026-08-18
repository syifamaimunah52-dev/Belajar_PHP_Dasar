<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_bukuku WHERE kd_buku = '$id'");
$d = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Peminjaman - Sistem Peminjaman Buku</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f9f6;
        }
        .header-top {
            background: linear-gradient(to right, #2d6a4f, #52b788);
            color: white;
            padding: 15px 30px;
            font-size: 20px;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .user-info {
            font-size: 14px;
            font-weight: normal;
        }
        .user-info a {
            color: #ffe6a7;
            text-decoration: none;
            font-weight: bold;
        }
        .user-info a:hover {
            text-decoration: underline;
        }
        .container {
            width: 550px;
            margin: 30px auto;
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-top: 5px solid #52b788;
        }
        h2 {
            color: #2d6a4f;
            font-size: 20px;
            margin-top: 0;
            margin-bottom: 10px;
        }
        .back-link {
            color: #52b788;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }
        table td {
            padding: 8px 10px;
            font-size: 14px;
            color: #333;
        }
        table td:first-child {
            font-weight: bold;
            width: 150px;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #b7e4c7;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
            background-color: #fffdf0; /* Sentuhan kuning pastel tipis untuk input */
        }
        input[readonly] {
            background-color: #f1f5f9;
            color: #64748b;
        }
        .btn-simpan {
            background-color: #52b788;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }
        .btn-simpan:hover {
            background-color: #40916c;
        }
    </style>
</head>
<body>

    <div class="header-top">
        <div>Sistem Peminjaman Buku</div>
        <div class="user-info">
            Halo, <b><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin'; ?></b>
        </div>
    </div>

    <div class="container">
        <center>
        <h2>Edit Data Peminjaman Buku</h2>
        </center>
        <a href="index.php" class="back-link">&larr; Kembali ke Data Peminjaman</a>
        <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">

        <form action="" method="post">
            <table>
                <tr>
                    <td>KODE BUKU</td>
                    <td><input type="text" name="kd_buku" value="<?= $d['kd_buku']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>NAMA PEMINJAM</td>
                    <td><input type="text" name="nama_peminjam" value="<?= $d['nama_peminjam']; ?>" required></td>
                </tr>
                <tr>
                    <td>JUDUL BUKU</td>
                    <td><input type="text" name="judul_buku" value="<?= $d['judul_buku']; ?>" required></td>
                </tr>
                <tr>
                    <td>PENGARANG</td>
                    <td><input type="text" name="pengarang" value="<?= $d['pengarang']; ?>" required></td>
                </tr>
                <tr>
                    <td>TANGGAL KEMBALI</td>
                    <td><input type="date" name="tanggal_kembali" value="<?= $d['tanggal_kembali']; ?>" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-top: 15px;">
                        <input type="submit" name="update" value="UPDATE DATA" class="btn-simpan">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $nama_peminjam   = $_POST['nama_peminjam'];
        $judul_buku      = $_POST['judul_buku'];
        $pengarang       = $_POST['pengarang'];
        $tanggal_kembali = $_POST['tanggal_kembali'];

        $update = mysqli_query($koneksi, "UPDATE tbl_bukuku SET nama_peminjam='$nama_peminjam', judul_buku='$judul_buku', pengarang='$pengarang', tanggal_kembali='$tanggal_kembali' WHERE kd_buku='$id'");

        if ($update) {
            echo "<script>
                    alert('Data peminjaman berhasil diubah!');
                    window.location='index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal mengubah data peminjaman!');
                  </script>";
        }
    }
    ?>

</body>
</html>