<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM postingan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!--====== Required meta tags ======-->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!--====== Title ======-->
  <title>Beranda</title>

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
</head>

<body>

  <!--====== NAVBAR NINE PART START ======-->

  <section class="navbar-area navbar-nine">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
              <img src="assets/images/puskes.png" alt="Logo" style="width: 60px; height: 60px;" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNine"
              aria-controls="navbarNine" aria-expanded="false" aria-label="Toggle navigation">
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
              <span class="toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse sub-menu-bar" id="navbarNine">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <a class="page-scroll active" href="#hero-area">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="page-scroll" href="#galeri">Agenda</a>
                </li>

                <li class="nav-item">
                  <a class="page-scroll" href="#blog">Edukasi</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="page-scroll" href="#contact">Kontak</a>
                </li> -->
              </ul>
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
        <a href="index.html"><img src="assets/images/puskes.png" alt="Logo" style="width: 100px; height: 100px;" /></a>
      </div>
      <p class="text text-uppercase text-black fw-bold">Sangkanhurip Beraksi.</p>
      <!-- logo -->
      <div class="sidebar-menu">
        <h5 class="menu-title">Menu</h5>
        <ul>
          <li><a href="menu.php">Menu list</a></li>
          <li><a href="#">Our Team</a></li>
          <li><a href="#">Latest News</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
      <!-- menu -->
      <div class="sidebar-social align-items-center justify-content-center">
        <h5 class="social-title">Follow Us On</h5>
        <ul>
          <li>
            <a href="#"><i class="lni lni-facebook-filled"></i></a>
          </li>
          <li>
            <a href="#"><i class="lni lni-twitter-original"></i></a>
          </li>
          <li>
            <a href="#"><i class="lni lni-linkedin-original"></i></a>
          </li>
          <li>
            <a href="#"><i class="lni lni-youtube"></i></a>
          </li>
        </ul>
      </div>
      <!-- sidebar social -->
    </div>
    <!-- content -->
  </div>
  <div class="overlay-left"></div>

  <!--====== SIDEBAR PART ENDS ======-->

  <!-- Start header Area -->
  <section id="hero-area" class="header-area header-eight">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-12 col-12">
          <div class="header-content">
            <h1>Website Puskesmas sangkanhrip.</h1>
            <p>
              Website ini adalah media informasi resmi yang menyediakan edukasi kesehatan bagi masyarakat,dan pemantauan kegiatan sehingga mudah diakses secara cepat dan terpercaya.
            </p>
            <div class="button">
              <a href="#galeri" class="btn primary-btn">Lihat</a>

            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12">
          <div class="header-image">
            <img src="assets/images/sangkanhurip.jpg" alt="#" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End header Area -->






  <!-- ===== service-area start ===== -->
  <!-- ===== service-area start ===== -->
  <style>
    #galeri .section-title-five {
      max-width: 100% !important;
    }
  </style>
  <section id="galeri" class="services-area services-eight">
    <div class="section-title-five">
      <h2 class="text-center">Agenda Acara</h2>
      <div class="container-fluid px-5 py-4">


        <?php
        include 'koneksi.php';
        $data = mysqli_query($conn, "SELECT * FROM promosi ORDER BY tanggal ASC");
        ?>

        <div id="acaraCarousel" class="carousel slide" data-bs-ride="carousel">

          <!-- indikator (titik bawah) -->
          <div class="carousel-indicators">
            <?php
            $i = 0;
            mysqli_data_seek($data, 0);
            while ($row = mysqli_fetch_assoc($data)) :
            ?>
              <button type="button"
                data-bs-target="#acaraCarousel"
                data-bs-slide-to="<?= $i; ?>"
                class="<?= $i == 0 ? 'active' : ''; ?>">
              </button>
            <?php $i++;
            endwhile; ?>
          </div>

          <!-- isi slide -->
          <div class="carousel-inner">
            <?php
            $i = 0;
            mysqli_data_seek($data, 0);
            while ($row = mysqli_fetch_assoc($data)) :
            ?>
              <div class="carousel-item <?= $i == 0 ? 'active' : ''; ?>">
                <div class="d-flex justify-content-center">
                  <!-- PERUBAHAN: ukuran card diperbesar -->
                  <div class="card mb-3 shadow" style="max-width: 980px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="assets/images/acara/<?= $row['gambar']; ?>"
                          class="img-fluid rounded-start" style="width: 980px;"
                          alt="acara">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Acara</h5>
                          <p class="card-text">
                            <?= substr($row['deskripsi'], 0, 150); ?>...
                          </p>
                          <p class="card-text" style="color: blue;">
                            <small class="text-body-secondary">
                              📅 <?= date('d M Y', strtotime($row['tanggal'])); ?>
                            </small>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++;
            endwhile; ?>
          </div>

          <!-- TAMBAHAN: tombol slide manual -->
          <button class="carousel-control-prev" type="button" data-bs-target="#acaraCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>

          <button class="carousel-control-next" type="button" data-bs-target="#acaraCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>

        </div>

      </div>
    </div>
  </section>

  <!-- TAMBAHAN: percepat animasi slide -->
  <style>
    /* ===== AGENDA ACARA STYLE FIX ===== */
    #acaraCarousel .card {
      border: 2px solid #000;
      /* border hitam */
      background: transparent;
      /* tanpa background */
    }

    /* icon panah hitam */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      filter: invert(1);
    }

    /* hover biar keliatan hidup */
    #acaraCarousel .card:hover {
      transform: translateY(-4px);
      transition: 0.3s ease;
    }
  </style>


  <!-- PERUBAHAN: percepat interval auto slide -->
  <script>
    const acaraCarousel = document.querySelector('#acaraCarousel');
    new bootstrap.Carousel(acaraCarousel, {
      interval: 20,
      ride: 'carousel',
      pause: false
    });
  </script>








  <section id="call-action" class="call-action">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9">
          <div class="inner-content">
            <h2>MAKLUMAT PELAYANAN <br />PUSKESMAS SANGKANHURIP</h2>
            <p>
              Kami siap memberikan pelayanan sesuai dengan standar pelayanan dan memberikan pelayanan sesuai
              dengan
              kewajiban serta akan melakukan perbaikan<br /> secara terus menerus, apabila kami tidak
              memberikan pelayanan sesuai dengan standar yang ditetapkan kami siap menerima
              sanksi sesuai dengan peraturan perundang-undangan yang berlaku.
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- End Cta Area -->


  <style>
    #blog .section-title-five {
      max-width: 100% !important;
    }


    .input {
      width: 100%;
      max-width: 270px;
      height: 60px;
      padding: 12px;
      font-size: 18px;
      font-family: "Courier New", monospace;
      color: #000;
      background-color: #fff;
      border: 4px solid #000;
      border-radius: 0;
      outline: none;
      transition: all 0.3s ease;
      box-shadow: 8px 8px 0 #000;
    }

    .input::placeholder {
      color: #888;
    }

    .input:hover {
      transform: translate(-4px, -4px);
      box-shadow: 12px 12px 0 #000;
    }

    .input:focus {
      background-color: #000;
      color: #fff;
      border-color: #ffffff;
    }

    .input:focus::placeholder {
      color: #fff;
    }

    @keyframes typing {
      from {
        width: 0;
      }

      to {
        width: 100%;
      }
    }

    @keyframes blink {
      50% {
        border-color: transparent;
      }
    }

    .input:focus::after {
      content: "|";
      position: absolute;
      right: 10px;
      animation: blink 0.7s step-end infinite;
    }

    .input:valid {
      animation: typing 2s steps(30, end);
    }

    .input-container {
      position: relative;
      width: 100%;
      max-width: 270px;
    }

    .input {
      width: 100%;
      height: 60px;
      padding: 12px;
      font-size: 18px;
      font-family: "Courier New", monospace;
      color: #000;
      background-color: #fff;
      border: 4px solid #000;
      border-radius: 0;
      outline: none;
      transition: all 0.3s ease;
      box-shadow: 8px 8px 0 #000;
    }

    .input::placeholder {
      color: #888;
    }

    .input:hover {
      transform: translate(-4px, -4px);
      box-shadow: 12px 12px 0 #000;
    }

    .input:focus {
      background-color: #010101;
      color: #fff;
      border-color: #d6d9dd;
    }

    .input:focus::placeholder {
      color: #fff;
    }

    @keyframes shake {
      0% {
        transform: translateX(0);
      }

      25% {
        transform: translateX(-5px) rotate(-5deg);
      }

      50% {
        transform: translateX(5px) rotate(5deg);
      }

      75% {
        transform: translateX(-5px) rotate(-5deg);
      }

      100% {
        transform: translateX(0);
      }
    }

    .input:focus {
      animation: shake 0.5s ease-in-out;
    }

    @keyframes glitch {
      0% {
        transform: none;
        opacity: 1;
      }

      7% {
        transform: skew(-0.5deg, -0.9deg);
        opacity: 0.75;
      }

      10% {
        transform: none;
        opacity: 1;
      }

      27% {
        transform: none;
        opacity: 1;
      }

      30% {
        transform: skew(0.8deg, -0.1deg);
        opacity: 0.75;
      }

      35% {
        transform: none;
        opacity: 1;
      }

      52% {
        transform: none;
        opacity: 1;
      }

      55% {
        transform: skew(-1deg, 0.2deg);
        opacity: 0.75;
      }

      50% {
        transform: none;
        opacity: 1;
      }

      72% {
        transform: none;
        opacity: 1;
      }

      75% {
        transform: skew(0.4deg, 1deg);
        opacity: 0.75;
      }

      80% {
        transform: none;
        opacity: 1;
      }

      100% {
        transform: none;
        opacity: 1;
      }
    }

    .input:not(:placeholder-shown) {
      animation: glitch 1s linear infinite;
    }

    .input-container::after {
      content: "|";
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #000;
      animation: blink 0.7s step-end infinite;
    }

    @keyframes blink {
      50% {
        opacity: 0;
      }
    }

    .input:focus+.input-container::after {
      color: #fff;
    }

    .input:not(:placeholder-shown) {
      font-weight: bold;
      letter-spacing: 1px;
      text-shadow: 0px 0px 0 #000;
    }
  </style>

  <div id="blog" class="latest-news-area section">
    <div class="section-title-five">
      <h2 class="text-center">Materi </h2>

      <div class="d-flex justify-content-center align-items-start flex-wrap gap-2">

        <!-- <input
          type="text"
          id="searchMateri"
          class="form-control w-50"
          placeholder="Cari materi..." />

        <button
          class="btn btn-primary"
          id="btnCariMateri">
          Cari
        </button> -->
        <div class="justify-content-center my-4 flex-wrap" style="max-width: 700px; width: 100%;">
          <div class="input-group">

            <input
              type="text"
              id="searchMateri"
              class="form-control"
              placeholder="Cari postingan...">

            <button id="btnCariMateri" class="btn btn-primary">
              Cari
            </button>
          </div>

          <p id="notFoundText" class="w-100 text-center fw-semibold mt-3" style="display:none;">
            Postingan tidak ditemukan
          </p>
        </div>



      </div>

      <script>
        document.getElementById("btnCariMateri").addEventListener("click", function() {
          const keyword = document.getElementById("searchMateri").value.toLowerCase();
          const items = document.querySelectorAll(".materi-item");

          items.forEach(item => {
            const judul = item.getAttribute("data-judul");

            if (judul.includes(keyword)) {
              item.style.display = "block";
            } else {
              item.style.display = "none";
            }
          });
        });

        // optional: search langsung saat mengetik
        document.getElementById("searchMateri").addEventListener("keyup", function() {
          const keyword = this.value.toLowerCase();
          const items = document.querySelectorAll(".materi-item");

          items.forEach(item => {
            const judul = item.getAttribute("data-judul");

            item.style.display = judul.includes(keyword) ? "block" : "none";
          });
        });

        function cekPostingan() {
          const items = document.querySelectorAll(".materi-item");
          const notFoundText = document.getElementById("notFoundText");

          let adaYangTampil = false;

          items.forEach(item => {
            if (item.style.display !== "none") {
              adaYangTampil = true;
            }
          });

          notFoundText.style.display = adaYangTampil ? "none" : "block";
        }

        document.getElementById("btnCariMateri").addEventListener("click", cekPostingan);
        document.getElementById("searchMateri").addEventListener("keyup", cekPostingan);
      </script>



      <section class="container-fluid px-5 py-5">


        <div class="row g-4">

          <?php
          include 'koneksi.php';
          $data = mysqli_query($conn, "SELECT * FROM postingan");
          while ($row = mysqli_fetch_assoc($data)) :
            $foto = explode(',', $row['gambar']);
          ?>
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 materi-item"
              data-judul="<?= strtolower($row['judul']); ?>"
              data-deskripsi="<?= strtolower($row['deskripsi']); ?>">



              <a href="detail.php?id=<?= $row['id']; ?>" class="card-link">
                <div class="card h-100 shadow">
                  <img src="assets/images/blog/<?= $foto[0]; ?>" class="card-img-top">
                  <div class="card-body">
                    <h6 class="fw-semibold mb-1"><?= $row['judul']; ?></h6>
                    <p class="card-text"><?= $row['deskripsi']; ?></p>

                  </div>
                </div>
              </a>
            </div>
          <?php endwhile; ?>

        </div>

      </section>
    </div>
  </div>
  <!-- End Single News -->

  <!-- End Latest News Area -->

  <!-- Start Brand Area -->
  <div id="clients" class="brand-area section mb-5">
    <!--======  Start Section Title Five ======-->
    <div class="section-title-five">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="content">

              <h2 class="fw-bold">Dibangun oleh:</h2>
              <p>
                Website ini dibangun oleh Puskesmas Sangkanhurip yang berkolaborasi dengan SMKS Mahaputra cerdas utama
              </p>
            </div>
          </div>
        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!--======  End Section Title Five ======-->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 col-12">
          <div class="clients-logos d-flex justify-content-center align-items-center gap-4">

            <div class="single-image">
              <img src="assets/images/puskes.png" alt="Brand Logo Images" />
            </div>
            <div class="single-image">
              <img src="assets/images/mplogo.png" alt="Brand Logo Images" style="height: 150px; width: 150px;" />
            </div>
            <!-- <div class="single-image">
              <img src="assets/images/client-logo/ayroui.svg" alt="Brand Logo Images" />
            </div> -->

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Brand Area -->



  <!-- ========================= map-section end ========================= -->
  <section class="map-section map-style-9">
    <div class="map-container">
      <object
        style="border:0; height: 500px; width: 100%;"
        data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9408290939426!2d107.5767775!3d-6.9974503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e94c18338fed%3A0xc33b63c7a6ba30c6!2sPuskesmas%20Sangkanhurip!5e0!3m2!1sid!2sid!4v1737550000000">
      </object>
    </div>
  </section>

  <!-- ========================= map-section end ========================= -->

  <!-- Start Footer Area -->
  <footer class="footer-area footer-eleven">
    <!-- Start Footer Top -->
    <div class="footer-top">
      <div class="container">
        <div class="inner-content">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="footer-widget f-about">
                <div class="logo">
                  <a href="index.html">
                    <img src="assets/images/puskes.png" alt="" class="img-fluid" />
                  </a>
                </div>
                <p>
                  "Sangkanhurip Beraksi"
                </p>
                <p class="copyright-text">
                  <span>©SMKS Mahputra 2026.</span>Dibuat dengan penuh perhatian
                  <a href="#""> 💕 </a> 
               </p>
              </div>
              <!-- End Single Widget -->
            </div>
            <div class=" col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->

                    <!-- End Single Widget -->
              </div>
              <div class="col-lg-2 col-md-6 col-12">
                <!-- Single Widget -->

                <!-- End Single Widget -->
              </div>
              <div class="col-lg-4 col-md-6 col-12">
                <!-- Single Widget -->

                <!-- End Single Widget -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ End Footer Top -->
  </footer>
  <!--/ End Footer Area -->



  <a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
  </a>

  <!--====== js ======-->
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
    GLightbox({
      'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
      'type': 'video',
      'source': 'youtube', //vimeo, youtube or local
      'width': 900,
      'autoplayVideos': true,
    });
  </script>
</body>

</html>