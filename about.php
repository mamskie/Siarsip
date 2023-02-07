<?php
//inisialisasi session
session_start();
//mengecek username pada session
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="m.png" rel="shortcut icon">
    <title>Arsip Inaktif</title>
</head>

<body>

    <div class="sidebar">
        <div class="block">MENU</div>
        <a href="index.php">Home</a>
        <a href="home.php">Arsip</a>
        <a class="active" href="about.php">About</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <h2 class="none">About</h2>
        <table>
            <tr>
                <td>
                    <img src="m.png" height="150" width="150" alt="MAM">
                </td>
                <td valign="top">
                    <h2>Aplikasi untuk Mengelola dokumen dengan membuat kode generator di setiap arsipnya sehingga dapat dengan mudah mencari dokumen yang sudah di simpan.</h2>
                    <h4> Seluruh isi dalam website ini dilindungi oleh Undang-undang Republik Indonesia. </h4>
                    <h4>DP3AP2KB Provinsi Jawa Tengah</h4>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>