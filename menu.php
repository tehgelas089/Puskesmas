<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Menu Aktivitas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!--====== Favicon Icon ======-->
  <link rel="icon" href="assets/images/puskes.png" type="image/png">

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
      background: #1f6a4e;
      color: white;
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
      background: #a8f2ce;
      transform: scale(1.03);
      color: black;
    }
  </style>
</head>

<body>
  <section class="navbar-area navbar-nine" style="background-color: #1f6a4e;">
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
    <!-- container -->
  </section>

  <!--====== NAVBAR NINE PART ENDS ======-->

  <!--====== SIDEBAR PART START ======-->

  <div class="sidebar-left">
    <div class="sidebar-close">
      <a class="close" href="#close"><i class="lni lni-close"></i></a>
    </div>
    <div class="sidebar-content">
      <div class="sidebar-logo">
        <a href="index.html"><img src="assets/images/puskes.png" alt="Logo" style="width: 80px; height: 80px;" /></a>
      </div>
      <p class="text text-uppercase text-black fw-bold">Sangkanhurip Beraksi.</p>
      <!-- logo -->
      <div class="sidebar-menu">
        <h5 class="menu-title">Menu</h5>
        <ul>
          <li><a href="menu.php">List</a></li>
          <li><a href="dasbor.php">Posting</a></li>
          <li><a href="Agenda.php">Agenda Acara</a></li>
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
        <a href="list.php" class="menu-card w-100">Pencegahan penyakit tidak menular</a>
      </div>

      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="list_gigi.php" class="menu-card w-100">Perilaku Hidup Sehat</a>
      </div>

      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="listpm.php" class="menu-card w-100">Pencegahan penyakit menular</a>
      </div>

      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="listgizi.php" class="menu-card w-100">Gizi seimbang</a>
      </div>


      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="list.diet.php" class="menu-card w-100">Menjaga Berat Badan ideal</a>
      </div>


      <div class="col-12 col-sm-6 col-md-5 col-lg-4">
        <a href="listWo.php" class="menu-card w-100">Aktivitas fisik</a>
      </div>

    </div>
  </div>

</body>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/glightbox.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/tiny-slider.js"></script>
<script>
  //===== close navbar-collapse when a  clicked
  let navbarTogglerNine = document.querySelector(
    ".navbar-nine .navbar-toggler"
  );
  navbarTogglerNine.addEventListener("click", function() {
    navbarTogglerNine.classList.toggle("active");
  });

  // ==== left sidebar toggle
  let sidebarLeft = document.querySelector(".sidebar-left");
  let overlayLeft = document.querySelector(".overlay-left");
  let sidebarClose = document.querySelector(".sidebar-close .close");

  overlayLeft.addEventListener("click", function() {
    sidebarLeft.classList.toggle("open");
    overlayLeft.classList.toggle("open");
  });
  sidebarClose.addEventListener("click", function() {
    sidebarLeft.classList.remove("open");
    overlayLeft.classList.remove("open");
  });

  // ===== navbar nine sideMenu
  let sideMenuLeftNine = document.querySelector(".navbar-nine .menu-bar");

  sideMenuLeftNine.addEventListener("click", function() {
    sidebarLeft.classList.add("open");
    overlayLeft.classList.add("open");
  });

  //========= glightbox

  function openHapusModal(id) {
    document.getElementById('hapusId').value = id;
    const modal = new bootstrap.Modal(
      document.getElementById('hapusModal')
    );
    modal.show();
  }
</script>

</html>