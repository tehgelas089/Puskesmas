<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM promosi WHERE id='$id'"));
?>

<style>
  .wrap {
    max-width: 800px;
    margin: 80px auto;
  }

  label {
    font-weight: bold;
    margin-bottom: 6px;
    display: block;
  }

  .input-grey {
    background: #9e9e9e;
    border: none;
    border-radius: 14px;
    padding: 14px;
    width: 100%;
    margin-bottom: 20px;
  }

  textarea.input-grey {
    height: 140px;
    resize: none;
  }

  .bottom-area {
    display: flex;
    gap: 20px;
    align-items: center;
  }

  .preview {
    width: 180px;
    height: 180px;
    background: #9e9e9e;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    text-align: center;
  }

  .preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 14px;
  }

  .right-side {
    flex: 1;
  }

  .btn-posting {
    margin-top: 15px;
    background: #00c853;
    border: none;
    border-radius: 14px;
    padding: 14px;
    width: 100%;
    font-weight: bold;
    font-size: 16px;
  }

  /* === CARD HALAMAN (TAMBAHAN SAJA) === */
  .page-card {
    max-width: 900px;
    margin: 40px auto;
    background: #fff;
    border-radius: 20px;
    padding: 32px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  }

  body {
    background: #f5f5f5;
  }
</style>

<!-- === CARD PEMBUNGKUS (FORM TETAP) === -->
<div class="page-card">

  <form method="POST" enctype="multipart/form-data" class="wrap">

    <label>Tanggal</label>
    <input type="date" name="tanggal"
      value="<?= $data['tanggal']; ?>"
      class="input-grey">

    <label>Deskripsi</label>
    <textarea name="deskripsi"
      class="input-grey"><?= $data['deskripsi']; ?></textarea>

    <div class="right-side">
      <input type="file" name="gambar" class="input-grey">
      <button name="update" class="btn-posting">Posting</button>
    </div>

  </form>

</div>
<!-- === END CARD === -->

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

  echo "<script>alert('Promosi diperbarui');location='Agenda.php';</script>";
}
?>