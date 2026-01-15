<?php
include 'koneksi.php';

$id    = $_POST['id'];
$judul = $_POST['judul'];
$isi   = $_POST['isi'];

$query = "UPDATE posts SET judul='$judul', isi='$isi' WHERE id='$id'";
mysqli_query($conn, $query);

header("Location: konten.php");
