<?php session_start();
if (!$_SESSION['nama_pegawai']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'login.php'</script>";

} else { ?>
<?php
include('header.php');
require 'fungsi.php';

$id = $_GET["id_orderan"];
$rows = query("SELECT * FROM orderan WHERE id_orderan = $id")[0];
if (isset($_POST["submit"])) {
if (ubah_orderan($_POST) > 0) {
echo "
<script>
alert('Data berhasil diubah!');
document.location.href = 'orderan.php';
</script>";
} else {
echo "
<script>
alert('Data gagal diubah!');
document.location.href = 'orderan.php';
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
    <li><a class="app-menu__item" href="pelanggan.php"><i class="app-menu__icon fa fa-users"></i><span
          class="app-menu__label">Pelanggan</span></a></li>
    <li><a class="app-menu__item" href="meja.php"><i class="app-menu__icon fa fa-sticky-note"></i><span
          class="app-menu__label">Meja</span></a></li>
    <li><a class="app-menu__item" href="menu.php"><i class="app-menu__icon fa fa-th-list"></i><span
          class="app-menu__label">Menu</span></a></li>
    <li><a class="app-menu__item active" href="orderan.php"><i class="app-menu__icon fa fa-tags"></i><span
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
      <h1><i class="fa fa-tags"></i> Halaman Data Orderan</h1>
      <p>Halaman Data Orderan Restaurant Memoriam</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-tags fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Orderan</a></li>
    </ul>
  </div>

  <!-- isi -->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Ubah Data Orderan</h3>
        <form action="" method="post">
          <table>
            <div class="form-group">
              <label for="id_orderan">Id Orderan</label>
              <input type="text" class="form-control" name="id_orderan" value="<?= $rows["id_orderan"] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_menu">Id Menu</label>
              <input type="text" class="form-control" name="id_menu" placeholder="Masukan Id Menu"
                value="<?= $rows["id_menu"] ?>">
            </div>
            <div class="form-group">
              <label for="id_pelanggan">Id Pelanggan</label>
              <input type="text" class="form-control" name="id_pelanggan" placeholder="Masukan Id Pelanggan"
                value="<?= $rows["id_pelanggan"] ?>">
            </div>
            <div class="form-group">
              <label for="nomor_meja">Nomor Meja</label>
              <input type="text" class="form-control" name="nomor_meja" placeholder="Masukan Nomor Meja"
                value="<?= $rows["nomor_meja"] ?>">
            </div>
            <div class="form-group">
              <label for="jenis_orderan">Jenis Orderan</label>
              <select name="jenis_orderan" class="form-control">
                <option value="<?php echo $rows['jenis_orderan']; ?>">
                  <?php echo $rows['jenis_orderan']; ?>
                </option>
                <option value="Makan Di Tempat">Makan Di Tempat</option>
                <option value="Pesan Online">Pesan Online</option>
              </select>
            </div>
            <div class="form-group">
              <label for="status_orderan">Status Orderan</label>
              <select name="status_orderan" class="form-control">
                <option value="<?php echo $rows['status_orderan']; ?>">
                  <?php echo $rows['status_orderan']; ?>
                </option>
                <option value="Diproses">Diproses</option>
                <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                <option value="Selesai">Selesai</option>
              </select>
            </div>
          </table>

          <button type="submit" name="submit" class="btn btn-primary mt-3"><span><i
                class="fa fa-plus"></i>Simpan</button>
          <a href="orderan.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button
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