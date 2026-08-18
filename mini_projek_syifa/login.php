<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE username = '$username'");
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Sistem Peminjaman Buku</title>
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
            align-items: center;
            gap: 10px;
        }
        .login-container {
            width: 450px;
            background: white;
            margin: 60px auto;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            overflow: hidden;
            border-top: 5px solid #52b788;
        }
        .login-card-header {
            background: #d8f3dc;
            color: #2d6a4f;
            text-align: center;
            padding: 18px;
            font-size: 18px;
            font-weight: bold;
        }
        .login-card-body {
            padding: 30px;
            text-align: center;
        }
        .login-card-body p {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-group label {
            width: 90px;
            font-size: 14px;
            color: #333;
            font-weight: bold;
        }
        .form-group input {
            width: 230px;
            padding: 8px 10px;
            border: 1px solid #b7e4c7;
            border-radius: 6px;
            font-size: 14px;
        }
        .btn-login {
            background-color: #52b788;
            color: white;
            border: none;
            padding: 9px 25px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
            transition: 0.2s;
        }
        .btn-login:hover {
            background-color: #40916c;
        }
        .register-link {
            margin-top: 20px;
            font-size: 13px;
        }
        .register-link a {
            color: #2d6a4f;
            text-decoration: none;
            font-weight: bold;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        .error-msg {
            color: #e63946;
            font-style: italic;
            font-size: 13px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="header-top">
         Sistem Peminjaman Buku
    </div>

    <div class="login-container">
        <div class="login-card-header">
            🔐 Login Admin / Peminjam
        </div>
        <div class="login-card-body">
            <p>Silahkan Masukkan Username dan Password Anda</p>

            <?php if (isset($error)) : ?>
                <div class="error-msg">Username atau Password salah!</div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Masukkan username" required>
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>
                </div>
                
                <button type="submit" name="login" class="btn-login">Masuk Sistem</button>
            </form>

            <div class="register-link">
                Belum punya akun? <a href="register.php">Register di sini</a>
            </div>
        </div>
    </div>

</body>
</html>