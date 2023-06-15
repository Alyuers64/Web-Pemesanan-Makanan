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
    <li><a class="app-menu__item" href="menu.php"><i class="app-menu__icon fa fa-th-list"></i><span
          class="app-menu__label">Menu</span></a></li>
    <li><a class="app-menu__item" href="orderan.php"><i class="app-menu__icon fa fa fa-tags"></i><span
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
      <h1><i class="fa fa-check-square-o"></i> Data Detail Orderan</h1>
      <p>Halaman Data Detail Orderan Restaurant Memoriam</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-check-square-o fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Detail Orderan </a></li>
    </ul>
  </div>

  <!-- isi -->
  <div class="row">
    <div class="col-md-12">

      <div class="tile">
        <h3 class="tile-title">Data Detail Orderan </h3>
        <div class="container-lg">
          <div class="table-responsive">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span><i
                  class="fa fa-plus-circle"></i>Tambah Detail Orderan </span></a>
            <div class="table-wrapper">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Id Detail</th>
                    <th>Id Orderan</th>
                    <th>Id Pegawai</th>
                    <th>Jumlah Orderan</th>
                    <th>Total Harga</th>
                    <th>Ongkir</th>
                    <th>Total Pembayaran</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <?php
                 $peg=$_SESSION['nama_pegawai'];
                                  if(isset($_POST['cari'])){
                                    $keyword=$_POST['keyword'];
                                    $data = mysqli_query($conn,"SELECT * FROM detail_orderan WHERE ongkir LIKE '%$keyword%'");
                                
                                } else{
                                    $data = mysqli_query($conn, "SELECT detail_orderan.*, pegawai.* FROM detail_orderan LEFT JOIN pegawai USING (id_pegawai) WHERE nama_pegawai = '$peg' OR id_pegawai IS NULL");
                                }

                  while ($row = mysqli_fetch_array($data)) {
                  ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['id_detail'] ?></td>
                    <td><?php echo $row['id_orderan'] ?></td>
                    <td><?php echo $row['id_pegawai'] ?></td>
                    <td><?php echo $row['jumlah_orderan'] ?></td>
                    <td>Rp.<?php echo number_format($row['total_harga']) ?></td>
                    <td>Rp.<?php echo number_format($row['ongkir']) ?></td>
                    <td>Rp.<?php echo number_format($row['total_pembayaran']) ?></td>
                    <td>
                      <a href="EditDetail.php?id_detail=<?php echo $row['id_detail']; ?>" class="edit"><i
                          class="material-icons" title="Edit">&#xE254;</i></a>
                      <a href="DeleteDetailOrderan.php?id_detail=<?php echo $row['id_detail']; ?>" class="delete"
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
    $data = mysqli_query($conn, "SELECT max((id_detail)+1) as id_de FROM detail_orderan");
    $row = mysqli_fetch_array($data);

    $data1 = mysqli_query($conn, "SELECT max(id_orderan) as id_or FROM orderan");
    $row1 = mysqli_fetch_array($data1);

    require_once("fungsi.php");
    if (isset($_POST["submit"])) {
      if (tambah_detail($_POST) > 0) {

          echo "
          <script>
              alert('Data berhasil ditambahkan!');
              document.location.href = 'detail_orderan.php';
          </script>";
      } else {
          echo "
      <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'detail_orderan.php';
      </script>";
      }
    }
?>
  <!-- Edit Modal HTML -->
  <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Tambah Detail Orderan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form name="autoSumForm" method="POST" action="">
            <div class="form-group">
              <label>Id Detail</label>
              <input type="text" name="id_detail" class="form-control" value="<?php echo $row['id_de']; ?>">
            </div>
            <div class="form-group">
              <label>Id Orderan</label>
              <select name="id_orderan" id="id_orderan" class="form-control">
                <option value="<?php echo $row1['id_or']; ?>"><?php echo $row1['id_or']; ?></option>
                <?php $row_orderan = mysqli_query($conn, "SELECT * FROM orderan");
                        while ($row = mysqli_fetch_array($row_orderan)) {
                            echo "<option value='$row[id_orderan]'>$row[id_orderan]</option>";
                            $harga = ['Harga'];
                        }
                        mysqli_free_result($row_orderan); // untuk penggunaan multiple prosedur
                        mysqli_next_result($conn);
                        ?>
              </select>
            </div>
            <div class="form-group">
              <label>Nama Pegawai</label>
              <select name="id_pegawai" id="id_pegawai" class="form-control">
                <!-- <option value="">Pilih Pegawai</option> -->
                <?php $row_pegawai = mysqli_query($conn, "SELECT * FROM pegawai");
                            while ($row = mysqli_fetch_array($row_pegawai)) {
                                echo "<option value='$row[id_pegawai]'>$row[nama_pegawai]</option>";
                            }
                            mysqli_free_result($row_pegawai); // untuk penggunaan multiple prosedur
                            mysqli_next_result($conn);
                        ?>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah Orderan</label>
              <input class="form-control" type="number" name="jumlah_orderan" onFocus="startCalc();"
                onBlur="stopCalc();" id="jumlah_orderan">
            </div>
            <div class="form-group">
              <label>Total Harga</label>
              <input class="form-control" type="number" name="total_harga" onFocus="startCalc();" onBlur="stopCalc();"
                id="total_harga">
            </div>
            <div class="form-group">
              <label>Ongkir</label>
              <input type="number" name="ongkir" class="form-control" onFocus="startCalc();" onBlur="stopCalc();"
                id="ongkir">
            </div>
            <div class="form-group">
              <label>Total Pembayaran</label>
              <input type="number" name="total_pembayaran" class="form-control" id="total_pembayaran">
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
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function() {
  function startCalc() {
    interval = setInterval("calc()", 1);
  }

  function calc() {
    let ongkir1 = 0;
    if (ongkir1 === 0 || ongkir1 === null) {
      total_harga1 = document.autoSumForm.total_harga.value;
      jumlah_orderan1 = document.autoSumForm.jumlah_orderan.value;
      ongkir1 = document.autoSumForm.ongkir.value;
      document.autoSumForm.total_pembayaran.value = total_harga1 * jumlah_orderan1;
    }
    if (ongkir1 >= 1) {
      total_harga1 = document.autoSumForm.total_harga.value;
      jumlah_orderan1 = document.autoSumForm.jumlah_orderan.value;
      ongkir1 = document.autoSumForm.ongkir.value;
      document.autoSumForm.total_pembayaran.value = ((total_harga1 * jumlah_orderan1) + ongkir1);
    }
  }

  function stopCalc() {
    clearInterval(interval);
  }
  $('#id_orderan').change(function() {
    var id = $(this).val();

    $.ajax({
      type: 'POST', //method
      url: 'DataTotalPembelian.php', //action
      data: {
        id: id
      },
      success: function(data) {
        var isi = JSON.parse(data);
        $('#total_harga').val(isi.total_pembayaran);
      }
    });

  });
});
</script>

<!-- Essential javascripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
<!-- javascript plugin display page loading on top-->
<script src="assets/js/plugins/pace.min.js"></script>

</body>

</html>

<?php } ?>