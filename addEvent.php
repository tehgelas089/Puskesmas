<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <title>Tambah Promosi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* === CARD HALAMAN (TAMBAHAN SAJA) === */
    .page-card {
      max-width: 600px;
      margin: 40px auto;
      background: #fff;
      border-radius: 20px;
      padding: 32px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }
  </style>
</head>

<body class="p-4 bg-light">

  <!-- === PEMBUNGKUS CARD (TIDAK UBAH ISI FORM) === -->
  <div class="page-card">

    <h3>Tambah Promosi Acara</h3>

    <form method="POST" enctype="multipart/form-data">
      <input type="file" name="gambar" class="form-control mb-2" required>
      <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi Acara" required></textarea>
      <input type="date" name="tanggal" class="form-control mb-3" required>
      <button name="simpan" class="btn btn-success">Simpan</button>
    </form>

  </div>
  <!-- === END CARD === -->

  <?php
  if (isset($_POST['simpan'])) {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];

    move_uploaded_file($tmp, "assets/images/acara/" . $gambar);

    mysqli_query($conn, "INSERT INTO promosi VALUES (NULL,'$gambar','$deskripsi','$tanggal')");

    echo "<script>alert('Promosi berhasil ditambahkan');location='dasbor.php';</script>";
  }
  ?>

</body>

</html>