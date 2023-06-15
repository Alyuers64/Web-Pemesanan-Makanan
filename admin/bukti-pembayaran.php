<?php session_start();
if (!$_SESSION['nama_pegawai']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'login.php'</script>";

} else { ?>

<?php 
require_once("koneksi.php");
require_once("header.php");
?>
<style>
.modal {
  text-align: center;
}
</style>
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
    <li><a class="app-menu__item " href="history.php"><i class="app-menu__icon fa fa-history"></i><span
          class="app-menu__label">History</span></a></li>
    <li><a class="app-menu__item active" href="bukti-pembayaran.php"><i class="app-menu__icon fa fa-bookmark"></i><span
          class="app-menu__label">Bukti Pembayaran</span></a></li>
  </ul>
</aside>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-bookmark"></i> Bukti Pembayaran</h1>
      <p>Halaman Data Pegawai Restaurant Memoriam</p>
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
        <h3 class="tile-title">Data Bukti Pembayaran</h3>
        <div class="container-lg">
          <div class="table-responsive">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span><i
                  class="fa fa-plus-circle"></i>Tambah Bukti Pembayaran</span></a>
            <div class="table-wrapper">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Id Bukti</th>
                    <th>Id Detail</th>
                    <th>Foto Bukti</th>
                    <th>Tanggal Pesan</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <?php
                                if(isset($_POST['cari'])){
                                    $keyword=$_POST['keyword'];
                                    $data = mysqli_query($conn,"SELECT * FROM bukti_pembayaran WHERE id_bukti LIKE '%$keyword%'");

                                } else{
                                    $data = mysqli_query($conn, "SELECT * FROM bukti_pembayaran");
                                }
                                
                                while ($row = mysqli_fetch_array($data)) {
                                ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['id_bukti'] ?></td>
                    <td><?php echo $row['id_detail'] ?></td>
                    <td>
                      <img width="120" height="120" data-toggle="modal"
                        data-target="#exampleModal<?php echo $row['id_bukti']; ?>"
                        src="data:image/jpeg;base64, <?php echo base64_encode($row['foto_bukti']); ?>" />
                      <div class="modal fade" id="exampleModal<?php echo $row['id_bukti']; ?>" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- w-100 class so that header div covers 100% width of parent div -->
                              <h5 class="modal-title w-100" id="exampleModalLabel">
                                Bukti Pembayaran
                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                  ×
                                </span>
                              </button>
                            </div>
                            <!--Modal body with image-->
                            <div class="modal-body">
                              <img width="300" style="object-fit: cover;"
                                src="data:image/jpeg;base64, <?php echo base64_encode($row['foto_bukti']); ?>" />
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td><?php echo $row['tanggal_pesan'] ?></td>
                    <td>
                      <a href="EditBuktiPembayaran.php?id_bukti=<?php echo $row['id_bukti']; ?>" class="edit"><i
                          class="material-icons" title="Edit">&#xE254;</i></a>
                      <a href="DeleteBuktiPembayaran.php?id_bukti=<?php echo $row['id_bukti']; ?>" class="delete"
                        onclick="return confirm('Apakah anda ingin menghapus data ini?');"><i class="material-icons"
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
    require_once("fungsi.php");
    if (isset($_POST["submit"])) {
      if (tambah_bukti($_POST) > 0) {
          echo "
          <script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'bukti-pembayaran.php';
          </script>";
      } else {
          echo "
      <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'bukti-pembayaran.php';
      </script>";
      }
    }
?>

  <?php 
  $data = mysqli_query($conn, "SELECT max((id_bukti)+1) as id_buk FROM bukti_pembayaran");
  $row = mysqli_fetch_array($data);
?>
  <!-- tambah data -->
  <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Bukti Pembayaran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Id Bukti</label>
              <input type="text" class="form-control" name="id_bukti" value="<?php echo $row['id_buk']; ?>">
            </div>
            <div class="form-group">
              <label>Id Detail</label>
              <select name="id_detail" id="id_detail" class="form-control">
                <option value="">Pilih Detail</option>
                <?php $row_detail = mysqli_query($conn, "SELECT * FROM detail_orderan");
                        while ($rows = mysqli_fetch_array($row_detail)) {
                            echo "<option value='$rows[id_detail]'>$rows[id_detail]</option>";
                        }
                        mysqli_free_result($row_detail); // untuk penggunaan multiple prosedur
                        mysqli_next_result($conn);
                        ?>
              </select>
            </div>
            <div class="form-group">
              <label>Foto Bukti Pembayaran</label>
              <input type="file" name="foto_bukti" class="form-control">
            </div>
            <div class="form-group">
              <label>Tanggal Pesan</label>
              <input type="datetime-local" class="form-control" name="tanggal_pesan">
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