<?php
include 'koneksi.php';

/* ===== CEK ID ===== */
if (!isset($_POST['id']) || $_POST['id'] == '') {
  header("Location: dasbor.php");
  exit;
}

$id = $_POST['id'];

/* ===== AMBIL DATA ===== */
$query = mysqli_query($conn, "SELECT * FROM postingan WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);

if (!$data) {
  header("Location: dasbor.php");
  exit;
}

/* ===== HAPUS FILE GAMBAR ===== */
$folder = __DIR__ . '/assets/images/blog/';
$foto = explode(',', $data['gambar']);

foreach ($foto as $img) {
  $path = $folder . $img;
  if (file_exists($path) && $img != '') {
    unlink($path);
  }
}

/* ===== HAPUS DATA DB ===== */
mysqli_query($conn, "DELETE FROM postingan WHERE id='$id'");

/* ===== REDIRECT ===== */
header("Location: dasbor.php");
exit;
