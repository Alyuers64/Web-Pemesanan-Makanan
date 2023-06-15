<?php session_start();
if (!$_SESSION['nama_pegawai']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'login.php'</script>";

} else { ?>
<?php
include('header.php');
require 'fungsi.php';
$id = $_GET["id_detail"];
$rows = query("SELECT * FROM detail_orderan WHERE id_detail = $id")[0];
if (isset($_POST["submit"])) {
if (ubah_detail($_POST) > 0) {
echo "
<script>
alert('Data berhasil diubah!');
document.location.href = 'detail_orderan.php';
</script>";
} else {
echo "
<script>
alert('Data gagal diubah!');
document.location.href = 'detail_orderan.php';
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
    <li><a class="app-menu__item" href="orderan.php"><i class="app-menu__icon fa fa-tags"></i><span
          class="app-menu__label">Orderan</span></a></li>
    <li><a class="app-menu__item active" href="detail_orderan.php"><i
          class="app-menu__icon fa fa-check-square-o"></i><span class="app-menu__label">Detail
          Orderan</span></a></li>
    <li><a class="app-menu__item" href="history.php"><i class="app-menu__icon fa fa-history"></i><span
          class="app-menu__label">History</span></a></li>
    <li><a class="app-menu__item" href="bukti-pembayaran.php"><i class="app-menu__icon fa fa-bookmark"></i><span
          class="app-menu__label">Bukti Pembayaran</span></a></li>
  </ul>
</aside>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-check-square-o"></i> Halaman Data Detail Orderan</h1>
      <p>Halaman Data Detail Orderan Restaurant Memoriam</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-check-square-o fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Detail Orderan</a></li>
    </ul>
  </div>

  <!-- isi -->
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Ubah Data Detail Orderan</h3>
        <form action="" method="post">
          <table>
            <div class="form-group">
              <label for="id_detail">Id Detail</label>
              <input type="text" class="form-control" name="id_detail" value="<?= $rows["id_detail"] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_orderan">Id Orderan</label>
              <input type="text" class="form-control" name="id_orderan" placeholder="Masukan Id Orderan"
                value="<?= $rows["id_orderan"] ?>">
            </div>

            <div class="form-group">
              <label>Nama Pegawai</label>
              <select name="id_pegawai" id="id_pegawai" class="form-control">
                <?php
                $row_pelanggan = mysqli_query($conn, "SELECT * FROM pegawai");
                while ($row = mysqli_fetch_array($row_pelanggan)) {
                    $nama = $_SESSION['nama_pegawai'];
                    $selected = ($nama == $row['nama_pegawai']) ? "selected" : ""; // menambahkan logika selected
                    echo "<option value='$row[id_pegawai]' $selected>$row[nama_pegawai]</option>";
                }
                mysqli_free_result($row_pelanggan); // untuk penggunaan multiple prosedur
                mysqli_next_result($conn);
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="jumlah_orderan">Jumlah Orderan</label>
              <input type="text" class="form-control" name="jumlah_orderan" placeholder="Masukan Jumlah Orderan"
                value="<?= $rows["jumlah_orderan"] ?>">
            </div>
            <div class="form-group">
              <label for="total_harga">Total Harga</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
                <input type="text" class="form-control" name=total_harga placeholder="Masukan Total Harga"
                  value="<?= $rows["total_harga"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="ongkir">Ongkir</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
                <input type="text" class="form-control" name=ongkir placeholder="Masukan Total Ongkir"
                  value="<?= $rows["ongkir"] ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="total_pembayaran">Total Pembayaran</label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp.</div>
                </div>
                <input type="text" class="form-control" name=total_pembayaran placeholder="Masukan Total Pembayaran"
                  value="<?= $rows["total_pembayaran"] ?>">
              </div>
            </div>

          </table>
          <button type="submit" name="submit" class="btn btn-primary mt-3"><span><i
                class="fa fa-plus"></i>Simpan</button>
          <a href="detail_orderan.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button
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