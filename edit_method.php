<?php
include "koneksi.php";
$id = $_GET['id'];
$nomor = $_POST['nomor'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$tgl_arsip = date("Y-m-d H:i:s");
$file = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
$filebaru = date('dmYHis') . $file;
$path = "filepdf/" . $file;

if (move_uploaded_file($tmp, $path)) {
  $sql = mysqli_query($koneksi, "update arsip set nomor='$nomor', kategori='$kategori', judul='$judul', tgl_arsip='$tgl_arsip', pdf='$file' where id='$id'");
  if ($sql) {
    echo "<script>
    alert('Data berhasil diupdate.');
    window.location.href='home.php';
    </script>";
  } else {
    echo "<script>
      alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');
      window.location.href='show.php?id=<?php echo $id; ?>';
      </script>";
  }
} else {
  $sql = mysqli_query($koneksi, "update arsip set nomor='$nomor', kategori='$kategori', judul='$judul', tgl_arsip='$tgl_arsip' where id='$id'");
  if ($sql) {
    echo "<script>
    alert('Data berhasil diupdate.');
    window.location.href='index.php';
    </script>";
  } else {
    echo "<script>
      alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.');
      window.location.href='show.php?id=<?php echo $id; ?>';
      </script>";
  }
}
