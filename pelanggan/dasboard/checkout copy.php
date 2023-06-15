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
        <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
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
        <li><a href="./shop-grid.php">Menu</a></li>
        <li class="active"><a href="#">Orderan</a>
          <ul class="header__menu__dropdown">
            <!-- <li><a href="./shop-details.html">Detail Menu</a></li> -->
            <li><a href="./shoping-cart.php">Keranjang Belanja</a></li>
            <li><a href="./checkout.php">Check Out</a></li>
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
              <li><a href="./shop-grid.php">Menu</a></li>
              <li class="active"><a href="#">Orderan</a>
                <ul class="header__menu__dropdown">
                  <!-- <li><a href="./shop-details.html">Detail Menu</a></li> -->
                  <li><a href="./shoping-cart.php">Keranjang Belanja</a></li>
                  <li><a href="./checkout.php">Check Out</a></li>
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
              <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
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
                <i class="fa fa-phone"></i>
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
            <h2>Checkout</h2>
            <div class="breadcrumb__option">
              <a href="./index.html">Home</a>
              <span>Checkout</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Checkout Section Begin -->
  <section class="checkout spad">
    <div class="container">
      <div class="checkout__form">
        <h4>Checkout Pesanan</h4>

        <div class="row">
          <div class="col-lg-12 col-md-6">
            <div class="checkout__order">

              <h4>Pesananmu</h4>
              <div class="checkout__order__products">Pesanan <span>Total</span></div>
              <ul>
                <?php
                $id=$_SESSION['nama_pelanggan'];
                $data = mysqli_query($conn, "SELECT pelanggan.*, menu.*,orderan.*, detail_orderan.* FROM pelanggan JOIN orderan USING (id_pelanggan) JOIN menu USING (id_menu) 
                JOIN detail_orderan USING (id_orderan) WHERE nama_pelanggan = '$id'");   
                while ($row = mysqli_fetch_array($data)) {
                ?>
                <li><?= $row["nama_menu"]; ?> <span>Rp.<?php echo number_format($row['Harga']) ?></span></li>
                <?php
                }               
                ?>
                <!-- <li>Ayam Bakar <span>Rp. 22.000</span></li>
                  <li>Kopi Hitam <span>Rp. 10.000</span></li> -->
              </ul>
              <?php
                $id=$_SESSION['nama_pelanggan'];
                $data = mysqli_query($conn, "SELECT pelanggan.*, menu.*,orderan.*, detail_orderan.*,SUM(menu.Harga*detail_orderan.jumlah_orderan) AS harga_total, SUM(ongkir) AS total_ongkir,SUM((menu.Harga*detail_orderan.jumlah_orderan) + ongkir) AS pembayaran_total FROM pelanggan JOIN orderan USING (id_pelanggan) JOIN menu USING (id_menu) 
                JOIN detail_orderan USING (id_orderan) WHERE nama_pelanggan = '$id'");   
                while ($row = mysqli_fetch_array($data)) {
                ?>
              <div class="checkout__order__subtotal">Total Pesanan
                <span>Rp.<?php echo number_format($row['harga_total']) ?></span>
              </div>
              <div class="checkout__order__subtotal">Ongkir
                <span>Rp.<?php echo number_format($row['total_ongkir']) ?></span>
              </div>
              <div class="checkout__order__total">Total Pembayaran
                <span>Rp.<?php echo number_format($row['pembayaran_total']) ?></span>
              </div>
              <?php
                }               
                ?>

              <?php 
                $data = mysqli_query($conn, "SELECT max((id_bukti)+1) as id_buk FROM bukti_pembayaran");
                $rows = mysqli_fetch_array($data);
                $data1 = mysqli_query($conn, "SELECT * FROM bukti_pembayaran");
                $rows1 = mysqli_fetch_array($data1);
                $data2 = mysqli_query($conn, "SELECT * FROM bukti_pembayaran WHERE tanggal_pesan = current_timestamp()");
                $rows2 = mysqli_fetch_array($data2);
                ?>
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="checkout__input__checkbox">
                  <label for="paypal">
                    TF Ke No Rekening 2030 305 0321 546 (BRI)
                    Atas Nama Putri
                    <input type="checkbox" id="paypal" required>
                    <span class="checkmark"></span>
                  </label>

                </div>
                <div class="form-group">
                  <label>Id Bukti</label>
                  <input type="text" class="form-control" name="id_bukti" value="<?php echo $rows['id_buk']; ?>">
                </div>
                <div class="form-group">
                  <label>Id Detail</label>
                  <input type="text" class="form-control" name="id_detail" value="<?php echo $rows1['id_detail']; ?>">
                </div>
                <div class="mb-3 mt-3">
                  <label for="formFile" style="color: black;">Upload Bukti Pembayaran</label>
                  <input class="form-control" type="file" id="formFile" required>
                </div>

                <input type="hidden" class="form-control" name="tanggal_pesan"
                  value="<?php echo $rows2['tanggal_pesan']; ?>">
                <button type="submit" name="submit" class="site-btn">Kirim Pesanan</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Checkout Section End -->

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