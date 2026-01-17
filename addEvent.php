<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <title>Tambah Promosi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

  <h3>Tambah Promosi Acara</h3>

  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="gambar" class="form-control mb-2" required>
    <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi Acara" required></textarea>
    <input type="date" name="tanggal" class="form-control mb-3" required>
    <button name="simpan" class="btn btn-success">Simpan</button>
  </form>

  <?php
  if (isset($_POST['simpan'])) {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];

    move_uploaded_file($tmp, "assets/images/acara/" . $gambar);

    mysqli_query($conn, "INSERT INTO promosi VALUES (NULL,'$gambar','$deskripsi','$tanggal')");

    echo "<script>alert('Promosi berhasil ditambahkan');location='home.php';</script>";
  }
  ?>

</body>

</html>