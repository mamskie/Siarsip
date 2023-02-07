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
		<a href="logout.php">Logout</a>
	</div>

	<div class="content">
		<h2>Arsip</h2>
		<h4>Berikut ini adalah dokumen yang telah diarsipkan.</h4>
		<br />
		<form method="GET" action="home.php">
			<label>Cari dokument: </label>
			<input class="search" type="text" name="kata_cari" value="<?php if (isset($_GET['kata_cari'])) {
																			echo $_GET['kata_cari'];
																		} ?>" />
			<button class="button button2" type="submit">Cari</button>
			<button class="button button3" type="reset" onclick="window.location.href='home.php'">Reset</button>
		</form>
		<br />
		<br />
		<a href="create.php"><button class="button button1">Tambahkan Arsip</button></a>
		<table class="new">
			<tr>
				<th>No</th>
				<th>Nomor Dokument</th>
				<th>Kategori</th>
				<th>Nama</th>
				<th>Waktu Pengarsipan</th>
				<th>Aksi</th>
			</tr>
			<?php
			include 'koneksi.php';

			if (isset($_GET['kata_cari'])) {
				$kata_cari = $_GET['kata_cari'];
				$data = mysqli_query($koneksi, "SELECT * FROM arsip WHERE nomor like '%" . $kata_cari . "%' OR kategori like '%" . $kata_cari . "%' OR judul like '%" . $kata_cari . "%' OR tgl_arsip like '%" . $kata_cari . "%'");
			} else {
				$data = mysqli_query($koneksi, "select * from arsip");
			}

			while ($d = mysqli_fetch_array($data)) {
			?>
				<tr>
					<td><?php echo $d['id']; ?></td>
					<td><?php echo $d['nomor']; ?></td>
					<td><?php echo $d['kategori']; ?></td>
					<td><?php echo $d['judul']; ?></td>
					<td><?php echo $d['tgl_arsip']; ?></td>
					<td>
						<a href="delete_method.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin ingin menghapusnya?')"><button class="button button3">Hapus</button></a>
						<a href="filepdf/<?php echo $d['pdf']; ?>"><button class="button button6">Unduh</button></a>
						<a href="show.php?id=<?php echo $d['id']; ?>"><button class="button button2">Lihat</button></a>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
		<br>
	</div>

</body>

</html>