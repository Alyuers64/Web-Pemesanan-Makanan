<?php session_start();
if (!$_SESSION['nama_pegawai']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'login.php'</script>";

} else { ?>

<?php
require_once("koneksi.php");
require_once ("header.php");
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
        <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span
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
            <h1><i class="fa fa-home"></i> Dashboard</h1>
            <p>Selamat Datang Pegawai Resto Memoriam</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
    </div>

    <div class="row">
        <?php
        include 'koneksi.php';
        $sql = mysqli_query($conn, 'SELECT * FROM  view_pegawai');
        $id_pegawai = mysqli_num_rows($sql);
        ?>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-user fa-3x"></i>
                <div class="info">
                    <h4>Jumlah Pegawai</h4>
                    <p><b><?php echo $id_pegawai; ?></b></p>
                </div>
            </div>
        </div>

        <?php
        include 'koneksi.php';
        $sql = mysqli_query($conn, 'SELECT * FROM view_pelanggan');
        $id_pelanggan = mysqli_num_rows($sql);
        ?>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small success coloured-icon" style="background:#fff;"><i
                    class="icon bg-success fa fa-users"></i>
                <div class="info">
                    <h4 class="text-dark">Jumlah Pelanggan</h4>
                    <p class="text-dark" value="<?php echo $id_pelanggan; ?>">
                        <b><?php echo $id_pelanggan; ?></b>
                    </p>
                </div>
            </div>
        </div>

        <?php
        include 'koneksi.php';
        $sql = mysqli_query($conn, 'SELECT * FROM  view_orderan');
        $id_orderan = mysqli_num_rows($sql);
        ?>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa fa-tags fa-3x"></i>
                <div class="info">
                    <h4>Jumlah Orderan</h4>
                    <p><b><?php echo $id_orderan; ?></b></p>
                </div>
            </div>
        </div>

        <?php
        include 'koneksi.php';
        $sql = mysqli_query($conn, 'SELECT * FROM  view_meja');
        $id_meja = mysqli_num_rows($sql);
        ?>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-sticky-note fa-3x"
                    style="background-color: #d66a04;"></i>
                <div class="info">
                    <h4>Jumlah Meja</h4>
                    <p><b><?php echo $id_meja; ?></b></p>
                </div>
            </div>
        </div>

        <?php
        include 'koneksi.php';
        $sql = mysqli_query($conn, 'SELECT * FROM  view_menu');
        $id_menu = mysqli_num_rows($sql);
        ?>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-th-list fa-3x"></i>
                <div class="info">
                    <h4>Jumlah Menu</h4>
                    <p><b><?php echo $id_menu; ?></b></p>
                </div>
            </div>
        </div>

        <?php
        include 'koneksi.php';
        $sql = mysqli_query($conn, 'SELECT * FROM  view_detail_orderan');
        $id_detail_orderan = mysqli_num_rows($sql);
        ?>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small war coloured-icon" style="background:#fff;"><i class="icon fa fa-check-square-o"
                    style="background:#17b063;"></i>
                <div class="info">
                    <h4 class="text-dark">Jumlah Orderan Selesai</h4>
                    <p class="text-dark"><b><?php echo $id_detail_orderan; ?></b></p>
                </div>
            </div>
        </div>



        <?php
        include 'koneksi.php';
        $sql = mysqli_query($conn, 'SELECT * FROM total_penghasilan');
        $total = mysqli_fetch_array($sql);
        ?>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-line-chart fa-3x"></i>
                <div class="info">
                    <h4>Total Penghasilan</h4>
                    <p>Rp. <b><?php echo number_format($total['total']); ?></b></p>
                </div>
            </div>
        </div>
    </div>

    <!-- isi dasboard -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Pelanggan Offline</h3>
                <div class="container-lg">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Nama Menu</th>
                                        <th>Kategori</th>
                                        <th>Jumlah Orderan</th>
                                        <th>Harga Satuan</th>
                                        <!-- <th>Ongkir</th> -->
                                        <th>Total Pembayaran</th>
                                        <th>Jenis Orderan</th>
                                        <th>Nama Pegawai</th>
                                        <th>Status Orderan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <?php
                                if(isset($_POST['cari'])){
                                    $keyword=$_POST['keyword'];
                                    $data = mysqli_query($conn,"SELECT * FROM pelanggan_offline WHERE nama_pelanggan LIKE '%$keyword%'");
                                } else{
                                    $data = mysqli_query($conn, "SELECT * FROM pelanggan_offline");
                                }
                                // $data = mysqli_query($conn, "SELECT * FROM pelanggan_offline");
                                while ($row = mysqli_fetch_array($data)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['id_detail']; ?></td>
                                        <td><?php echo $row['nama_pelanggan']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td><?php echo $row['nama_menu']; ?></td>
                                        <td><?php echo $row['kategori']; ?></td>
                                        <td><?php echo $row['jumlah_orderan']; ?></td>
                                        <td>Rp.<?php echo number_format($row['total_harga']) ?></td>
                                        <td>Rp.<?php echo number_format($row['total_pembayaran']) ?></td>
                                        <td><?php echo $row['jenis_orderan']; ?></td>
                                        <td><?php echo $row['nama_pegawai']; ?></td>
                                        <td><?php echo $row['status_orderan']; ?></td>
                                        <td>
                                            <a href="cetak_struk.php?id=<?php echo $row['nama_pelanggan']; ?>">
                                                <i class="material-symbols-outlined text-primary">print</i></a>
                                            </a>

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
    <div class="row">

        <div class="col-md-12">

            <div class="tile">
                <h3 class="tile-title">Pelanggan Online</h3>
                <div class="container-lg">
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat</th>
                                        <th>Nama Menu</th>
                                        <th>Kategori</th>
                                        <th>Jumlah Orderan</th>
                                        <th>Harga Satuan</th>
                                        <th>Ongkir</th>
                                        <th>Total Pembayaran</th>
                                        <th>Jenis Orderan</th>
                                        <th>Nama Pegawai</th>
                                        <th>Status Orderan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <?php

if(isset($_POST['cari'])){
    $keyword=$_POST['keyword'];
    $data = mysqli_query($conn,"SELECT * FROM pelanggan_online WHERE nama_pelanggan LIKE '%$keyword%'");
} else{
    $data = mysqli_query($conn, "SELECT * FROM pelanggan_online");
}
                  // menampilkan view join table
                //   $data = mysqli_query($conn, "SELECT * FROM pelanggan_online");
                while ($row = mysqli_fetch_array($data)) {
                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['id_detail']; ?></td>
                                        <td><?php echo $row['nama_pelanggan']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td><?php echo $row['nama_menu']; ?></td>
                                        <td><?php echo $row['kategori']; ?></td>
                                        <td><?php echo $row['jumlah_orderan']; ?></td>
                                        <td>Rp.<?php echo number_format($row['total_harga']) ?></td>
                                        <td>Rp.<?php echo number_format($row['ongkir']) ?></td>
                                        <td>Rp.<?php echo number_format($row['total_pembayaran']) ?></td>
                                        <td><?php echo $row['jenis_orderan']; ?></td>
                                        <td><?php echo $row['nama_pegawai']; ?></td>
                                        <td><?php echo $row['status_orderan']; ?></td>
                                        <td>
                                            <a href="cetak_struk-online.php?id=<?php echo $row['nama_pelanggan']; ?>">
                                                <i class="material-symbols-outlined text-primary">print</i></a>
                                            </a>
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

    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php } ?>
<?php
    require_once 'footer.php';
    ?>