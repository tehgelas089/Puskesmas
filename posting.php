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

    /* === TAMBAHAN STYLE (TIDAK MENGUBAH YANG LAMA) === */
    .preview-card {
      width: 100%;
      height: 180px;
      background: #9e9e9e;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      text-align: center;
      overflow: hidden;
    }

    .preview-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .post-btn {
      height: 48px;
      border-radius: 16px;
      font-weight: 600;
    }

    .preview-card {
      cursor: pointer;
    }

    #file-wrapper {
      max-height: 200px;
      /* muat ±4 input file */
      overflow-y: auto;
      /* scroll ke bawah */
      padding-right: 6px;
      /* biar scrollbar nggak nabrak */
    }
  </style>
</head>

<body class="p-4">

  <h3>Tambah Postingan</h3>

  <form method="POST" enctype="multipart/form-data">

    <!-- === BAGIAN TAMPILAN FILE + PREVIEW (DITERAPKAN LANGSUNG) === -->
    <div class="row g-3 mb-3">


      <!-- === INPUT YANG LAMA TETAP === -->
      <input type="text"
        name="judul"
        class="form-control mb-3"
        placeholder="Judul Postingan"
        required>

      <textarea name="deskripsi"
        class="form-control mb-3"
        placeholder="Deskripsi"
        required></textarea>

      <div class="col-md-4">
        <div class="preview-card" id="preview">
          Gambar Postingan
        </div>
      </div>

      <div class="col-md-8">
        <div id="file-wrapper">
          <input
            type="file"
            name="gambar[]"
            class="form-control mb-2"
            accept="image/*"
            onchange="previewImage(this)"
            required>
        </div>

        <button
          type="button"
          class="btn btn-secondary btn-sm mt-2"
          onclick="tambahFile()">
          + Tambah Foto
        </button>
      </div>

    </div>


    <button class="btn btn-success w-100 post-btn" name="simpan">
      Posting
    </button>
  </form>

  <!-- MODAL (TETAP) -->
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


  <!-- BOOTSTRAP JS -->
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
      input.accept = 'image/*';
      input.onchange = function() {
        previewImage(this);
      };

      wrapper.appendChild(input);
    }

    /* === TAMBAHAN PREVIEW GAMBAR === */
    function previewImage(input) {
      const preview = document.getElementById('preview');

      if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
          preview.innerHTML = `<img src="${e.target.result}">`;
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
    document.getElementById('preview').addEventListener('click', function() {
      const input = document.querySelector('#file-wrapper input[type="file"]');
      if (input) {
        input.click();
      }
    });
  </script>

  <?php
  if (isset($_POST['simpan'])) {

    $judul = $_POST['judul'];
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
      INSERT INTO postingan (judul, gambar, deskripsi)
      VALUES ('$judul', '$gambar', '$deskripsi')
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