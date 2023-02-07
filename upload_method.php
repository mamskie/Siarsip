<?php
include "koneksi.php";
$nomor = $_POST['nomor'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$tgl_arsip = date("Y-m-d H:i:s");
$file = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
$filebaru = date('dmYHis') . $file;
$path = "filepdf/" . $file;
if (move_uploaded_file($tmp, $path)) {
  $sql = mysqli_query($koneksi, "insert into arsip values('','$nomor','$kategori','$judul','$tgl_arsip','$file')");
  if ($sql) {
    echo "<script>
    alert('Data berhasil ditambahkan.');
    window.location.href='home.php';
    </script>";
  } else {
    echo "<script>
    alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');
    window.location.href='home.php';
    </script>";
  }
} else {
  echo "<script>
    alert('Maaf, File gagal di upload.');
    window.location.href='home.php';
    </script>";
}
