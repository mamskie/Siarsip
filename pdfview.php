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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="m.png" rel="shortcut icon">
    <title>Arsip Inaktif</title>
</head>

<body>
    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "select * from arsip where id='$id'");
    while ($d = mysqli_fetch_array($data)) {
        $pdf_path = 'filepdf/';
        header('Content-type: application/pdf');
        readfile($pdf_path . $d['pdf']);
    }
    ?>
</body>

</html>