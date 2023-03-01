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
        <h1>Arsip >> Edit</h1>
        <h3>Catatan: * Gunakan file berformat pdf</h3>
        <br />
        <br />
        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi, "select * from arsip where id='$id'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <form method="post" action="edit_method.php?id=<?php echo $id; ?>" enctype="multipart/form-data">


            <table class="none" style="width:100%;">
                <tr>
                    <td>Nomor Surat</td>
                    <td><input class="inpt" type="text" name="nomor" value="<?php echo $d['nomor']; ?>"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select class="button button2" name="kategori">
                            <option selected="selected"><?php echo $d['kategori']; ?></option>
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
                    <td><input class="inpt" type="text" name="judul" value="<?php echo $d['judul']; ?>"></td>
                </tr>
                <tr>
                    <td>File Surat (PDF)</td>
                    <td><input class="button button2" type="file" name="file" value="<?php echo $d['pdf']; ?>"
                            accept="application/pdf"><br></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a style="text-decoration: none; color:black;" href="show.php?id=<?php echo $id; ?>"><button
                                class="button button6">Kembali</button></a>
                        <input class="button button1" type="submit" value="Simpan">
                    </td>
                </tr>
            </table>

        </form>
        <?php
        }
        ?>
    </div>

</body>

</html>