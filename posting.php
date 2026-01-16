<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <title>Tambah Postingan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

  <h3>Tambah Postingan</h3>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="gambar" class="form-control mb-3" required>
    <textarea name="deskripsi" class="form-control mb-3" placeholder="Deskripsi" required></textarea>
    <button class="btn btn-success" name="simpan">Simpan</button>
  </form>

  <?php
  if (isset($_POST['simpan'])) {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $folder = __DIR__ . '/assets/images/blog/';
    move_uploaded_file($tmp, $folder . $gambar);


    $deskripsi = $_POST['deskripsi'];
    mysqli_query($conn, "INSERT INTO postingan (gambar, deskripsi) VALUES ('$gambar', '$deskripsi')");

    echo "<script>alert('Berhasil');location='home.php';</script>";
  }
  ?>

</body>

</html>