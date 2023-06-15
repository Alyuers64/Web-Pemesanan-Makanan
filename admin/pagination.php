<?php session_start();
if (!$_SESSION['nama']){
  echo "<script> alert ('Anda Belum Login, Silahkan Login Dulu!!');
  window.location = 'Loginadmin.php'</script>";

} else { ?>

  <p style="font-size: 150%">Halaman Admin</p><br>
  <p style="font-size: 120%">Halo <?php echo $_SESSION['nama'];?>, Silahkan Cek Data Loundry Hari Ini</p>
  <br>

  <p style="font-size: 120%">Status Orderan</p><br>
  <h5 align="left" ><a href="orderan.php"><button type="button" class="btn btn-info">
    <span><i class="fa fa-tasks"></i> Lihat Orderan</button></a></span>
    <a href="detail.php"><button type="button" class="btn btn-dark">
      <span><i class="fa fa-list-alt"></i> Detail Orderan</button></span></a>
      <a href="pelanggan.php"><button type="button" class="btn btn-success">
        <span><i class="fa fa-users"></i> Pelanggan</button></span></a></h5><br>
        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
          <thead class="thead-dark">
            <tr align="center">
              <th>Nama Pelanggan</th>
              <th>Tanggal Pengambilan</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php
          $page = (isset($_POST['page']))? $_POST['page'] : 1;
          $limit = 3 ; 
          $limit_start = ($page - 1) * $limit;
          $no = $limit_start + 1;

          require("koneksi.php"); 

          $data = mysqli_query($koneksi,"SELECT pelanggan.id_pelanggan, pelanggan.nama, orderan.id_orderan,detail_order.id_detail, detail_order.tanggal_orderan, detail_order.status_orderan FROM detail_order JOIN orderan USING (id_orderan) JOIN pelanggan USING (id_pelanggan) LIMIT $limit_start, $limit");

          while($row = mysqli_fetch_array($data)){ 
            ?>
            <tr>
              <td><center><?php echo $row['nama'] ?></center></td>
              <td><center><?php echo $row['tanggal_orderan'] ?></center></td>
              <td><center><?php echo $row['status_orderan'] ?></center></td>
              <td><center><a href="Cetak.php?idm=<?php echo $row['id_detail']; ?>"><button type="button" class="btn btn-primary"><span><i class="fa fa-file-pdf-o"></i> Cetak Struk</button></span></a></button></a></center>
              </td>
            </tr>
          <?php } ?>
        </table>

        <?php
        $query = "SELECT COUNT(*) AS ida FROM detail_order";
        $as = $koneksi->prepare($query);
        $as->execute();
        $hasil= $as->get_result();
        $row = $hasil->fetch_assoc();
        $total_data = $row['ida'];
        ?>

        <nav class="mb-5">
          <ul class="pagination justify-content-end">
            <?php
            $jumlah_page = ceil($total_data / $limit);
            $jumlah_number = 1; 
            $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
            $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;

            if($page == 1){
              echo '<li class="page-item disabled"><a class="page-link" href="#">Sebelumnya</a></li>';
              echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            } else {
              $link_prev = ($page > 1)? $page - 1 : 1;
              echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">Sebelumnya</a></li>';
              echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            }

            for($i = $start_number; $i <= $end_number; $i++){
              $link_active = ($page == $i)? ' active' : '';
              echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
            }

            if($page == $jumlah_page){
              echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
              echo '<li class="page-item disabled"><a class="page-link" href="#">Berikutnya</a></li>';
            } else {
              $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
              echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
              echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Berikutnya</a></li>';
            }
            ?>
          </ul>
        </nav>
      </div>
    </div>
    <?php } ?>