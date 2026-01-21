<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Postingan</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .notif-icon {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      margin: 0 auto 12px;
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

<body class="p-4">

<h3>Tambah Postingan</h3>

<form method="POST" enctype="multipart/form-data">

  <div id="file-wrapper">
    <input type="file" name="gambar[]" class="form-control mb-2" required>
  </div>

  <button type="button"
          class="btn btn-secondary btn-sm mb-3"
          onclick="tambahFile()">
    + Tambah Foto
  </button>

  <textarea name="deskripsi"
            class="form-control mb-3"
            placeholder="Deskripsi"
            required></textarea>

  <button class="btn btn-success" name="simpan">
    Simpan
  </button>
</form>

<!-- MODAL -->
<div class="modal fade" id="notifModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">

        <div id="notifIcon" class="notif-icon"></div>
        <h5 id="notifTitle"></h5>
        <p id="notifMessage"></p>

        <button class="btn btn-secondary" data-bs-dismiss="modal">
          Oke
        </button>

      </div>
    </div>
  </div>
</div>

<!-- BOOTSTRAP JS (WAJIB) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function showNotif(title, message, type = 'success', redirect = null) {
  const icon = document.getElementById('notifIcon');
  const titleEl = document.getElementById('notifTitle');
  const msgEl = document.getElementById('notifMessage');

  titleEl.innerText = title;
  msgEl.innerText = message;

  icon.className = 'notif-icon';

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

function tambahFile() {
  const wrapper = document.getElementById('file-wrapper');

  const input = document.createElement('input');
  input.type = 'file';
  input.name = 'gambar[]';
  input.className = 'form-control mb-2';

  wrapper.appendChild(input);
}
</script>

<?php
if (isset($_POST['simpan'])) {

  $deskripsi = $_POST['deskripsi'];
  $folder = __DIR__ . '/assets/images/blog/';
  $namaFile = [];

  foreach ($_FILES['gambar']['name'] as $i => $name) {
    if ($name != '') {
      move_uploaded_file(
        $_FILES['gambar']['tmp_name'][$i],
        $folder . $name
      );
      $namaFile[] = $name;
    }
  }

  $gambar = implode(',', $namaFile);

  mysqli_query($conn, "
    INSERT INTO postingan (gambar, deskripsi)
    VALUES ('$gambar', '$deskripsi')
  ");

  echo "
  <script>
    showNotif(
      'Berhasil',
      'Postingan berhasil ditambahkan',
      'success',
      'dasbor.php'
    );
  </script>";
}
?>

</body>
</html>
