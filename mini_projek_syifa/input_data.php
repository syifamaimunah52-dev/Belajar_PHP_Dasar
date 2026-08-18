<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman - Sistem Peminjaman Buku</title>
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
        <div class="user-info"></div>
    </div>

    <div class="container">
        <center>
        <h2>Form Tambah Peminjaman Buku</h2>
        </center>
        <a href="index.php" class="back-link">&larr; Kembali ke Data Peminjaman</a>
        <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">

        <form action="aksi_input.php" method="post">
            <table>
                <tr>
                    <td>KODE BUKU</td>
                    <td><input type="text" name="kd_buku" placeholder="Contoh: KB001" required></td>
                </tr>
                <tr>
                    <td>NAMA PEMINJAM</td>
                    <td><input type="text" name="nama_peminjam" placeholder="Nama lengkap peminjam..." required></td>
                </tr>
                <tr>
                    <td>JUDUL BUKU</td>
                    <td><input type="text" name="judul_buku" placeholder="Judul buku yang dipinjam..." required></td>
                </tr>
                <tr>
                    <td>PENGARANG</td>
                    <td><input type="text" name="pengarang" placeholder="Nama pengarang buku..." required></td>
                </tr>
                <tr>
                    <td>TANGGAL KEMBALI</td>
                    <td><input type="date" name="tanggal_kembali" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-top: 15px;">
                        <input type="submit" value="SIMPAN DATA" class="btn-simpan">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>