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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="m.png" rel="shortcut icon">
    <title>Arsip Inaktif</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    h1 {
        text-align: center;
        margin-top: 50px;
        margin-bottom: 30px;
    }

    form {
        width: 500px;
        margin: 0 auto;
        text-align: center;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #3e8e41;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .btn-container button {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 10px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-container button:hover {
        background-color: #3e8e41;
    }
    </style>

</head>

<body>

    <div class="sidebar">
        <div class="block">MENU</div>
        <a href="index.php">Home</a>
        <a href="home.php">Arsip</a>
        <a href="about.php">About</a>
        <a class="active" href="API.php">API</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">

        <h1><b>REST API</b></h1>

        <form method="post">
            <label for="id">ID:</label>
            <input type="text" name="id" id="id">
            <div class="btn-container">
                <button type="submit" name="submit">Tampilkan Data JSON</button>
                <button type="submit" name="all">Tampilkan Semua Data</button>
            </div>
            <div class="btn-container">
                <button type="submit" name="data1">Tampilkan Data 1</button>
                <button type="submit" name="data2">Tampilkan Data 2</button>
                <button type="submit" name="data3">Tampilkan Data 3</button>
            </div>
        </form>

        <?php
		// Jika tombol Tampilkan Semua Data diklik
		if(isset($_POST['all'])) {
			// Panggil API dan ambil respons JSON
			$url = 'http://localhost/siarsip/api/arsip'; // Ganti dengan URL API yang sebenarnya
			$data = file_get_contents($url);
			$json = json_decode($data);

			// Tampilkan data JSON
			echo '<pre>';
			print_r($json);
			echo '</pre>';
		}

        	// Jika tombol Tampilkan Data JSON diklik
		if(isset($_POST['submit'])) {
			$id = $_POST['id'];
			if(empty($id)) {
				echo 'Harap masukkan ID terlebih dahulu.';
			} else {
				// Panggil API dan ambil respons JSON
				$url = 'http://localhost/siarsip/api/arsip/?id=' . $id; // Ganti dengan URL API yang sebenarnya
				$data = file_get_contents($url);
				$json = json_decode($data);

				// Tampilkan data JSON
				echo '<pre>';
				print_r($json);
				echo '</pre>';
			}
		}

		// Jika tombol Tampilkan Data 1 diklik
		if(isset($_POST['data1'])) {
			// Panggil API dan ambil respons JSON
			$url = 'http://localhost/siarsip/api/arsip/?id=1'; // Ganti dengan URL API yang sebenarnya
			$data = file_get_contents($url);
			$json = json_decode($data);

			// Tampilkan data JSON
			echo '<pre>';
			print_r($json);
			echo '</pre>';
		}

		// Jika tombol Tampilkan Data 2 diklik
		if(isset($_POST['data2'])) {
			// Panggil API dan ambil respons JSON
			$url = 'http://localhost/siarsip/api/arsip/?id=2'; // Ganti dengan URL API yang sebenarnya
			$data = file_get_contents($url);
			$json = json_decode($data);

			// Tampilkan data JSON
			echo '<pre>';
			print_r($json);
			echo '</pre>';
		}

		// Jika tombol Tampilkan Data 3 diklik
		if(isset($_POST['data3'])) {
			// Panggil API dan ambil respons JSON
			$url = 'http://localhost/siarsip/api/arsip/?id=3'; // Ganti dengan URL API yang sebenarnya
			$data = file_get_contents($url);
			$json = json_decode($data);

			// Tampilkan data JSON
			echo '<pre>';
			print_r($json);
			echo '</pre>';
		}
	?>

    </div>

</body>

</html>