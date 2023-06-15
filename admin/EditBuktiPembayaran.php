<?php session_start();
if (!$_SESSION['nama_pegawai']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'login.php'</script>";

} else { ?>
<?php
include('header.php');
require 'fungsi.php';

              //deklarasi edit
              $id = $_GET["id_bukti"];
              $rows = "SELECT * FROM bukti_pembayaran WHERE id_bukti = '$id'";
              $select = mysqli_query($conn, $rows);
              $fetch = mysqli_fetch_array($select);
              if (isset($_POST["submit"])) {
              if (ubah_bukti($_POST) > 0) {
              echo "
              <script>
                alert('Data berhasil diubah!');
                document.location.href = 'bukti-pembayaran.php';
              </script>";
              } else {
              echo "
              <script>
                alert('Data gagal diubah!');
                document.location.href = 'EditBuktiPembayaran.php';
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
    <li><a class="app-menu__item active" href="menu.php"><i class="app-menu__icon fa fa-th-list"></i><span
          class="app-menu__label">Menu</span></a></li>
    <li><a class="app-menu__item" href="orderan.php"><i class="app-menu__icon fa fa fa-tags"></i><span
          class="app-menu__label">Orderan</span></a></li>
    <li><a class="app-menu__item" href="detail_orderan.php"><i class="app-menu__icon fa fa-check-square-o"></i><span
          class="app-menu__label">Detail Orderan</span></a></li>
    <li><a class="app-menu__item" href="history.php"><i class="app-menu__icon fa fa-history"></i><span
          class="app-menu__label">History</span></a></li>
    <li><a class="app-menu__item " href="bukti-pembayaran.php"><i class="app-menu__icon fa fa-bookmark"></i><span
          class="app-menu__label">Bukti Pembayaran</span></a></li>
  </ul>
</aside>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-bookmark"></i> Halaman Data Bukti Pembayaran</h1>
      <p>Halaman Data Menu Restaurant Memoriam</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-bookmark fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Bukti Pembayaran</a></li>
    </ul>
  </div>

  <!-- isi -->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Ubah Data Bukti Pembayaran</h3>
        <form action="" method="post" enctype="multipart/form-data">
          <table>
            <div class="form-group">
              <label for="id_bukti">Id Bukti</label>
              <input type="text" class="form-control" name="id_bukti" value="<?= $fetch['id_bukti'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_detail">Id Detail</label>
              <input type="text" class="form-control" name="id_detail" value="<?= $fetch['id_detail'] ?>">
            </div>
            <?php
        // Check if image data exists in the database
        // Get the image data from the database
        $imageData = $fetch['foto_bukti'];
        // Generate the base64 encoded string
        $base64 = base64_encode($imageData);
        // Generate the image source string
        $imageSrc = "data:image/jpeg;base64," . $base64;
        ?>
            <div class="form-group">
              <label for="foto_bukti">Gambar</label>
              <br>
              <img width="80" height="80" src="<?= $imageSrc ?>" />
              <br><br>
              <label>Upload Gambar</label>
              <input type="file" name="foto_bukti" class="form-control">
            </div>
            <div class="form-group">
              <label for="tanggal_pesan">Tanggal Pesan</label>
              <input type="datetime-local" class="form-control" name="tanggal_pesan"
                value="<?= $fetch["tanggal_pesan"] ?>">
            </div>

          </table>

          <button type="submit" name="submit" class="btn btn-primary mt-3"><span><i
                class="fa fa-plus"></i>Simpan</button>
          <a href="bukti-pembayaran.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button
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