<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM postingan WHERE id='$id'")
);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Detail Postingan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .detail-box {
      background: #9e9e9e;
      border-radius: 20px;
      padding: 30px;
      min-height: 100%;
    }

    .detail-img {
      width: 100%;
      border-radius: 20px;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <div class="container py-5">
    <h2 class="text-center mb-4">Halaman Detail</h2>

    <div class="row g-4 align-items-stretch">

      <!-- GAMBAR -->
      <div class="col-lg-6 col-md-12">

        <?php $foto = explode(',', $data['gambar']); ?>

        <div id="carouselDetail" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            <?php foreach ($foto as $i => $img) : ?>
              <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                <img
                  src="assets/images/blog/<?= $img; ?>"
                  class="detail-img"
                  alt="gambar postingan">
              </div>
            <?php endforeach; ?>

          </div>

          <?php if (count($foto) > 1) : ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselDetail" data-bs-slide="prev">
              <span class="carousel-control-prev-icon " style="background-color: aqua;"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselDetail" data-bs-slide="next">
              <span class="carousel-control-next-icon" style="background-color: aqua;"></span>
            </button>
          <?php endif; ?>
        </div>

      </div>

      <!-- DETAIL -->
      <div class="col-lg-6 col-md-12">
        <div class="detail-box h-100">
          <h4 class="mb-3 text-dark">Detail Postingan</h4>
          <h5 class="fw-semibold text-dark mb-3">
            <?= $data['judul']; ?>
          </h5>


          <p class="text-dark">
            <?= nl2br($data['deskripsi']); ?>
          </p>
        </div>
      </div>

    </div>

    <div class="mt-4">
      <a href="home.php" class="btn btn-secondary">← Kembali</a>
    </div>

  </div>

  <!-- WAJIB untuk slider -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>