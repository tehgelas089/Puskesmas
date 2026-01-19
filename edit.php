<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM postingan WHERE id='$id'"));

$folder = __DIR__ . '/assets/images/blog/';
$foto = explode(',', $data['gambar']);
?>

<form method="POST" enctype="multipart/form-data">

  <p><b>Foto Saat Ini</b></p>

  <?php foreach ($foto as $i => $img): ?>
    <div class="mb-3 border p-2 rounded">

      <img src="assets/images/blog/<?= $img ?>" width="120" class="mb-2"><br>

      <!-- ganti foto -->
      <input type="file" name="ganti_foto[<?= $i ?>]" class="form-control mb-2">

      <!-- hapus foto (tidak boleh hapus semua) -->
      <?php if (count($foto) > 1): ?>
        <button name="hapus_foto" value="<?= $i ?>" class="btn btn-danger btn-sm"
          onclick="return confirm('Hapus foto ini?')">
          Hapus Foto Ini
        </button>
      <?php endif; ?>

    </div>
  <?php endforeach; ?>

  <textarea name="deskripsi" class="form-control mb-3"><?= $data['deskripsi'] ?></textarea>

  <button name="update" class="btn btn-primary">Update</button>
</form>

<?php
// ======================= UPDATE DATA =======================
if (isset($_POST['update'])) {

  $deskripsi = $_POST['deskripsi'];

  // ganti foto satu-satu
  if (!empty($_FILES['ganti_foto']['name'])) {
    foreach ($_FILES['ganti_foto']['name'] as $i => $name) {
      if ($name != '') {

        // hapus foto lama
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