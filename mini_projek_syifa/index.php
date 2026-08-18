<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php'; 
$no = 1;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman Buku</title>
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
            color: #ffe6a7; /* Kuning soft pastel */
            text-decoration: none;
            font-weight: bold;
        }
        .user-info a:hover {
            text-decoration: underline;
        }
        .container {
            width: 85%;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border-top: 5px solid #d8f3dc; /* Aksen garis atas soft hijau */
        }
        h1 {
            color: #2d6a4f;
            font-size: 24px;
            margin-top: 0;
        }
        .btn-tambah {
            background-color: #52b788;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            transition: 0.2s;
        }
        .btn-tambah:hover {
            background-color: #40916c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th, table td {
            border: 1px solid #d8f3dc;
            padding: 10px 12px;
            font-size: 14px;
        }
        table th {
            background-color: #52b788;
            color: white;
            text-align: center;
        }
        table tr:nth-child(even) {
            background-color: #fffdf0; /* Kuning pastel sangat soft */
        }
        table tr:hover {
            background-color: #f1f8f5;
        }

        .action-edit {
            color: #2d6a4f;
            text-decoration: none;
            font-weight: bold;
        }
        .action-edit:hover {
            text-decoration: underline;
        }
        .action-hapus {
            color: #e63946;
            text-decoration: none;
            font-weight: bold;
        }
        .action-hapus:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="header-top">
        <div>Sistem Peminjaman Buku</div>
        <div class="user-info">
            Halo, <b><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin'; ?></b> | 
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <center>
        <h1>Data Peminjaman Buku</h1>
        <hr style="border: 0; border-top: 2px solid #f1f5f9; margin-bottom: 20px;">
        </center>

        <button onclick="window.location.href='input_data.php';" class="btn-tambah">
            + Tambah Peminjaman Baru
        </button>

        <br><br>

        <table>
            <tr>
                <th>NO</th>
                <th>KODE BUKU</th>
                <th>NAMA PEMINJAM</th>
                <th>JUDUL BUKU</th>
                <th>PENGARANG</th>
                <th>TANGGAL KEMBALI</th>
                <th>AKSI</th>
            </tr>

            <?php 
            $query = mysqli_query($koneksi, "SELECT * FROM tbl_bukuku");
            while ($d = mysqli_fetch_assoc($query)) { 
            ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td align="center"><?= $d['kd_buku']; ?></td>
                <td><?= $d['nama_peminjam']; ?></td>
                <td><?= $d['judul_buku']; ?></td>
                <td><?= $d['pengarang']; ?></td>
                <td align="center"><?= (!empty($d['tanggal_kembali'])) ? $d['tanggal_kembali'] : '-'; ?></td>
                <td align="center">
                    <a href="aksi_edit.php?id=<?= $d['kd_buku']; ?>" class="action-edit">EDIT</a> |
                    <a href="aksi_hapus.php?id=<?= $d['kd_buku']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="action-hapus">HAPUS</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>