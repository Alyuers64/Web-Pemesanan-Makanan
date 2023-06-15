<?php session_start();
if (!$_SESSION['nama_pegawai']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'login.php'</script>";

} else { ?>
<?php
include('header.php');
require 'fungsi.php';

$id = $_GET["nomor_meja"];
$rows = query("SELECT * FROM meja WHERE nomor_meja = $id")[0];
if (isset($_POST["submit"])) {
if (ubah_meja($_POST) > 0) {
echo "
<script>
alert('Data berhasil diubah!');
document.location.href = 'meja.php';
</script>";
} else {
echo "
<script>
alert('Data gagal diubah!');
document.location.href = 'meja.php';
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
    <li><a class="app-menu__item active" href="meja.php"><i class="app-menu__icon fa fa-sticky-note"></i><span
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
      <h1><i class="fa fa-sticky-note"></i> Halaman Data Meja</h1>
      <p>Halaman Data Meja Restaurant Memoriam</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-sticky-note fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Meja</a></li>
    </ul>
  </div>

  <!-- isi -->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Ubah Data Meja</h3>


        <form action="" method="post">
          <table>
            <div class="form-group">
              <label for="nomor_meja">Nomor Meja</label>
              <input type="text" class="form-control" name="nomor_meja" value="<?= $rows["nomor_meja"] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_pelanggan">Id Pelanggan</label>
              <select name="id_pelanggan" id="id_pelanggan" class="form-control">
                <option value="<?= $rows["id_pelanggan"] ?>"><?= $rows["id_pelanggan"] ?></option>
                <?php $row_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                        while ($row = mysqli_fetch_array($row_pelanggan)) {
                            echo "<option value='$row[id_pelanggan]'>$row[id_pelanggan]</option>";
                        }
                        mysqli_free_result($row_pelanggan); // untuk penggunaan multiple prosedur
                        mysqli_next_result($conn);
                        ?>
              </select>

            </div>
            <div class="form-group">
              <label for="kapasitas_meja">Kapasitas Meja</label>
              <input type="text" class="form-control" name="kapasitas_meja" placeholder="Masukan Kapasitas Meja"
                value="<?= $rows["kapasitas_meja"] ?>">
            </div>
          </table>

          <button type="submit" name="submit" class="btn btn-primary mt-3"><span><i
                class="fa fa-plus"></i>Simpan</button>
          <a href="meja.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button type="button"
              class="btn btn-danger mt-3">
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