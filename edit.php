<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM postingan WHERE id='$id'"));

$folder = __DIR__ . '/assets/images/blog/';
$foto = explode(',', $data['gambar']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Postingan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f1f3f5;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .edit-wrapper {
      max-width: 900px;
      margin: 50px auto;
      background: #ffffff;
      border-radius: 14px;
      padding: 32px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.08);
    }

    .edit-title {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 24px;
    }

    .foto-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 20px;
    }

    .foto-item {
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 12px;
      background: #fafafa;
    }

    .foto-item img {
      width: 100%;
      height: 130px;
      object-fit: cover;
      border-radius: 6px;
      margin-bottom: 10px;
    }

    textarea {
      min-height: 150px;
      resize: vertical;
    }

    .action-bar {
      display: flex;
      justify-content: flex-end;
      margin-top: 24px;
    }
    .header-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 24px;
}

  </style>
</head>

<body>

<div class="edit-wrapper">

  <div class="header-bar">
  <div class="edit-title">Edit Postingan</div>
  <a href="dasbor.php" class="btn btn-secondary btn-sm">
    Kembali
  </a>
</div>

  <form method="POST" enctype="multipart/form-data">

    <div class="mb-3 fw-semibold">Foto Saat Ini</div>

    <div class="foto-grid">
      <?php foreach ($foto as $i => $img): ?>
        <div class="foto-item">

          <img src="assets/images/blog/<?= $img ?>">

          <input type="file"
                 name="ganti_foto[<?= $i ?>]"
                 class="form-control form-control-sm mb-2">

          <?php if (count($foto) > 1): ?>
            <button name="hapus_foto"
                    value="<?= $i ?>"
                    class="btn btn-outline-danger btn-sm w-100"
                    onclick="return confirm('Hapus foto ini?')">
              Hapus Foto
            </button>
          <?php endif; ?>

        </div>
      <?php endforeach; ?>
    </div>

    <div class="mt-4">
      <label class="fw-semibold mb-1">Deskripsi</label>
      <textarea name="deskripsi" class="form-control"><?= $data['deskripsi'] ?></textarea>
    </div>

    <div class="action-bar">
      <button name="update" class="btn btn-primary px-4">
        Simpan Perubahan
      </button>
    </div>

  </form>

</div>

</body>
</html>

<?php
// ======================= UPDATE DATA =======================
if (isset($_POST['update'])) {

  $deskripsi = $_POST['deskripsi'];

  if (!empty($_FILES['ganti_foto']['name'])) {
    foreach ($_FILES['ganti_foto']['name'] as $i => $name) {
      if ($name != '') {

        if (file_exists($folder . $foto[$i])) {
          unlink($folder . $foto[$i]);
        }

        move_uploaded_file($_FILES['ganti_foto']['tmp_name'][$i], $folder . $name);
        $foto[$i] = $name;
      }
    }
  }

  $gambar = implode(',', $foto);

  mysqli_query($conn, "UPDATE postingan 
    SET gambar='$gambar', deskripsi='$deskripsi' 
    WHERE id='$id'");

  echo "<script>alert('Update berhasil');location='dasbor.php';</script>";
}

// ======================= HAPUS SATU FOTO =======================
if (isset($_POST['hapus_foto'])) {

  if (count($foto) <= 1) {
    echo "<script>alert('Minimal harus ada 1 foto');</script>";
  } else {

    $index = $_POST['hapus_foto'];

    if (file_exists($folder . $foto[$index])) {
      unlink($folder . $foto[$index]);
    }

    unset($foto[$index]);
    $foto = array_values($foto);

    $gambar = implode(',', $foto);

    mysqli_query($conn, "UPDATE postingan 
      SET gambar='$gambar' 
      WHERE id='$id'");

    echo "<script>alert('Foto dihapus');location='edit.php?id=$id';</script>";
  }
}
?>
