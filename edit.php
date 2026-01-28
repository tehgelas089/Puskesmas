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
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
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

    /* ===== MODAL NOTIF STYLE ===== */
    #notifModal .modal-content {
      border-radius: 16px;
      border: none;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      overflow: hidden;
    }

    #notifModal .modal-header {
      border-bottom: none;
      padding: 20px 24px 0;
    }

    #notifModal .modal-title {
      font-weight: 600;
    }

    #notifModal .modal-body {
      padding: 20px 24px;
      font-size: 15px;
      color: #555;
    }

    #notifModal .modal-footer {
      border-top: none;
      padding: 0 24px 20px;
    }

    .notif-icon {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      margin-bottom: 12px;
    }

    .notif-success {
      background: #e6f4ea;
      color: #2e7d32;
    }

    .notif-error {
      background: #fdecea;
      color: #c62828;
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

            <!-- <img src="assets/images/blog/<?= $img ?>"> -->
            <img src="assets/images/blog/<?= $img ?>" id="preview<?= $i ?>">

            <!-- <input type="file"
              name="ganti_foto[<?= $i ?>]"
              class="form-control form-control-sm mb-2"> -->

            <input type="file"
              name="ganti_foto[<?= $i ?>]"
              class="form-control form-control-sm mb-2"
              onchange="previewFoto(this, <?= $i ?>)">

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

      <div class="mt-3">
        <label class="fw-semibold mb-1">Judul Postingan</label>
        <input type="text"
          name="judul"
          class="form-control"
          value="<?= $data['judul']; ?>"
          required>
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

  <!-- Modal Notifikasi -->
  <div class="modal fade" id="notifModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body text-center">

          <div id="notifIcon" class="notif-icon mx-auto"></div>

          <h5 id="notifTitle" class="mt-2 mb-1">Judul</h5>
          <p id="notifMessage" class="mb-3">Pesan</p>

          <button class="btn btn-secondary px-4" data-bs-dismiss="modal">
            Oke
          </button>

        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function showNotif(title, message, type = 'success', redirect = null) {
      const icon = document.getElementById('notifIcon');
      const titleEl = document.getElementById('notifTitle');
      const messageEl = document.getElementById('notifMessage');

      titleEl.innerText = title;
      messageEl.innerHTML = message;

      icon.className = 'notif-icon mx-auto';

      if (type === 'success') {
        icon.classList.add('notif-success');
        icon.innerHTML = '✓';
      } else {
        icon.classList.add('notif-error');
        icon.innerHTML = '✕';
      }

      const modal = new bootstrap.Modal(document.getElementById('notifModal'));
      modal.show();

      if (redirect) {
        setTimeout(() => {
          window.location.href = redirect;
        }, 1500);
      }
    }

    function previewFoto(input, index) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();


        reader.onload = function(e) {
          document.getElementById('preview' + index).src = e.target.result;
        };


        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>


</body>

</html>

<?php
// ======================= UPDATE DATA =======================
if (isset($_POST['update'])) {
  $judul = $_POST['judul'];

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
  SET judul='$judul', gambar='$gambar', deskripsi='$deskripsi' 
  WHERE id='$id'");


  echo "
<script>
  showNotif(
    'Berhasil',
    'Postingan berhasil diperbarui',
    'success',
    'dasbor.php'
  );
</script>";
}

// ======================= HAPUS SATU FOTO =======================
if (isset($_POST['hapus_foto'])) {

  if (count($foto) <= 1) {
    echo "
<script>
  showNotif(
    'Gagal',
    'Minimal harus ada 1 foto',
    'error'
  );
</script>";
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

    echo "
     <script>
     showNotif(
     'Berhasil',
     'Foto berhasil dihapus',
     'success',
     'edit.php?id=$id'
       );
       </script>";
  }
}
?>