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

    <!-- 🔽 INPUT FILE (ANTI RESET) -->
    <div id="file-wrapper">
      <input type="file" name="gambar[]" class="form-control mb-2" required>
    </div>

    <button type="button" class="btn btn-secondary btn-sm mb-3" onclick="tambahFile()">
      + Tambah Foto
    </button>

    <textarea name="deskripsi" class="form-control mb-3" placeholder="Deskripsi" required></textarea>
    <button class="btn btn-success" name="simpan">Simpan</button>
  </form>

  <?php
  if (isset($_POST['simpan'])) {

    $deskripsi = $_POST['deskripsi'];
    $folder = __DIR__ . '/assets/images/blog/';

    $namaFile = [];

    foreach ($_FILES['gambar']['name'] as $key => $name) {
      $tmp = $_FILES['gambar']['tmp_name'][$key];

      if ($name != '') {
        move_uploaded_file($tmp, $folder . $name);
        $namaFile[] = $name;
      }
    }

    $gambar = implode(',', $namaFile);

    mysqli_query($conn, "INSERT INTO postingan (gambar, deskripsi)
      VALUES ('$gambar', '$deskripsi')");

    echo "<script>alert('Berhasil');location='home.php';</script>";
  }
  ?>

  <!-- 🔽 JAVASCRIPT (DITAMBAHKAN, TIDAK MENGGANGGU YANG LAIN) -->
  <script>
    function tambahFile() {
      const wrapper = document.getElementById('file-wrapper');

      const input = document.createElement('input');
      input.type = 'file';
      input.name = 'gambar[]';
      input.className = 'form-control mb-2';

      wrapper.appendChild(input);
    }
  </script>

</body>

</html>