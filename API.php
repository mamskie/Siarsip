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

    <!-- css  -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #FFFFFF;
    }

    h1 {
        text-align: center;
        margin-top: 50px;
        margin-bottom: 30px;
        margin-left: -100px;
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
        background-color: #056BE7;
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
        background-color: #00DDFF;
        color: #000000
    }

    pre {
        background-color: #3C88E4;
        border: 2px solid #00EEFF;
        font-weight: bolder;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        overflow-x: auto;
        font-size: 14px;
        line-height: 1.5;
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
            <input type="submit" name="submit" value="Tampilkan Data">
            <!-- <input type="submit" name="all" value="Tampilkan Semua Data"> -->
            <input type="submit" href="api.php" value="Reset">
        </form>

        <?php
		if(isset($_POST['all'])) {
			$url = 'http://localhost/siarsip/api/arsip'; 
			$data = file_get_contents($url);
			$json = json_decode($data);

			echo '<pre>';
			print_r($json);
			echo '</pre>';
		}

		if(isset($_POST['submit'])) {
			$id = $_POST['id'];

			$url = 'http://localhost/siarsip/api/arsip/?id=' . $id;
			$data = file_get_contents($url);
			$json = json_decode($data);

			echo '<pre>';
			print_r($json);
			echo '</pre>';
		}
	?>
    </div>

</body>

</html>