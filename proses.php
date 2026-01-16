<?php
include 'koneksi.php';

$nama = $_POST['nama'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($password)) {
  header("Location: auth.php");
  exit;
}

$cek = mysqli_query($conn, "SELECT * FROM admin LIMIT 1");
$jumlah = mysqli_num_rows($cek);

if ($jumlah == 0) {

  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($conn, "INSERT INTO admin (nama, password) VALUES ('$nama', '$password_hash')");

  header("Location: dasbor.php");
  exit;
} else {

  $data = mysqli_fetch_assoc($cek);

  if (password_verify($password, $data['password'])) {

    mysqli_query($conn, "UPDATE admin SET nama='$nama' WHERE id='{$data['id']}'");

    header("Location: dasbor.php");
    exit;
  } else {

    header("Location: auth.php");
    exit;
  }
}
