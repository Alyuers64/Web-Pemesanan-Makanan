<?php session_start();
if (!$_SESSION['nama_pegawai']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'login.php'</script>";

} else { ?>


<?php 
require_once("koneksi.php");
require_once("header.php");
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
    <li><a class="app-menu__item" href="bukti-pembayaran.php"><i class="app-menu__icon fa fa-bookmark"></i><span
          class="app-menu__label">Bukti Pembayaran</span></a></li>
  </ul>
</aside>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Data Menu</h1>
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
        <h3 class="tile-title">Data Menu</h3>
        <div class="container-lg">
          <div class="table-responsive">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span><i
                  class="fa fa-plus-circle"></i>Tambah Menu</span></a>
            <div class="table-wrapper">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Id Menu</th>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Gambar Menu</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <?php
                  if(isset($_POST['cari'])){
                      $keyword=$_POST['keyword'];
                      $data = mysqli_query($conn,"SELECT * FROM menu WHERE nama_menu LIKE '%$keyword%'");

                  } else{
                      $data = mysqli_query($conn, "SELECT * FROM menu");
                  }      
                  while ($row = mysqli_fetch_array($data)) {
                  ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['id_menu'] ?></td>
                    <td><?php echo $row['nama_menu'] ?></td>
                    <td><?php echo $row['kategori'] ?></td>
                    <td><?php echo $row['stok'] ?></td>
                    <td>Rp.<?php echo number_format($row['Harga']) ?></td>
                    <td>
                      <?php echo '<img width="80" height="80" src="data:image/jpeg;base64,'.base64_encode($row['foto_menu']).'"/>'?>
                    </td>
                    <td><?php echo $row['keterangan'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>
                      <a href="EditMenu.php?id_menu=<?php echo $row['id_menu']; ?>" class="edit"><i
                          class="material-icons" title="Edit">&#xE254;</i></a>
                      <a href="DeleteMenu.php?id_menu=<?php echo $row['id_menu']; ?>" class="delete"
                        onclick=" return confirm ('Apakah anda ingin menghapus data ini?');"><i class="material-icons"
                          title="Delete">&#xE872;</i></a>
                    </td>
                  </tr>
                </tbody>
            </div>
          </div>
          <?php
          }               
          ?>
          </table>

        </div>
      </div>

    </div>
  </div>


  <?php 

$data = mysqli_query($conn, "SELECT max((id_menu)+1) as no_menu FROM menu");
$row = mysqli_fetch_array($data);

    require_once("fungsi.php");
    if (isset($_POST["submit"])) {
      if (tambah_menu($_POST) > 0) {

          echo "
          <script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'menu.php';
          </script>";
      } else {
          echo "
      <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'menu.php';
      </script>";
      }
    }
?>


  <!-- tambah data -->
  <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Menu</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Id Menu</label>
              <input type="text" name="id_menu" class="form-control" value="<?php echo $row['no_menu']; ?>" required>
            </div>
            <div class="form-group">
              <label>Nama Menu</label>
              <input type="text" name="nama_menu" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategori" class="form-control">
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Snack">Snack</option>
              </select>
            </div>
            <div class="form-group">
              <label>Stok</label>
              <input type="number" name="stok" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="Harga" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Foto</label>
              <input type="file" name="foto_menu" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <textarea type="text" name="keterangan" class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="Tersedia">Tersedia</option>
                <option value="Habis">Habis</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" name="submit" class="btn btn-success" value="Add">
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php 
  require_once("footer.php");
?>