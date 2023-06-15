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
    <li><a class="app-menu__item " href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span
          class="app-menu__label">Dashboard</span></a></li>
    <li><a class="app-menu__item" href="pegawai.php"><i class="app-menu__icon fa fa-address-book"></i><span
          class="app-menu__label">Pegawai</span></a></li>
    <li><a class="app-menu__item" href="pelanggan.php"><i class="app-menu__icon fa fa-users"></i><span
          class="app-menu__label">Pelanggan</span></a></li>
    <li><a class="app-menu__item" href="meja.php"><i class="app-menu__icon fa fa-sticky-note"></i><span
          class="app-menu__label">Meja</span></a></li>
    <li><a class="app-menu__item" href="menu.php"><i class="app-menu__icon fa fa-th-list"></i><span
          class="app-menu__label">Menu</span></a></li>
    <li><a class="app-menu__item active" href="orderan.php"><i class="app-menu__icon fa fa fa-tags"></i><span
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
      <h1><i class="fa fa-tags"></i> Data Orderan</h1>
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
        <h3 class="tile-title">Data Orderan</h3>
        <div class="container-lg">
          <div class="table-responsive">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span><i
                  class="fa fa-plus-circle"></i>Tambah Orderan</span></a>
            <div class="table-wrapper">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Id Orderan</th>
                    <th>Id Menu</th>
                    <th>Id Pelanggan</th>
                    <th>Nomor Meja</th>
                    <th>Jenis Orderan</th>
                    <th>Status Orderan</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <?php
                                if(isset($_POST['cari'])){
                                    $keyword=$_POST['keyword'];
                                    $data = mysqli_query($conn,"SELECT * FROM orderan WHERE jenis_orderan LIKE '%$keyword%' OR status_orderan LIKE '%$keyword%'");
                                
                                } else{
                                    $data = mysqli_query($conn, "SELECT * FROM orderan");
                                }
                 
                  while ($row = mysqli_fetch_array($data)) {
                  ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['id_orderan'] ?></td>
                    <td><?php echo $row['id_menu'] ?></td>
                    <td><?php echo $row['id_pelanggan'] ?></td>
                    <td><?php echo $row['nomor_meja'] ?></td>
                    <td><?php echo $row['jenis_orderan'] ?></td>
                    <td><?php echo $row['status_orderan'] ?></td>
                    <td>
                      <a href="EditOrderan.php?id_orderan=<?php echo $row['id_orderan']; ?>" class="edit"><i
                          class="material-icons" title="Edit">&#xE254;</i></a>
                      <a href="DeleteOrderan.php?id_orderan=<?php echo $row['id_orderan']; ?>" class="delete"
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
    $data = mysqli_query($conn, "SELECT max((id_orderan)+1) as id_or FROM orderan");
    $row = mysqli_fetch_array($data);
    $data1 = mysqli_query($conn, "SELECT max(id_pelanggan) as id_pe FROM pelanggan");
    $row1 = mysqli_fetch_array($data1);

    require_once("fungsi.php");
    if (isset($_POST["submit"])) {
      if (tambah_orderan($_POST) > 0) {

          echo "
          <script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'orderan.php';
          </script>";
      } else {
          echo "
      <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'orderan.php';
      </script>";
      }
    }
?>
  <!-- tambah data -->
  <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="POST">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Orderan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Id Orderan</label>
              <input type="text" name="id_orderan" class="form-control" value="<?php echo $row['id_or']; ?>" required>
            </div>
            <div class="form-group">
              <label>Nama Menu</label>
              <select name="id_menu" id="id_menu" class="form-control">
                <option value="">Pilih Menu</option>
                <?php $row_menu = mysqli_query($conn, "SELECT * FROM menu");
                        while ($row = mysqli_fetch_array($row_menu)) {
                            echo "<option value='$row[id_menu]'>$row[nama_menu]</option>";
                        }
                        mysqli_free_result($row_menu); // untuk penggunaan multiple prosedur
                        mysqli_next_result($conn);
                        ?>
              </select>
            </div>
            <div class="form-group">
              <label>Id Pelanggan</label>
              <select name="id_pelanggan" id="id_pelanggan" class="form-control">
                <option value="<?php echo $row1['id_pe']; ?>"><?php echo $row1['id_pe']; ?></option>
                <?php $row_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
                        while ($row = mysqli_fetch_array($row_pelanggan)) {
                            echo "<option value='$row[id_pelanggan]'>$row[nama_pelanggan]</option>";
                        }
                        mysqli_free_result($row_pelanggan); // untuk penggunaan multiple prosedur
                        mysqli_next_result($conn);
                        ?>
              </select>
            </div>
            <div class="form-group">
              <label>Nomor Meja</label>
              <select name="nomor_meja" id="nomor_meja" class="form-control">
                <option value="">Pilih Meja</option>
                <?php $row_menu = mysqli_query($conn, "SELECT * FROM meja");
                        while ($row = mysqli_fetch_array($row_menu)) {
                            echo "<option value='$row[nomor_meja]'>$row[nomor_meja]</option>";
                        }
                        mysqli_free_result($row_menu); // untuk penggunaan multiple prosedur
                        mysqli_next_result($conn);
                        ?>
              </select>
            </div>
            <div class="form-group">
              <label>Jenis Orderan </label>
              <select name="jenis_orderan" class="form-control">
                <option value="Makan Di Tempat">Makan Di Tempat</option>
                <option value="Pesan Online">Pesan Online</option>
              </select>
            </div>
            <div class="form-group">
              <label>Status Orderan</label>
              <select name="status_orderan" class="form-control">
                <option value="Diproses">Diproses</option>
                <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                <option value="Selesai">Selesai</option>
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