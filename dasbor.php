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
  <title>PuskesMedia</title>

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

  <!--====== SIDEBAR PART ENDS ======-->

  <!-- Start header Area -->
  <!-- End header Area -->

  <!--====== ABOUT FIVE PART START ======-->

  <section class="about-area about-five" id="promosi">
    <div class="container">

      <h3>Data Postingan</h3>
      <a href="posting.php" class="btn btn-primary mb-3">Tambah Postingan</a>

      <table class="table table-bordered" style="border: 2px;">
        <tr class="text-center">
          <th>Postingan</th>
          <th>Judul</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>


        <?php while ($row = mysqli_fetch_assoc($data)) : ?>
          <tr>
            <td>
              <!-- <img src="assets/images/blog/<?= $row['gambar']; ?>" class="card-img-top" alt="postingan" style="width: 100px;" height="100px"> -->
              <?php
              $gambar = explode(',', $row['gambar']);
              $preview = $gambar[0];
              ?>

              <img src="assets/images/blog/<?= $preview ?>"
                class="card-img-top"
                alt="postingan"
                style="width: 100px; height:100px; object-fit:cover;">

            </td>
            <td><?= $row['judul'] ?></td>

            <td><?= $row['deskripsi'] ?></td>
            <td>



              <a href=" edit.php?id=<?= $row['id'] ?>" class="cdn" style="line-height: 2.3em;">
                EDIT
              </a>
              <form action="hapus.php" method="POST" style="display:inline;"
                onsubmit="return confirm('Yakin mau hapus?')">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button type="submit" class="hps">
                  Hapus
                </button>
              </form>

            </td>
          </tr>
        <?php endwhile; ?>
      </table>

    </div>
  </section>


  <style>
    .cdn {
      width: 6.5em;
      height: 2.3em;
      margin: 0.5em;
      background: #EEA727;
      color: white;
      border: none;
      border-radius: 0.625em;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      position: relative;
      z-index: 1;
      overflow: hidden;
      text-align: center;
    }

    .cdn:hover {
      color: white;
    }

    .cdn:after {
      content: "";
      background: #222222;
      position: absolute;
      z-index: -1;
      left: -20%;
      right: -20%;
      top: 0;
      bottom: 0;
      transform: skewX(-45deg) scale(0, 1);
      transition: all 0.5s;
    }

    .cdn:hover:after {
      transform: skewX(-45deg) scale(1, 1);
      -webkit-transition: all 0.5s;
      transition: all 0.5s;
    }

    .hps {
      width: 6.5em;
      height: 2.3em;
      margin: 0.5em;
      background: #FF4646;
      color: white;
      border: none;
      border-radius: 0.625em;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      position: relative;
      z-index: 1;
      overflow: hidden;
      text-align: center;
    }

    .hps:hover {
      color: white;
    }

    .hps:after {
      content: "";
      background: #222222;
      position: absolute;
      z-index: -1;
      left: -20%;
      right: -20%;
      top: 0;
      bottom: 0;
      transform: skewX(-45deg) scale(0, 1);
      transition: all 0.5s;
    }

    .hps:hover:after {
      transform: skewX(-45deg) scale(1, 1);
      -webkit-transition: all 0.5s;
      transition: all 0.5s;
    }
  </style>


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
  </section>
  <!-- End Cta Area -->



  <!-- Start Latest News Area -->

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
                Website ini dibangun oleh Puskesmas Sangkanhurip yang berkolaborasi dengan SMKS Mahaputra cerdas utama.
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

  <!-- ========================= contact-section start ========================= -->

  <section id="contact" class="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">
          <div class="contact-item-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="contact-item">
                  <div class="contact-icon">
                    <i class="lni lni-phone"></i>
                  </div>
                  <div class="contact-content">
                    <h4>Kontak</h4>
                    <p>08124787781</p>
                    <p>pkmsangkanhurip@bandungkab.go.id</p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="contact-item">
                  <div class="contact-icon">
                    <i class="lni lni-map-marker"></i>
                  </div>
                  <div class="contact-content">
                    <h4>Alamat</h4>
                    <p>Jl.Katapang Andir No.117 RT 03 RW 06 Desa Sukamukti Kec.Katapang</p>
                    <p>Bandung</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-xl-12">
                <div class="contact-item">
                  <div class="contact-icon">
                    <i class="lni lni-alarm-clock"></i>
                  </div>
                  <div class="contact-content">
                    <h4>Jam Operasi</h4>
                    <p>5 jam / 6 Hari buka</p>
                    <p>Senin-Kamis:07.30-11.00 WIB</p>
                    <p>Jumat-Sabtu:07.30-10.00 WIB</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="contact-form-wrapper">
            <div class="row">
              <div class="col-xl-10 col-lg-8 mx-auto">
                <div class="section-title text-center">
                  <span> Get in Touch </span>
                  <h2>
                    Ready to Get Started
                  </h2>
                  <p>
                    At vero eos et accusamus et iusto odio dignissimos ducimus
                    quiblanditiis praesentium
                  </p>
                </div>
              </div>
            </div>
            <form action="#" class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" name="name" id="name" placeholder="Name" required />
                </div>
                <div class="col-md-6">
                  <input type="email" name="email" id="email" placeholder="Email" required />
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <input type="text" name="phone" id="phone" placeholder="Phone" required />
                </div>
                <div class="col-md-6">
                  <input type="text" name="subject" id="email" placeholder="Subject" required />
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <textarea name="message" id="message" placeholder="Type Message" rows="5"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="button text-center rounded-buttons">
                    <button type="submit" class="btn primary-btn rounded-full">
                      Send Message
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- ========================= contact-section end ========================= -->

  <!-- ========================= map-section end ========================= -->
  <section class="map-section map-style-9 ">
    <div class="map-container">
      <object
        style="border:0; height: 500px; width: 100%;"
        data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9408290939426!2d107.5767775!3d-6.9974503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e94c18338fed%3A0xc33b63c7a6ba30c6!2sPuskesmas%20Sangkanhurip!5e0!3m2!1sid!2sid!4v1737550000000">
      </object>
    </div>
  </section>


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
                  Making the world a better place through constructing elegant
                  hierarchies.
                </p>
                <p class="copyright-text">
                  <span>© 2024 Ayro UI.</span>Designed and Developed by
                  <a href="javascript:void(0)" rel="nofollow"> Ayro UI </a>. <br> Distributed by <a href="http://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
              </div>
              <!-- End Single Widget -->
            </div>
            <div class="col-lg-2 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="footer-widget f-link">
                <h5>Solutions</h5>
                <ul>
                  <li><a href="javascript:void(0)">Marketing</a></li>
                  <li><a href="javascript:void(0)">Analytics</a></li>
                  <li><a href="javascript:void(0)">Commerce</a></li>
                  <li><a href="javascript:void(0)">Insights</a></li>
                </ul>
              </div>
              <!-- End Single Widget -->
            </div>
            <div class="col-lg-2 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="footer-widget f-link">
                <h5>Support</h5>
                <ul>
                  <li><a href="javascript:void(0)">Pricing</a></li>
                  <li><a href="javascript:void(0)">Documentation</a></li>
                  <li><a href="javascript:void(0)">Guides</a></li>
                  <li><a href="javascript:void(0)">API Status</a></li>
                </ul>
              </div>
              <!-- End Single Widget -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <!-- Single Widget -->
              <div class="footer-widget newsletter">
                <h5>Subscribe</h5>
                <p>Subscribe to our newsletter for the latest updates</p>
                <form action="#" method="get" target="_blank" class="newsletter-form">
                  <input name="EMAIL" placeholder="Email address" required="required" type="email" />
                  <div class="button">
                    <button class="sub-btn">
                      <i class="lni lni-envelope"></i>
                    </button>
                  </div>
                </form>
              </div>
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

    function openHapusModal(id) {
      document.getElementById('hapusId').value = id;
      const modal = new bootstrap.Modal(
        document.getElementById('hapusModal')
      );
      modal.show();
    }
  </script>
  <style>
     #contact {
    padding-bottom: 80px;
  }

  .map-section {
    position: relative;
    z-index: 0;
    margin-top: 120px;
  }
   .contact-item {
  display: flex;
  align-items: flex-start; /* BUKAN center */
  gap: 16px;
  padding: 24px;
  min-height: 160px; /* bikin card tinggi */
}

.contact-icon {
  flex-shrink: 0;
}

.contact-content p {
  margin-bottom: 6px;
  line-height: 1.6;
}

.contact-content h4 {
  margin-bottom: 4% ;
}
  </style>
</body>

</html>