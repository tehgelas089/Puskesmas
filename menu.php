<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Menu Aktivitas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/svg" />

  <!--====== Bootstrap css ======-->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

  <!--====== Line Icons css ======-->
  <link rel="stylesheet" href="assets/css/lineicons.css" />

  <!--====== Tiny Slider css ======-->
  <link rel="stylesheet" href="assets/css/tiny-slider.css" />

  <!--====== gLightBox css ======-->
  <link rel="stylesheet" href="assets/css/glightbox.min.css" />

  <link rel="stylesheet" href="style.css" />

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f3f6fa;
      padding: 30px;
    }

    .menu-card {
      background: #9e9e9e;
      color: black;
      border-radius: 18px;
      height: 110px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.2s;
      text-decoration: none;
    }

    .menu-card:hover {
      background: #7f7f7f;
      transform: scale(1.03);
    }
  </style>
</head>

<body>
  <section class="navbar-area navbar-nine position-fixed">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
              <img src="assets/images/puskes.png" alt="Logo" style="height: 50px; width: 50px;" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNine"
              aria-controls="navbarNine" aria-expanded="false" aria-label="Toggle navigation">
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse sub-menu-bar" id="navbarNine">


            </div>

            <div class="navbar-btn d-none d-lg-inline-block">
              <a class="menu-bar" href="#side-menu-left"><i class="lni lni-menu"></i></a>
            </div>
          </nav>
          <!-- navbar -->
        </div>
      </div>
      <!-- row -->
    </div>

  </section>

  <div class="sidebar-left">
    <div class="sidebar-close">
      <a class="close" href="#close"><i class="lni lni-close"></i></a>
    </div>
    <div class="sidebar-content">
      <div class="sidebar-logo">
        <a href="index.html"><img src="assets/images/puskes.png" alt="Logo" style="width: 80px; height: 80px;" /></a>
      </div>
      <p class="text">Lorem ipsum dolor sit amet adipisicing elit. Sapiente fuga nisi rerum iusto intro.</p>
      <!-- logo -->
      <div class="sidebar-menu">
        <h5 class="menu-title">Quick Links</h5>
        <ul>
          <li><a href="menu.php">About Us</a></li>
          <li><a href="admin/konten.php">Our Team</a></li>
          <li><a href="admin/konten.php">Latest News</a></li>
          <li><a href="admin/konten.php">Contact Us</a></li>
        </ul>
      </div>
      <!-- menu -->
      <div class="sidebar-social align-items-center justify-content-center">
        <h5 class="social-title">Follow Us On</h5>
        <ul>
          <li>
            <a href="admin/konten.php"><i class="lni lni-facebook-filled"></i></a>
          </li>
          <li>
            <a href="admin/konten.php"><i class="lni lni-twitter-original"></i></a>
          </li>
          <li>
            <a href="admin/konten.php"><i class="lni lni-linkedin-original"></i></a>
          </li>
          <li>
            <a href="admin/konten.php"><i class="lni lni-youtube"></i></a>
          </li>
        </ul>
      </div>
      <!-- sidebar social -->
    </div>
    <!-- content -->
  </div>
  <div class="overlay-left"></div>



  <div class="container">
    <h2 class="text-center mb-5" style="margin-top: 150px;">Menu list</h2>

    <div class="row g-4 justify-content-center">

      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="list.php" class="menu-card w-100">Aktivitas Sehat</a>
      </div>

      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="list_gigi.php" class="menu-card w-100">Pola Kesehatan Gigi</a>
      </div>

      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="list-olahraga.html" class="menu-card w-100">Olahraga</a>
      </div>

      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="list-kebersihan.html" class="menu-card w-100">Kebersihan</a>
      </div>


      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="list-kebersihan.html" class="menu-card w-100">Kebersihan</a>
      </div>


      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="list-kebersihan.html" class="menu-card w-100">Kebersihan</a>
      </div>

    </div>
  </div>

</body>

</html>