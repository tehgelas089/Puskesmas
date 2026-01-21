<?php
include 'koneksi.php';

$id = $_POST['id'];

$data = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM postingan WHERE id='$id'")
);

$folder = __DIR__ . '/assets/images/blog/';
$foto = explode(',', $data['gambar']);

foreach ($foto as $img) {
  if (file_exists($folder . $img)) {
    unlink($folder . $img);
  }
}

mysqli_query($conn, "DELETE FROM postingan WHERE id='$id'");

header("Location: dasbor.php");
exit;
