<?php

session_start();
require_once('../koneksi.php');
if (!isset($_SESSION['nama_pelanggan'])) {
    header("Location: login-plg.php");
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelanggan - Resto Memoriam</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> -->
    <link rel="stylesheet" href="css/bs-4.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/menu.css" type="text/css">
</head>
<?php 
  include_once('../koneksi.php');
  $nama_pelanggan = $_SESSION['nama_pelanggan'];
  $query = mysqli_query($conn, "SELECT COUNT(id_orderan) as id_or FROM orderan JOIN pelanggan USING (id_pelanggan) JOIN detail_orderan USING (id_orderan) WHERE nama_pelanggan ='$nama_pelanggan' AND status_orderan = 'Diproses';");
  $temp = mysqli_fetch_array($query);
  ?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo resto">
            <h3 class="fw-bold hijau">Resto<span class="oren"> Memoriam</span></h3>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                <li><a href="riwayat-orderan.php"><i class="fa fa-shopping-bag"></i>
                        <span><?php echo $temp['id_or'] ?></span></a></li>
            </ul>
            <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
        </div>
        <div class="humberger__menu__widget">
            <!-- <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> -->
            <div class="header__top__right__auth">
                <a href="../logout-plg.php"><i class="fa fa-user"></i> Logout</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li class="active"><a href="./shop-grid.php">Menu</a></li>
                <li><a href="#">Orderan</a>
                    <ul class="header__menu__dropdown">
                        <!-- <li><a href="./shop-details.html">Detail Menu</a></li> -->
                        <li><a href="./riwayat-orderan.php">Keranjang Belanja</a></li>

                        <li><a href="./blog-details.php">Status Orderan</a></li>
                    </ul>
                </li>
                <li><a href="./blog.php">Akun</a></li>
                <li><a href="./contact.php">Kontak Kami</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> RestoMemoriam@gmail.com</li>
                <li>Pesan Makanan Tanpa Harus Ke Resto</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> RestoMemoriam@gmail.com</li>
                                <li>Pesan Makanan Tanpa Harus Ke Resto</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <!-- <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div> -->
                            <!-- <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
                            <div class="header__top__right__auth">
                                <a href="../logout-plg.php"><i class="fa fa-user"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo resto">
                        <!-- <h3>Resto Memoriam</h3> -->
                        <h3 class="fw-bold hijau">Resto<span class="oren"> Memoriam</span></h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li class="active"><a href="./shop-grid.php">Menu</a></li>
                            <li><a href="#">Orderan</a>
                                <ul class="header__menu__dropdown">
                                    <!-- <li><a href="./shop-details.html">Detail Menu</a></li> -->
                                    <li><a href="./riwayat-orderan.php">Keranjang Belanja</a></li>
                                    <li><a href="./blog-details.php">Status Orderan</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">Akun</a></li>
                            <li><a href="./contact.php">Kontak Kami</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                            <li><a href="riwayat-orderan.php"><i class="fa fa-shopping-bag"></i>
                                    <span><?php echo $temp['id_or'] ?></span></a>
                            </li>
                        </ul>
                        <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Semua Item</span>
                        </div>
                        <ul>
                            <li><a href="shop-grid.php">Makanan</a></li>
                            <li><a href="shop-grid.php">Minuman</a></li>
                            <li><a href="shop-grid.php">Snack</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Cari Makanan
                                    <!-- <span class="arrow_carrot-down"></span> -->
                                </div>
                                <input type="text" placeholder="Mau Pesan Apa Hari Ini?">
                                <button type="submit" class="site-btn">CARI</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?=$_SESSION['nama_pelanggan'] ?></h5>
                                <span>Pelanggan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Menu Makanan</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Menu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <div class="container-xxl py-5">
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
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab2">Minuman </a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab3">Snack</a>
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
                                    <h5 class="d-block h5 mb-2" href=""><?= $row["nama_menu"]; ?></h5>
                                    <span class="text-primary me-1">Rp.<?php echo number_format($row['Harga']) ?></span>
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body"
                                            href="shop-details.php?id=<?php echo $row['nama_menu']; ?>"><i
                                                class="fa fa-eye text-primary me-2"></i>Lihat
                                            detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="order.php?id=<?php echo $row['id_menu']; ?>"><i
                                                class="fa fa-eye text-primary me-2"></i>Pesan
                                        </a>
                                        <!-- <a class="text-body" href="order.php"><i
                                                class="fa fa-shopping-bag text-primary me-2"></i>Pesan</a> -->
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php
            }               
            ?>
                    </div>
                </div>


                <div id="tab2" class="tab-pane fade show p-0">
                    <div class="row g">
                        <?php
                  $data = mysqli_query($conn, "SELECT * FROM view_menu_minuman");   
                  while ($row = mysqli_fetch_array($data)) {
                  ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-item h-100">
                                <div class="position-relative bg-light overflow-hidden">
                                    <?php echo '<img class="img-fluid w-100 img-card" src="data:image/jpeg;base64,'.base64_encode($row['foto_menu']).'"/>'?>
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        <?= $row["status"]; ?></div>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="d-block h5 mb-2" href="#"><?= $row["nama_menu"]; ?></h5>
                                    <span class="text-primary me-1">Rp.<?php echo number_format($row['Harga']) ?></span>
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body"
                                            href="shop-details.php?id=<?php echo $row['nama_menu']; ?>"><i
                                                class="fa fa-eye text-primary me-2"></i>Lihat
                                            detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="order.php?id=<?php echo $row['id_menu']; ?>"><i
                                                class="fa fa-eye text-primary me-2"></i>Pesan
                                        </a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php
            }               
            ?>
                    </div>
                </div>




                <div id="tab3" class="tab-pane fade show p-0">
                    <div class="row g">
                        <?php
                  $data = mysqli_query($conn, "SELECT * FROM view_menu_snack");   
                  while ($row = mysqli_fetch_array($data)) {
                  ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-item h-100">
                                <div class="position-relative bg-light overflow-hidden">
                                    <?php echo '<img class="img-fluid w-100 img-card" src="data:image/jpeg;base64,'.base64_encode($row['foto_menu']).'"/>'?>
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        <?= $row["status"]; ?></div>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="d-block h5 mb-2" href=""><?= $row["nama_menu"]; ?></h5>
                                    <span class="text-primary me-1">Rp.<?php echo number_format($row['Harga']) ?></span>
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body"
                                            href="shop-details.php?id=<?php echo $row['nama_menu']; ?>"><i
                                                class="fa fa-eye text-primary me-2"></i>Lihat
                                            detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="order.php?id=<?php echo $row['id_menu']; ?>"><i
                                                class="fa fa-eye text-primary me-2"></i>Pesan
                                        </a>
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
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__widget">
                            <h4><a>Resto Memoriam</a></h4>
                            <!-- <a href="./index.html"><img src="img/logo.png" alt=""></a> -->
                        </div>
                        <ul>
                            <li>Alamat: Menteng XXII, Palangka Raya</li>
                            <li>Telepon: 087825956965</li>
                            <li>Email: RestoMemoriam@gmail.com</li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Informasi Lainnya</h6>
                        <ul>
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Harga Makanan</a></li>
                            <li><a href="#">Makanan Terbaru</a></li>
                            <li><a href="#">Informasi Pengantaran</a></li>
                            <li><a href="#">Kebijakan Restoran</a></li>
                            <li><a href="#">Lokasi</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Link Pengaduan</a></li>
                            <li><a href="#">Pelayanan Kami</a></li>
                            <li><a href="#">Detail Informasi</a></li>
                            <li><a href="#">Kontak Kami</a></li>
                            <li><a href="#">Inovasi Terbaru</a></li>
                            <li><a href="#">Testimoni</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Beri Pengalaman Anda Terhadap Kami</h6>
                        <p>Kirim Jawaban Anda Melalui Email Berikut</p>
                        <form action="#">
                            <input type="text" placeholder="Masukan Email Anda">
                            <button type="submit" class="site-btn">Kirim Jawaban</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved | Resto Memoriam by <a href="#">Kelompok 9</a>
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- 
    <script src="js/bootstrap.min.js"></script> -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>