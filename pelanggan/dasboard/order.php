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
                <li class="active"><a href="#">Orderan</a>
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
                            <li class="active"><a href="#">Orderan</a>
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
                        <h2>Orderan</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Orderan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <?php 
    require_once("../fungsi.php");
 
    $data = mysqli_query($conn, "SELECT max((id_orderan)+1) as id_or FROM orderan");
    $row3 = mysqli_fetch_array($data);
    $data1 = mysqli_query($conn, "SELECT max(id_pelanggan) as id_pe FROM pelanggan");
    $row1 = mysqli_fetch_array($data1);
    $nama = $_SESSION['nama_pelanggan'];
    $nama_pelanggan = mysqli_real_escape_string($conn, $nama);
    
    $query = "SELECT id_pelanggan FROM pelanggan WHERE nama_pelanggan = '$nama_pelanggan'";
    $value = mysqli_query($conn, $query);
    $temp = mysqli_fetch_array($value);
    

     $id = $temp['id_pelanggan'];
    if (isset($_POST["submit"])) {
    if (tambah_orderan($_POST) > 0) {
    echo "
    <script>
    alert('Data berhasil ditambahkan!');
    //   var row = <?php echo +$id; ?>;
    var url = 'shoping-cart.php?id_pelanggan=' + encodeURIComponent('$id');
    // var url = 'shoping-cart.php?nama_pelanggan=' + $id;
    window.location.href = url;
    </script>";
    } else {
    echo "
    <script>
    alert('Data gagal ditambahkan!');
    document.location.href = 'shop-grid.php';
    </script>";
    }
    }
    ?>


    <section class="checkout spad">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div> -->
            <?php
        $id=$_GET['id'];
        $data4 = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = '$id'");   
        while ($row = mysqli_fetch_array($data4)) {
          // echo "<pre/>"; print_r($row)
        // ?>

            <div class="checkout__form">
                <h4>Orderan</h4>
                <form method="POST">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="checkout__order">
                                <h4>Tambah Pesanan</h4>
                                <!-- <form method="POST" action="shoping-cart.php"> -->
                                <div class="form-group mb-3">
                                    <label for="id_orderan">Id Orderan</label>
                                    <input type="text" class="form-control" name="id_orderan"
                                        value="<?php echo $row3['id_or']; ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="id_menu">Id Menu</label>
                                    <input type="text" class="form-control" name="id_menu"
                                        value="<?php echo $row['id_menu']?>">

                                </div>

                                <div class="form-group mb-3">
                                    <label for="id_pelanggan">Id Pelanggan</label>
                                    <input type="text" class="form-control" name="id_pelanggan"
                                        value="<?php echo $temp['id_pelanggan']; ?>">
                                </div>

                                <div class="mb-1">
                                    <label for="validationDefault04" class="form-label">Jenis Pesanan</label>
                                    <div class="input-group">

                                        <select name="nomor_meja" class="form w-100" id="validationDefault04" required>
                                            <option selected disabled value="">Pilih Tipe Pesanan
                                            </option>
                                            <?php $row_orderan = mysqli_query($conn, "SELECT * FROM meja WHERE nomor_meja='20' LIMIT 1");
                        while ($row = mysqli_fetch_array($row_orderan)) {
                            echo "<option value='$row[nomor_meja]'>Pesan Online</option>";
                           
                        }
                        mysqli_free_result($row_orderan); // untuk penggunaan multiple prosedur
                        mysqli_next_result($conn);
                        ?>
                                            <!-- <option value="21">Pesan Online</option> -->
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_orderan"></label>
                                        <input type="hidden" class="form-control" name="jenis_orderan"
                                            value="Pesan Online">
                                    </div>
                                    <div class="form-group">
                                        <label for="status_orderan"></label>
                                        <input type="hidden" class="form-control" name="status_orderan"
                                            value="Diproses">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="site-btn">Tambah
                                    Pesanan</button>

                                <!-- <a href="shoping-cart.php"> -->

                                <!-- </a> -->
                                <!-- </form> -->

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
            }               
            ?>

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