<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM postingan WHERE id='$id'"));

$folder = __DIR__ . '/assets/images/blog/';
?>

<form method="POST" enctype="multipart/form-data">
  <img src="assets/images/blog/<?= $data['gambar'] ?>" width="150"><br><br>

  <input type="file" name="gambar" class="form-control mb-2">

  <textarea name="deskripsi" class="form-control mb-2"><?= $data['deskripsi'] ?></textarea>

  <button name="update" class="btn btn-primary">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
  $deskripsi = $_POST['deskripsi'];

  if (!empty($_FILES['gambar']['name'])) {

    // hapus gambar lama
    if (file_exists($folder . $data['gambar'])) {
      unlink($folder . $data['gambar']);
    }

    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $gambar);

    mysqli_query($conn, "UPDATE postingan 
      SET gambar='$gambar', deskripsi='$deskripsi' 
      WHERE id='$id'");
  } else {

    mysqli_query($conn, "UPDATE postingan 
      SET deskripsi='$deskripsi' 
      WHERE id='$id'");
  }

  echo "<script>alert('Update berhasil');location='dasbor.php';</script>";
}
?>