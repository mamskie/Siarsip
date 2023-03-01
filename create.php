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
        <a class="active" href="home.php">Arsip</a>
        <a href="about.php">About</a>
        <a href="API.php">API</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <h2>Tambahkan Arsip Baru</h2>
        <h4>Unggah dokument pada form untuk diarsipkan.</h4>
        <h4>Catatan: * Gunakan file berformat pdf</h4>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT max(nomor) as kodeTerbesar FROM arsip");
        $data = mysqli_fetch_array($query);
        $kodeBarang = $data['kodeTerbesar'];
        $urutan = (int) substr($kodeBarang, 3, 3);
        $urutan++;
        $huruf = "ARS";
        $kodeBarang = $huruf . sprintf("%03s", $urutan);
        ?>
        <form method="post" action="upload_method.php" enctype="multipart/form-data">
            <table class="none" style="width:100%;">
                <tr>
                    <td>Nomor Dokument</td>
                    <td><input class="inpt" type="text" name="nomor" value="<?php echo $kodeBarang ?>" readonly></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori" class="button button2">
                            <option value="SPK">Surap Perintah Kerja (SPK)</option>
                            <option value="SPJ">Surat Pertanggung Jawaban (SPJ) Keuangan</option>
                            <option value="Nota Dinas">Nota Dinas</option>
                            <option value="Pemberitahuan">Laporan Kegiatan</option>
                            <option value="Kegiatan Program">Kegiatan Program</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input class="inpt" type="text" name="judul"></td>
                </tr>
                <tr>
                    <td>File (PDF)</td>
                    <td><input class="button button2" type="file" name="file" id="file" accept="application/pdf"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="home.php"><button class="button button6">Kembali</button></a>
                        <input class="button button1" type="submit" value="Simpan">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>