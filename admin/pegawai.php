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
        <li><a class="app-menu__item active" href="pegawai.php"><i class="app-menu__icon fa fa-address-book"></i><span
                    class="app-menu__label">Pegawai</span></a></li>
        <li><a class="app-menu__item " href="pelanggan.php"><i class="app-menu__icon fa fa-users"></i><span
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
            <h1><i class="fa fa-address-book"></i> Data Pegawai</h1>
            <p>Halaman Data Pegawai Restaurant Memoriam</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-address-book fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
        </ul>
    </div>

    <!-- isi -->
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <h3 class="tile-title">Data Pegawai</h3>
                <div class="container-lg">
                    <div class="table-responsive">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span><i
                                    class="fa fa-plus-circle"></i>Tambah Pegawai</span></a>
                        <div class="table-wrapper">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id pegawai</th>
                                        <th>Nama Pegawai</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Posisi</th>
                                        <th>Jam Kerja</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <?php
                                $peg=$_SESSION['nama_pegawai'];
                  if(isset($_POST['cari'])){
                        
                      $keyword=$_POST['keyword'];
                      $data = mysqli_query($conn,"SELECT * FROM pegawai WHERE nama_pegawai LIKE '%$keyword%'");

                  } else{
                      $data = mysqli_query($conn, "SELECT * FROM pegawai WHERE nama_pegawai ='$peg'");
                  }
                  
                  while ($row = mysqli_fetch_array($data)) {
                  ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['id_pegawai'] ?></td>
                                        <td><?php echo $row['nama_pegawai'] ?></td>
                                        <td><?php echo $row['alamat'] ?></td>
                                        <td><?php echo $row['no_hp'] ?></td>
                                        <td><?php echo $row['posisi'] ?></td>
                                        <td><?php echo $row['jam_kerja'] ?></td>


                                        <td>
                                            <a href="EditPegawai.php?id_pegawai=<?php echo $row['id_pegawai']; ?>"
                                                class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                                            <a href="DeletePegawai.php?id_pegawai=<?php echo $row['id_pegawai']; ?>"
                                                class="delete"
                                                onclick=" return confirm ('Apakah anda ingin menghapus data ini?');"><i
                                                    class="material-icons" title="Delete">&#xE872;</i></a>
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
    require_once("fungsi.php");
    if (isset($_POST["submit"])) {
      if (tambah_pegawai($_POST) > 0) {

          echo "
          <script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'pegawai.php';
          </script>";
      } else {
          echo "
      <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'pegawai.php';
      </script>";
      }
    }
?>

    <?php 
  $data = mysqli_query($conn, "SELECT max((id_pegawai)+1) as id_pe FROM pegawai");
  $row = mysqli_fetch_array($data);
?>
    <!-- tambah data -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pegawai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Id Pegawai</label>
                            <input type="text" class="form-control" name="id_pegawai"
                                value="<?php echo $row['id_pe']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama_pegawai" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>No HP</label>
                            <input type="tel" name="no_hp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Posisi</label>
                            <select name="posisi" class="form-control">
                                <option value="kasir">kasir</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jam Kerja</label>
                            <select name="jam_kerja" class="form-control">
                                <option value="Shift 1 (09:00-15:00)">Shift 1 (09:00-15:00)</option>
                                <option value="Shift 2 (15:15-22:00)">Shift 2 (15:15-22:00)</option>
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