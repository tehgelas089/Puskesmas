<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM promosi WHERE id='$id'"));
?>

<form method="POST" enctype="multipart/form-data">
  <img src="assets/images/promosi/<?= $data['gambar']; ?>" width="150"><br><br>

  <input type="file" name="gambar" class="form-control mb-2">
  <textarea name="deskripsi" class="form-control mb-2"><?= $data['deskripsi']; ?></textarea>
  <input type="date" name="tanggal" class="form-control mb-3" value="<?= $data['tanggal']; ?>">
  <button name="update" class="btn btn-primary">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
  $deskripsi = $_POST['deskripsi'];
  $tanggal = $_POST['tanggal'];

  if ($_FILES['gambar']['name'] != '') {
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "assets/images/acara/$gambar");
    mysqli_query($conn, "UPDATE promosi SET gambar='$gambar', deskripsi='$deskripsi', tanggal='$tanggal' WHERE id='$id'");
  } else {
    mysqli_query($conn, "UPDATE promosi SET deskripsi='$deskripsi', tanggal='$tanggal' WHERE id='$id'");
  }

  echo "<script>alert('Promosi diperbarui');location='dasbor.php';</script>";
}
?>