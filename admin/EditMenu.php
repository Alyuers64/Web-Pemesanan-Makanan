<?php session_start();
if (!$_SESSION['nama_pegawai']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'login.php'</script>";

} else { ?>
<?php
include('header.php');
require 'fungsi.php';

              //deklarasi edit
              $id = $_GET["id_menu"];
              $rows = "SELECT * FROM menu WHERE id_menu = '$id'";
              $select = mysqli_query($conn, $rows);
              $fetch = mysqli_fetch_array($select);
              if (isset($_POST["submit"])) {
              if (ubah_menu($_POST) > 0) {
              echo "
              <script>
              alert('Data berhasil diubah!');
              document.location.href = 'menu.php';
              </script>";
              } else {
              echo "
              <script>
              alert('Data gagal diubah!');
              document.location.href = 'menu.php';
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
      <h1><i class="fa fa-th-list"></i> Halaman Data Menu</h1>
      <p>Halaman Data Menu Restaurant Memoriam</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-th-list fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Menu</a></li>
    </ul>
  </div>

  <!-- isi -->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Ubah Data Menu</h3>
        <form action="" method="post" enctype="multipart/form-data">
          <table>
            <div class="form-group">
              <label for="nomor_meja">Id Menu</label>
              <input type="text" class="form-control" name="id_menu" value="<?= $fetch['id_menu'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nama_menu">Nama Menu</label>
              <input type="text" class="form-control" name="nama_menu" placeholder="Masukan Menu"
                value="<?= $fetch['nama_menu'] ?>">
            </div>
            <div class="form-group">
              <label for="kategori">Kategori</label>
              <select name="kategori" class="form-control">
                <option value="<?= $fetch['kategori'] ?>"><?= $fetch['kategori'] ?></option>
                <option value="Minuman">Minuman</option>
                <option value="Makanan">Makanan</option>
                <option value="Snack">Snack</option>
              </select>
            </div>
            <div class="form-group">
              <label for="stok">Stok</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
                <input type="text" class="form-control" name="stok" placeholder="Masukan stok"
                  value="<?= $fetch['stok'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="Harga">Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
                <input type="text" class="form-control" name="Harga" placeholder="Masukan Harga"
                  value="<?= $fetch['Harga'] ?>">
              </div>
            </div>
            <?php
        // Check if image data exists in the database
        // Get the image data from the database
        $imageData = $fetch['foto_menu'];
        // Generate the base64 encoded string
        $base64 = base64_encode($imageData);
        // Generate the image source string
        $imageSrc = "data:image/jpeg;base64," . $base64;
        ?>
            <div class="form-group">
              <label for="foto_menu">Gambar</label>
              <br>
              <img width="80" height="80" src="<?= $imageSrc ?>" />
              <br><br>
              <label>Upload Gambar</label>
              <input type="file" name="foto_menu" class="form-control">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <input type="text" name="keterangan" class="form-control" value="<?= $fetch['keterangan'] ?>">
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" class="form-control">
                <option value="<?= $fetch['status'] ?>"><?= $fetch['status'] ?></option>
                <option value="Tersedia">Tersedia</option>
                <option value="Habis">Habis</option>
              </select>
            </div>

          </table>

          <button type="submit" name="submit" class="btn btn-primary mt-3"><span><i
                class="fa fa-plus"></i>Simpan</button>
          <a href="menu.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button type="button"
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