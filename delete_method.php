<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "delete from arsip where id='$id'");

header("location:home.php");
