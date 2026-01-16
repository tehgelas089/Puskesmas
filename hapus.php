<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM postingan WHERE id='$id'"));

$folder = __DIR__ . '/assets/images/blog/';

// hapus file gambar
if (file_exists($folder . $data['gambar'])) {
  unlink($folder . $data['gambar']);
}

// hapus data database
mysqli_query($conn, "DELETE FROM postingan WHERE id='$id'");

header("Location: dasbor.php");
exit;
