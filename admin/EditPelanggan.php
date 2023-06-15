<?php session_start();
if (!$_SESSION['nama_pegawai']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'login.php'</script>";

} else { ?>
<?php
include('header.php');
require 'fungsi.php';

$id = $_GET["id_pelanggan"];
$rows = query("SELECT * FROM pelanggan WHERE id_pelanggan = $id")[0];
if (isset($_POST["submit"])) {
if (ubah_pelanggan($_POST) > 0) {
echo "
<script>
alert('Data berhasil diubah!');
document.location.href = 'pelanggan.php';
</script>";
} else {
echo "
<script>
alert('Data gagal diubah!');
document.location.href = 'pelanggan.php';
</script>";
}
}
?>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <img class="app-sidebar__user-avatar" src="https://brighterwriting.com/wp-content/uploads/icon-user-default.png"
      width="50" height="50" alt="User Image">
    <div>
      <p class="app-sidebar__user-name"><?php echo $_SESSION['nama_pegawai']; ?></p>
      <p class="app-sidebar__user-designation">Pegawai Toko</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span
          class="app-menu__label">Dashboard</span></a></li>
    <li><a class="app-menu__item" href="pegawai.php"><i class="app-menu__icon fa fa-address-book"></i><span
          class="app-menu__label">Pegawai</span></a></li>
    <li><a class="app-menu__item active" href="pelanggan.php"><i class="app-menu__icon fa fa-users"></i><span
          class="app-menu__label">Pelanggan</span></a></li>
    <li><a class="app-menu__item" href="meja.php"><i class="app-menu__icon fa fa-sticky-note"></i><span
          class="app-menu__label">Meja</span></a></li>
    <li><a class="app-menu__item" href="menu.php"><i class="app-menu__icon fa fa-th-list"></i><span
          class="app-menu__label">Menu</span></a></li>
    <li><a class="app-menu__item" href="orderan.php"><i class="app-menu__icon fa fa fa-tags"></i><span
          class="app-menu__label">Orderan</span></a></li>
    <li><a class="app-menu__item" href="detail_orderan.php"><i class="app-menu__icon fa fa-check-square-o"></i><span
          class="app-menu__label">Detail Orderan</span></a></li>
    <li><a class="app-menu__item" href="history.php"><i class="app-menu__icon fa fa-history"></i><span
          class="app-menu__label">History</span></a></li>
    <li><a class="app-menu__item" href="bukti-pembayaran.php"><i class="app-menu__icon fa fa-bookmark"></i><span
          class="app-menu__label">Bukti Pembayaran</span></a></li>
  </ul>
</aside>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-users"></i>Halaman Data Pelanggan</h1>
      <p>Halaman Data Pelanggan Restaurant Memoriam</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-users fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
    </ul>
  </div>

  <!-- isi -->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Ubah Data Pelanggan</h3>


        <form action="" method="post">
          <table>
            <div class="form-group">
              <label for="id_pelanggan">Id Pelanggan</label>
              <input type="text" class="form-control" name="id_pelanggan" placeholder="Masukan Id Pelanggan"
                value="<?= $rows["id_pelanggan"] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nama_pelanggan">Nama Pelanggan</label>
              <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukan Nama Pelanggan"
                value="<?= $rows["nama_pelanggan"] ?>">
            </div>
            <div class="form-group">
              <label for="no_hp">No. Hp</label>
              <input type="telp" pattern="^\d{12}$" class="form-control" name="no_hp"
                placeholder="Masukan No Hp Pelanggan" value="<?= $rows["no_hp"] ?>">
            </div>
            <div class="form-group">
              <label for="Alamat">Alamat</label>
              <input type="text" class="form-control" name="Alamat" placeholder="Masukan Alamat Pelanggan"
                value="<?= $rows["Alamat"] ?>">
            </div>

          </table>

          <button type="submit" name="submit" class="btn btn-primary mt-3"><span><i
                class="fa fa-plus"></i>Simpan</button>
          <a href="pelanggan.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button
              type="button" class="btn btn-danger mt-3">
              <span><i class="fa fa-pencil-square-o"></i> Batal</button></span></a>
        </form>
      </div>
    </div>
  </div>
  </div>
  <?php } ?>
  <?php 
include('footer.php');
?>