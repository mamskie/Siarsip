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

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!-- Vendor CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
	<div class="sidebar">
		<div class="block">MENU</div>
		<a class="active" href="index.php">Home</a>
		<a href="home.php">Arsip</a>
		<a href="about.php">About</a>
		<a href="logout.php">Logout</a>
	</div>

	<section id="hero" class="d-flex align-items-center" back>
		<div class="content">
			<div class="row">
				<div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
					<h1>Arsip Inaktif Dinas Perempuan dan Anak</h1>
					<div class="d-flex justify-content-center justify-content-lg-start">
						<h1>
							<a class="btn-get-started scrollto">Provinsi Jawa Tengah</a>
						</h1>
					</div>
				</div>
				<div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
					<img src="assets/img/hero-img.png" class="img-fluid animated" alt="Arsip">
				</div>
			</div>
		</div>
	</section>

	<div class="container footer-bottom clearfix">
		<div class="copyright">
			&copy; Copyright <strong><span>MAM06</span></strong>.ME
		</div>
	</div>

	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
	<!-- Vendor JS Files -->
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script>
</body>

</html>