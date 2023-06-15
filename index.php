<?php  
          require_once('admin/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Resto Memoriam</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="pelanggan/lib/animate/animate.min.css" rel="stylesheet">
    <link href="pelanggan/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="pelanggan/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="pelanggan/css/style.css" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>087825956965, Palangka Raya, IND</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>RestoMemoriam@gmail.com</small>
            </div>
            <div class="col-lg-6 px-5 hvr text-end">
                <!-- <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a> -->

                <!-- <a class="text-body ms-3" href="">
                    <small class=" text-body ms-3 fa fa-search text-body"></small>
               </a>
                <a class="text-body ms-3" href="">
                    <small class=" text-body ms-3 fa fa-user text-body"></small>
                </a>
                <a class="text-body ms-3" href="">
                    <small class=" text-body ms-3 fa fa-shopping-bag text-body"></small>
                </a> -->
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">Resto<span class="text-secondary"> Memoriam</span></h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="#home" class="nav-item nav-link active">Home</a>
                    <a href="#tentang" class="nav-item nav-link">Tentang Kami</a>
                    <a href="#menu" class="nav-item nav-link">Menu</a>
                    <a href="#testimoni" class="nav-item nav-link">Testimoni</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                        <div class="dropdown-menu m-0">
                            <a href="#foot" class="dropdown-item">Kontak Kami</a>
                            <a href="pelanggan/login-plg.php" class="dropdown-item">Login</a>
                            <a href="pelanggan/daftar.php" class="dropdown-item">Sign In</a>

                            <!-- <a href="#kunjungi" class="dropdown-item">404 Page</a> -->
                        </div>
                    </div>

                </div>
                <!-- <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                </div> -->
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div id="home" class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="pelanggan/img/bg-satu.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Selamat Datang Di Resto Memoriam
                                    </h1>
                                    <!-- <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Order</a> -->
                                    <a href="pelanggan/login-plg.php"
                                        class="btn btn-secondary rounded-pill py-sm-3 px-sm-5">Order Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="pelanggan/img/bg-dua.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Resto Cepat Saji Dengan Gaya Modern
                                    </h1>
                                    <!-- <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Order</a> -->
                                    <a href="pelanggan/login-plg.php"
                                        class="btn btn-secondary rounded-pill py-sm-3 px-sm-5">Order Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div id="tentang" class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-50" src="pelanggan/img/resto.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Resto Memoriam</h1>
                    <p class="mb-4">Resto Memoriam merupakan sebuah restoran dengan gaya eropa kekinian namun dipadukan
                        dengan rasa dari nusantara sehingga
                        restoran ini mempunyai cita rasa yang tak terlupakan.
                    </p>
                    <p><i class="fa fa-check text-primary me-3"></i>Harga Terjangkau</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Rasa 100% Original</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Pelayanan Ramah</p>
                    <!-- <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Product Start -->
    <div id="menu" class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Menu Kami</h1>
                        <p>Bosan dengan makanan yang itu-itu aja, Cobalah beberapa menu kami.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                href="#tab-1">Makanan</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Minuman </a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Snack</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">

                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g">
                        <?php
                  $data = mysqli_query($conn, "SELECT * FROM view_menu_makanan");   
                  while ($row = mysqli_fetch_array($data)) {
                  ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item h-100">
                                <div class="position-relative bg-light overflow-hidden">
                                    <?php echo '<img class="img-fluid w-100 img-card" src="data:image/jpeg;base64,'.base64_encode($row['foto_menu']).'"/>'?>
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        <?= $row["status"]; ?></div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""><?= $row["nama_menu"]; ?></a>
                                    <span class="text-primary me-1">Rp.<?php echo number_format($row['Harga']) ?></span>
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <!-- <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small> -->
                                    <small class="w-100 text-center py-2">
                                        <a href="pelanggan/login-plg.php"
                                            onclick=" return confirm ('Apakah anda ingin memesan ini ? maka login terlebih dahulu');">
                                            <i class="fa fa-shopping-bag text-primary me-2"></i>Pesan</a>
                                    </small>
                                </div>
                            </div>

                        </div>
                        <?php
          }               
          ?>
                    </div>
                </div>


                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row g">
                        <?php
                  $data = mysqli_query($conn, "SELECT * FROM view_menu_minuman");   
                  while ($row = mysqli_fetch_array($data)) {
                  ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-5">
                            <div class="product-item h-100">
                                <div class="position-relative bg-light overflow-hidden">
                                    <?php echo '<img class="img-fluid w-100 img-card" src="data:image/jpeg;base64,'.base64_encode($row['foto_menu']).'"/>'?>
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        <?= $row["status"]; ?></div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""><?= $row["nama_menu"]; ?></a>
                                    <span class="text-primary me-1">Rp.<?php echo number_format($row['Harga']) ?></span>
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <!-- <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small> -->
                                    <small class="w-100 text-center py-2">
                                        <a href="pelanggan/pelanggan/login-plg.php"
                                            onclick=" return confirm ('Apakah anda ingin memesan ini ? maka login terlebih dahulu');">
                                            <i class="fa fa-shopping-bag text-primary me-2"></i>Pesan</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php
          }               
          ?>

                    </div>
                </div>


                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row g">
                        <?php
                  $data = mysqli_query($conn, "SELECT * FROM view_menu_snack");   
                  while ($row = mysqli_fetch_array($data)) {
                  ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-5">
                            <div class="product-item h-100">
                                <div class="position-relative bg-light overflow-hidden">
                                    <?php echo '<img class="img-fluid w-100 img-card" src="data:image/jpeg;base64,'.base64_encode($row['foto_menu']).'"/>'?>
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        <?= $row["status"]; ?></div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""><?= $row["nama_menu"]; ?></a>
                                    <span class="text-primary me-1">Rp.<?php echo number_format($row['Harga']) ?></span>
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <!-- <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small> -->
                                    <small class="w-100 text-center py-2">
                                        <a href="pelanggan/login-plg.php"
                                            onclick=" return confirm ('Apakah anda ingin memesan ini ? maka login terlebih dahulu');">
                                            <i class="fa fa-shopping-bag text-primary me-2"></i>Pesan</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php
          }               
          ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->

    <!-- Testimonial Start -->
    <div id="testimoni" class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Testimoni</h1>
                <p>Kebanyakan dari mereka membeli dan memberi tanggapan positif untuk kami yaitu tidak lain adalah
                    pelayanan terbaik yang kami berikan</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Sangat puas dari Resto Mamoriam.
                        makanan / minuman dan pelayanan juga ramah, dan cepat pokok bagus.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle img-fluid"
                            src="https://drive.google.com/uc?id=1hKuZH1rs5zeVm6-4yEZclIi3CtUSxCaS" alt=""
                            style="object-fit: cover;">
                        <div class="ms-3">
                            <h5 class="mb-1">Richo Albert Tio</h5>
                            <span>Pelanggan</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Makanan dan minuman di resto mamoriam sangat terjangkau dan enak</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle"
                            src="https://drive.google.com/uc?id=1aCro4xUWiyNcwnMtpzZ7ZxbUY3FL49Rn" alt=""
                            style="object-fit: cover;">
                        <div class="ms-3">
                            <h5 class="mb-1">Ripaldo Alyura</h5>
                            <span>Pelanggan</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Suasananya nyaman dan pelayannya ramah-ramah</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle"
                            src="	https://drive.google.com/uc?id=1gZ9ug1SkZqdkHN4Kq2EqNbQuPM1-3v2P" alt=""
                            style="object-fit: cover;">
                        <div class="ms-3">
                            <h5 class="mb-1">Muhammad Rijal</h5>
                            <span>Pelanggan</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Pelayanannya Sangat Bagus Dan Tempatnya Sangat Bersih</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle"
                            src="https://drive.google.com/uc?id=1OQ2wMrd_hxK6VVwiHWLiwMST6BGBfMkB" alt=""
                            style="object-fit: cover;">
                        <div class="ms-3">
                            <h5 class="mb-1">Lesti Egi Karlina</h5>
                            <span>Pelanggan</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Resto Memoriam Sangat Cocok Untuk Makan Bersama Keluarga</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle"
                            src="https://drive.google.com/uc?id=1v7XA9AbONZPYCedpyp9p41S_7IxAONY-" alt=""
                            style="object-fit: cover;">
                        <div class="ms-3">
                            <h5 class="mb-1">Andre Setiawan</h5>
                            <span>Pelanggan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display 5 mb-3">Lokasi Resto Memoriam</h1>
                <p>Lokasi Tempat Resto Memoriam</p>
            </div>
            <div class="container-xxl px-0 wow fadeIn" data-wow-delay="0.1s" style="margin-bottom: -6px;">
                <iframe class="w-100" style="height: 450px; border-style: solid !important;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2319.768682089703!2d113.9026551087779!3d-2.229116950264517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb31f0223daaf%3A0x1abde138608869b3!2sJl.%20Menteng%20XXII%2C%20Menteng%2C%20Kec.%20Jekan%20Raya%2C%20Kota%20Palangka%20Raya%2C%20Kalimantan%20Tengah%2074874!5e0!3m2!1sid!2sid!4v1683572756390!5m2!1sid!2sid"
                    frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <div id="foot" class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="custom-container container py-5">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <h1 class="fw-bold text-primary mb-4">Resto<span class="text-secondary"> Memoriam</span></h1>
                    <p>Restoran Dengan Gaya Kekinian</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <h4 class="text-light mb-4">Alamat</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Palangka Raya, INA</p>
                    <p><i class="fa fa-phone-alt me-3"></i>087825956965</p>
                    <p><i class="fa fa-envelope me-3"></i>RestoMamoriam@gmail.com</p>
                </div>
                <div class="col-lg-2">
                    <h4 class="text-light mb-4">Informasi</h4>
                    <a class="btn btn-link" href="">Home</a>
                    <a class="btn btn-link" href="">Tentang Kami</a>
                    <a class="btn btn-link" href="">Menu</a>
                    <a class="btn btn-link" href="">Testimoni</a>
                    <a class="btn btn-link" href="">Lainnya</a>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Sosial Media</h4>
                    <p>Facebook</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent  py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Resto Memoriam</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">Kelompok 9</a>
                        <br>Distributed By: <a href="https://themewagon.com" target="_blank">Resto Memoriam</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="pelanggan/lib/wow/wow.min.js"></script>
    <script src="pelanggan/lib/easing/easing.min.js"></script>
    <script src="pelanggan/lib/waypoints/waypoints.min.js"></script>
    <script src="pelanggan/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="pelanggan/js/main.js"></script>
</body>

</html>