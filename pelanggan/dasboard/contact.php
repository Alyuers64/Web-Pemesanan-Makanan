<?php

session_start();

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
                <li><a href="riwayat-orderan.php"><i class="fa fa-shopping-bag"></i>
                        <span><?php echo $temp['id_or'] ?></span></a>
                </li>
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
                <li><a href="#">Orderan</a>
                    <ul class="header__menu__dropdown">
                        <!-- <li><a href="./shop-details.html">Detail Menu</a></li> -->
                        <li><a href="./riwayat-orderan.php">Keranjang Belanja</a></li>

                        <li><a href="./blog-details.php">Status Orderan</a></li>
                    </ul>
                </li>
                <li><a href="./blog.php">Akun</a></li>
                <li class="active"><a href="./contact.php">Kontak Kami</a></li>
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
    <?php 
  include_once('../koneksi.php');
  $nama_pelanggan = $_SESSION['nama_pelanggan'];
  $query = mysqli_query($conn, "SELECT COUNT(id_orderan) as id_or FROM orderan JOIN pelanggan USING (id_pelanggan) JOIN detail_orderan USING (id_orderan) WHERE nama_pelanggan ='$nama_pelanggan' AND status_orderan = 'Diproses';");
  $temp = mysqli_fetch_array($query);
  ?>
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
                            <li><a href="#">Orderan</a>
                                <ul class="header__menu__dropdown">
                                    <!-- <li><a href="./shop-details.html">Detail Menu</a></li> -->
                                    <li><a href="./riwayat-orderan.php">Keranjang Belanja</a></li>

                                    <li><a href="./blog-details.php">Status Orderan</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">Akun</a></li>
                            <li class="active"><a href="./contact.php">Kontak Kami</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                            <li><a href="riwayat-orderan.php"><i class="fa fa-shopping-bag"></i>
                                    <span><?php echo $temp['id_or'] ?></span></a></li>
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
                                <h5><?= $_SESSION['nama_pelanggan']?></h5>
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
                        <h2>Kontak Kami</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Kontak Kami</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Telephone</h4>
                        <p>087825956965</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Alamat</h4>
                        <p>Menteng XXII, Palangka Raya</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Jam Operasi</h4>
                        <p>10:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>RestoMemoriam@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="map">
            <div  class=" px-0 wow fadeIn" data-wow-delay="0.1s" style="margin-bottom: -6px;">
                <iframe class="w-100" style="height: 450px; border-style: solid !important;"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2319.768682089703!2d113.9026551087779!3d-2.229116950264517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb31f0223daaf%3A0x1abde138608869b3!2sJl.%20Menteng%20XXII%2C%20Menteng%2C%20Kec.%20Jekan%20Raya%2C%20Kota%20Palangka%20Raya%2C%20Kalimantan%20Tengah%2074874!5e0!3m2!1sid!2sid!4v1683572756390!5m2!1sid!2sid"
                  frameborder="0" aria-hidden="false" tabindex="0"></iframe>
              </div>
        </div> -->
    </section>
    <!-- Contact Section End -->

    <section class="checkout spad">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div> -->
            <div class="checkout__form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__title">
                            <h2>Lokasi Restoran</h2>
                        </div>
                    </div>
                    <div class=" wow fadeIn" data-wow-delay="0.1s"
                        style="margin-bottom: -6px; visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <iframe class="w-100" style="height: 450px; border-style: solid !important;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2319.768682089703!2d113.9026551087779!3d-2.229116950264517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb31f0223daaf%3A0x1abde138608869b3!2sJl.%20Menteng%20XXII%2C%20Menteng%2C%20Kec.%20Jekan%20Raya%2C%20Kota%20Palangka%20Raya%2C%20Kalimantan%20Tengah%2074874!5e0!3m2!1sid!2sid!4v1683572756390!5m2!1sid!2sid"
                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Map Begin -->

    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Kirim Pesan Darurat</h2>
                    </div>
                </div>
            </div>
            <form class="row justify-content-center">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" id="namalk" name="Nama Lengkap :" class="form-control"
                            placeholder="Nama Lengkap" required>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" id="mail" name="Email :" class="form-control" placeholder="Email"
                            aria-label="Email" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea class="form-control" id="des" name="Pesan :" placeholder="Pesan"></textarea>
                        <button type="submit" class="btn-success site-btn send">Kirim Pesan</button>

                    </div>
                </div>
            </form>
            <div id="text-info"></div>
        </div>
    </div>
    <!-- Contact Form End -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).on('click', '.send', function() {
        /* Inputan Formulir */
        var input_name = $("#namalk").val(),
            input_email = $("#mail").val(),
            input_order = $("#des").val()

        /* Pengaturan Whatsapp */
        var walink = 'https://web.whatsapp.com/send',
            phone = '6285754061604',
            text = 'Halo min, saya ingin mesan atas nama : ',
            text_yes = 'Pesanan Anda berhasil terkirim.',
            text_no = 'Isilah formulir terlebih dahulu.';

        /* Smartphone Support */
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var walink = 'whatsapp://send';
        }

        if (input_name != "" && input_email != "" && input_order != "") {
            /* Whatsapp URL */
            var checkout_whatsapp = walink + '?phone=' + phone + '&text=' + text + '%0A%0A' +
                'Nama Lengkap : ' + input_name + '%0A' +
                'Email : ' + input_email + '%0A' +
                'Pesan : ' + input_order + '%0A';

            /* Whatsapp Window Open */
            window.open(checkout_whatsapp, '_blank');
            document.getElementById("text-info").innerHTML = '<div class="alert alert-success">' + text_yes +
                '</div>';
        } else {
            //   document.getElementById("text-info").innerHTML = '<div class="alert alert-danger">' + text_no + '</div>';
        }
    });
    </script>
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